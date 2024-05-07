<?php

namespace App\Http\Controllers;

use App\Models\SOEUCForm;
use Illuminate\Http\Request;
use DB;

class SOEUCFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $create = 'institute-user.SOEUC.create';   
    protected $edit = 'institute-user.SOEUC.edit';   
    protected $list = 'institute-user.SOEUC.list';   

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SOEUCForm $sOEUCForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SOEUCForm $sOEUCForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SOEUCForm $sOEUCForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SOEUCForm $sOEUCForm)
    {
        //
    }
}
