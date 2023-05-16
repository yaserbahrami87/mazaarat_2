<?php

namespace App\Http\Controllers;

use App\news;
use App\state;
use Illuminate\Http\Request;

class SiteController extends BaseController
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function register()
    {
        $states=state::orderby('name')
                    ->get();

        if(session('lang')=='farsi')
        {
            return view('farsi.auth.register')
                        ->with('states',$states);
        }
        else
        {
            return view('english.auth.register')
                        ->with('states',$states);
        }
    }

    public function setLanguage($language)
    {
        $news=news::where('festival_id','=',$this->festival->id)
            ->limit(4)
            ->orderby('id','desc')
            ->get();


        if($language=='english')
        {

            session()->put('lang','english');
            return view('english.home')
                            ->with('news',$news);
        }
        else
        {
            session()->put('lang','farsi');
            return view('farsi.home')
                            ->with('news',$news);
        }

    }
}
