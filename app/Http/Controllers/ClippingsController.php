<?php

namespace App\Http\Controllers;

use App\Clipping;
use Illuminate\Http\Request;

class ClippingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clipping  $clipping
     * @return \Illuminate\Http\Response
     */
    public function show(Clipping $clipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clipping  $clipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Clipping $clipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clipping  $clipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clipping $clipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clipping  $clipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clipping $clipping)
    {
        //
    }
}
