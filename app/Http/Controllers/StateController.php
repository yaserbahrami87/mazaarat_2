<?php

namespace App\Http\Controllers;

use App\city;
use App\state;
use Illuminate\Http\Request;

class StateController extends Controller
{
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
     * @param  \App\state  $state
     * @return \Illuminate\Http\Response
     */
    public function show(state $state)
    {
        $cities=city::where('ostan','=',$state->id)
                    ->get();
        return $cities;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\state  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(state $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\state  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, state $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\state  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(state $state)
    {
        //
    }

    public function ajax(state $state)
    {

    }
}
