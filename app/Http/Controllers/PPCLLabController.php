<?php

namespace App\Http\Controllers;

use App\Models\PPCLLab;
use Illuminate\Http\Request;

class PPCLLabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('national-user.PPCL-Lab');
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
    public function show(PPCLLab $pPCLLab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PPCLLab $pPCLLab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PPCLLab $pPCLLab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PPCLLab $pPCLLab)
    {
        //
    }
}
