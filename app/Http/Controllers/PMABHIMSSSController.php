<?php

namespace App\Http\Controllers;

use App\Models\PMABHIMSSS;
use Illuminate\Http\Request;

class PMABHIMSSSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('national-user.PM-ABHIM-SSS-dashboard');
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
    public function show(PMABHIMSSS $pMABHIMSSS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PMABHIMSSS $pMABHIMSSS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PMABHIMSSS $pMABHIMSSS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PMABHIMSSS $pMABHIMSSS)
    {
        //
    }
}
