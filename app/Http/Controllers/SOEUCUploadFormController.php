<?php

namespace App\Http\Controllers;

use App\Models\SOEUCUploadForm;
use Illuminate\Http\Request;
use DB;

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
        return view($this->list,['state'=>$stateList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stateList = DB::table('states')->where('status',1)->get();
        return view($this->create,['state'=>$stateList]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'yearofuc'    => 'required|string',
            'month'     => 'required|string',
            'ucuploaddate'     => 'required|string',
            'ucfileupload'        => 'required|image',
        ]);
        
        DB::beginTransaction();
        try {
           
            $upload_file = rand() . '.' . $request->ucfileupload->extension();
            $request->upload->move(storage_path('app/public/UCFileUpload/'), $upload_file);
            if(!empty($request->upload)) {
                $student = new SOEUCUploadForm;
                $student->yearofuc   = $request->yearofuc;
                $student->month    = $request->month;
                $student->ucuploaddate= $request->ucuploaddate;
                $student->ucfileupload = $ucfileupload;
                $student->save();

                Toastr::success('Has been add successfully :)','Success');
                DB::commit();
            }
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('fail, Add new student  :)','Error');
            return redirect()->back();
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
    public function edit(SOEUCUploadForm $sOEUCUploadForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SOEUCUploadForm $sOEUCUploadForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SOEUCUploadForm $sOEUCUploadForm)
    {
        //
    }
}
