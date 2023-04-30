<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\festival;
use Illuminate\Http\Request;

class FestivalController extends Controller
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
        return view('admin.festival.festival_insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate([
            'festival_fa'       =>'required|string|unique:festivals,festival_fa',
            'call_fa'           =>'required|string',
            'start_date_fa'     =>'required|string|max:11',
            'start_time_fa'     =>'required|string|max:5',
            'end_date_fa'       =>'required|string|max:11',
            'end_time_fa'       =>'required|string|max:5',
            'judgment_date_fa'  =>'required|string|max:11',
            'judgment_time_fa'  =>'required|string|max:5',
            'winner_date_fa'    =>'required|string|max:11',
            'winner_time_fa'    =>'required|string|max:5',
            'festival_en'       =>'required|string|unique:festivals,festival_en',
            'call_en'           =>'required|string',
            'start_date_en'     =>'required|string|max:11',
            'start_time_en'     =>'required|string|max:5',
            'end_date_en'       =>'required|string|max:11',
            'end_time_en'       =>'required|string|max:5',
            'judgment_date_en'  =>'required|string|max:11',
            'judgment_time_en'  =>'required|string|max:5',
            'winner_date_en'    =>'required|string|max:11',
            'winner_time_en'    =>'required|string|max:5',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function show(festival $festival)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function edit(festival $festival)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, festival $festival)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function destroy(festival $festival)
    {
        //
    }
}
