<?php

namespace App\Http\Controllers;

use App\Models\SOEUCUploadForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\FileSizeServices;
use Exception;

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
        $stateList = DB::table('states')->where('status',1)->get();
        $sorUcLists = SOEUCUploadForm::get();
        return view($this->list,compact('sorUcLists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stateList = DB::table('states')->where('status',1)->get();
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
            'ucfileupload'        => 'required|mimes:jpeg,bmp,png,gif,svg,pdf',
        ]);
        try {
            DB::beginTransaction();
            $ucFileUpload = $request->file('ucfileupload');
            if ($ucFileUpload) {
                $ucFileUploadSize =  FileSizeServices::getFileSize($ucFileUpload->getSize());
                $ucFileUploadName = $ucFileUpload->getClientOriginalName();
                $ucFileUpload->move(public_path('images/uploads/soeucupload'), $ucFileUploadName);
            }
            SOEUCUploadForm::Create([
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
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SOEUCUploadForm::where('id', $id)->delete();
        \Toastr::success('Has been delete successfully :)','Success');
        return redirect()->back();
    }
}
