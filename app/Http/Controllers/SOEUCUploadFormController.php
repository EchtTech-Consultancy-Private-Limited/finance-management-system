<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use App\Models\InstituteProgram;
use App\Models\SOEUCUploadForm;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\FileSizeServices;
use Exception;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\Services\SendNotificationServices;


class SOEUCUploadFormController extends Controller
{
    public $SendNotificationServices;
    function __construct()
    {
        $this->SendNotificationServices = new SendNotificationServices;
    }
    /**
     * Display a listing of the resource.
     */
    protected $create = 'institute-user.SOEUCUpload.create';
    protected $edit = 'institute-user.SOEUCUpload.edit';
    protected $list = 'institute-user.SOEUCUpload.list';

    public function index()
    {
        $sorUcLists = SOEUCUploadForm::with('program')->where('user_id', Auth::id())->orderBy('id','desc')->get();
        return view($this->list,compact('sorUcLists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $months = [];
        $currentYear = date('Y');
        for ($m = 0; $m < 12; $m++) {
            $month = new DateTime("$currentYear-04-01");
            $month->modify("+$m months");
            $months[] = $month->format('F');
        }
        $institutes = Institute::get();
        $institutePrograms = InstituteProgram::get();
        return view($this->create,compact('months','institutes','institutePrograms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'qtr_uc' => 'required',
            'program_id' => 'required',
            'yearofuc'    => 'required',
            'month'     => 'required',
            'ucuploaddate'     => 'required',
            'ucfileupload'        => 'required|mimes:pdf',
        ],
        [
            'qtr_uc.required' => 'The QTR UC field is required',
            'program_id.required' => 'The Program field is required',
            'month.required' => 'The Month field is required',
            'yearofuc.required' => 'The Year of UC field is required',
            'ucuploaddate.required' => 'The Year of UC Upload Date field is required',
            'ucfileupload.required' => 'The UC File Upload field must contain a pdf file'
        ]
    );
        try {
            DB::beginTransaction();
            $ucFileUpload = $request->file('ucfileupload');
            if ($ucFileUpload) {
                $ucFileUploadSize =  FileSizeServices::getFileSize($ucFileUpload->getSize());
                $ucFileUploadName = $ucFileUpload->getClientOriginalName();
                $ucFileUpload->move(public_path('images/uploads/soeucupload'), $ucFileUploadName);
            }
            $ucUploadId = SOEUCUploadForm::Create([
                'user_id' => Auth::id(),
                'qtr_uc' => $request->qtr_uc,
                'program_id' => $request->program_id,
                'institute_id' => $request->institute_id,
                'financial_year' => $request->yearofuc,
                'month' => $request->month,
                'file' => $ucFileUploadName ?? '',
                'file_size' => $ucFileUploadSize ?? '',
                'date' => $request->ucuploaddate,
            ])->id;
            DB::commit();
            $formType = '2'; //Soe Uc Upload
            $this->SendNotificationServices->sendNotification($ucUploadId, $formType, '1', $request->status);
            \Toastr::success('The Record has been Saved successfully.','Success');
            return redirect()->route('institute-user.SOE-UC-upload-list');
        } catch(Exception $e) {
            DB::rollBack();
            \Toastr::error('fail, Add new student  :)','Error');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(SOEUCUploadForm $sOEUCUploadForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try{
            DB::beginTransaction();
            $months = [];
            $currentYear = date('Y');
            for ($m = 0; $m < 12; $m++) {
                $month = new DateTime("$currentYear-04-01");
                $month->modify("+$m months");
                $months[] = $month->format('F');
            }
            $institutes = Institute::get();
            $institutePrograms = InstituteProgram::get();
            $soeUCUpload = SOEUCUploadForm::where('id',$id)->first();
            DB::commit();
            return view($this->edit,compact('months','soeUCUpload','institutePrograms','institutes'));
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id = '')
    {
        $request->validate([
            'qtr_uc' => 'required',
            'program_id' => 'required',
            'yearofuc'    => 'required',
            'month'     => 'required',
            'ucuploaddate'     => 'required',
            // 'ucfileupload'        => 'required|mimes:pdf',
        ]);
        try{
            DB::beginTransaction();
            $ucFileUpload = $request->file('ucfileupload');
            if ($ucFileUpload) {
                $ucFileUploadSize =  FileSizeServices::getFileSize($ucFileUpload->getSize());
                $ucFileUploadName = $ucFileUpload->getClientOriginalName();
                $ucFileUpload->move(public_path('images/uploads/soeucupload'), $ucFileUploadName);
            }else{
                $ucFileUploadName = $request->old_file;
                $ucFileUploadSize = $request->old_file_size;
            }
            SOEUCUploadForm::where('id', $id)->Update([
                'user_id' => Auth::id(),
                'qtr_uc' => $request->qtr_uc,
                'program_id' => $request->program_id,
                'institute_id' => $request->institute_id,
                'financial_year' => $request->yearofuc,
                'month' => $request->month,
                'file' => $ucFileUploadName ?? '',
                'file_size' => $ucFileUploadSize ?? '',
                'date' => $request->ucuploaddate,
            ]);
            $formType = '2'; //Soe Uc Upload
            $this->SendNotificationServices->sendNotification($id, $formType, '1', $request->status);
            DB::commit();
            \Toastr::success('The Reconrd has been updated successfully.','Success');
            return redirect()->route('institute-user.SOE-UC-upload-list');
        } catch(Exception $e) {
            DB::rollBack();
            \Toastr::error('fail, Add new student','Error');
        }
    }
    
    /**
     * ucUploadList
     *
     * @return void
     */
    public function ucUploadList()
    {
        $programs = InstituteProgram::get();
        $sorUcLists = SOEUCUploadForm::with('users')->get();
        return view('national-user.uc-upload.index',compact('programs','sorUcLists'));
    }

    /**
     *  @changeStatus of form
     *
     * @param  mixed $id
     * @return void
     */
    public function changeStatus(Request $request, $id = '')
    {
        try{
            DB::beginTransaction();
            SOEUCUploadForm::where('id', $id)->Update([
                'reason' => $request->reason,
                'status' => $request->status,
            ]);
            $user =  SOEUCUploadForm::where('id', $id)->first();
            $formType = '2'; //Soe Uc Form
            $this->SendNotificationServices->sendNotification($id, $formType, $user->user_id, $request->status);
            DB::commit();
            \Toastr::success('The status has been changed successfully.','Success');
            return redirect()->route('national-user.uc-upload-list');
        } catch(Exception $e) {
            DB::rollBack();
            \Toastr::error('fail, Add new student  :)','Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SOEUCUploadForm::where('id', $id)->delete();
        \Toastr::success('The Reconrd has been deleted successfully.','Success');
        return redirect()->back();
    }
}
