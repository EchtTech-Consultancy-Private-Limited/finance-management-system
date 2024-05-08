<?php

namespace App\Http\Controllers;

use App\Models\NOHPPCZRCS;
use Illuminate\Http\Request;

class NOHPPCZRCSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('national-user.NOHPPCZ-RCs-dashboard');
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
    public function show(NOHPPCZRCS $nOHPPCZRCS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NOHPPCZRCS $nOHPPCZRCS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NOHPPCZRCS $nOHPPCZRCS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NOHPPCZRCS $nOHPPCZRCS)
    {
        //
    }
}
