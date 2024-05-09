<?php

namespace App\Http\Controllers;

use App\Models\NRCPLAB;
use Illuminate\Http\Request;

class NRCPLABController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('national-user.NRCP-Lab-dashboard');
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
    public function show(NRCPLAB $nRCPLAB)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NRCPLAB $nRCPLAB)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NRCPLAB $nRCPLAB)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NRCPLAB $nRCPLAB)
    {
        //
    }
}
