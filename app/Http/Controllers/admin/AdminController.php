<?php

namespace App\Http\Controllers\admin;

use App\competiton;
use App\festival;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->has('festivals'))
        {
            $festival=festival::where('festival_en',$request->festivals)
                                ->first();
        }
        else
        {
            $festival=festival::latest()->first();
        }
        $users=User::get();


        $competition=competiton::where('festival_id','=',$festival->id)
                            ->get();

        $iranian=competiton::where('festival_id','=',$festival->id)
                                ->with('user')
                                ->wherehas('user',function($query)
                                {
                                    $query->where('code','+98');
                                })
                                ->groupby('user_id')
                                ->get();

        $notIranian=competiton::where('festival_id','=',$festival->id)
            ->with('user')
            ->wherehas('user',function($query)
            {
                $query->where('code','<>','+98')
                        ->wherenotnull('code');
            })
            ->groupby('user_id')
            ->get();

        $NullNationality=competiton::where('festival_id','=',$festival->id)
            ->with('user')
            ->wherehas('user',function($query)
            {
                $query->wherenull('code');
            })
            ->groupby('user_id')
            ->get();


        return view('admin.index')
                        ->with('competition',$competition)
                        ->with('iranian',$iranian)
                        ->with('notIranian',$notIranian)
                        ->with('NullNationality',$NullNationality)
                        ->with('festival',$festival)
                        ->with('users',$users);
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
}
