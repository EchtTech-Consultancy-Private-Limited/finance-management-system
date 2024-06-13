<?php

namespace App\Http\Controllers;

use App\Models\SOEUCUploadForm;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\FileSizeServices;
use Exception;
use Illuminate\Support\Facades\Auth;

class SOEUCUploadFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $create = 'institute-user.SOEUCUpload.create';
    protected $edit = 'institute-user.SOEUCUpload.edit';
    protected $list = 'institute-user.SOEUCUpload.list';

    public function index()
    {
        $stateList = State::get();
        $sorUcLists = SOEUCUploadForm::get();
        return view($this->list,compact('sorUcLists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stateList = State::get();
        $months = [];
        for ($m=1; $m<=12; $m++) {
            $months[] = date('F', mktime(0,0,0,$m, 1, date('Y')));
        }
        return view($this->create,compact('months'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'yearofuc'    => 'required',
            'month'     => 'required',
            'ucuploaddate'     => 'required',
            'ucfileupload'        => 'required|mimes:pdf',
        ],
        [
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
            SOEUCUploadForm::Create([
                'user_id' => Auth::id(),
                'year' => $request->yearofuc,
                'month' => $request->month,
                'file' => $ucFileUploadName ?? '',
                'file_size' => $ucFileUploadSize ?? '',
                'date' => $request->ucuploaddate,
            ]);
            DB::commit();
            \Toastr::success('Has been add successfully :)','Success');
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
            $breadCrum = "NHM Dashboard";
            DB::beginTransaction();
            $months = [];
            for ($m=1; $m<=12; $m++) {
                $months[] = date('F', mktime(0,0,0,$m, 1, date('Y')));
            }
            $soeUCUpload = SOEUCUploadForm::where('id',$id)->first();
            DB::commit();
            return view($this->edit,compact('months','soeUCUpload'));
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
                'year' => $request->yearofuc,
                'month' => $request->month,
                'file' => $ucFileUploadName ?? '',
                'file_size' => $ucFileUploadSize ?? '',
                'date' => $request->ucuploaddate,
            ]);
            DB::commit();
            \Toastr::success('Has been update successfully :)','Success');
            return redirect()->route('institute-user.SOE-UC-upload-list');
        } catch(Exception $e) {
            DB::rollBack();
            \Toastr::error('fail, Add new student  :)','Error');
        }
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
            DB::commit();
            \Toastr::success('Has been staus change successfully :)','Success');
            return redirect()->route('institute-user.SOE-UC-upload-list');
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
        \Toastr::success('Has been delete successfully :)','Success');
        return redirect()->back();
    }
}
