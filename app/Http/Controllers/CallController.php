<?php

namespace App\Http\Controllers;

use App\festival;
use Illuminate\Http\Request;

class CallController extends Controller
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
     * @param  \App\festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $festival=festival::latest()->first();

        return view('farsi.call')
                    ->with('festival',$festival);
    }


    public function show_en()
    {
        $festival=festival::latest()->first();
        return view('english.call')
                    ->with('festival',$festival);
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
