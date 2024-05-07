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
        return view($this->create,['state'=>$stateList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
