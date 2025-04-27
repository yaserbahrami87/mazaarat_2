<?php

namespace App\Http\Controllers\admin;

use App\competiton;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ReportController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::with('competitions')
            ->whereHas('competitions',function($query)
            {
                $query->where('festival_id',$this->festival->id);
            })
            ->get();
        return view('admin.reports.reports')
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

    public function refereeing()
    {
        $refereis=User::where('type',2)
                    ->get();

        $competitons= competiton::where('festival_id',$this->festival->id)
                            ->get();
        return view('admin.reports.refereeing_reports')
                        ->with('competitons',$competitons)
                        ->with('refereis',$refereis);
    }

    public function refereeing_user(User $user)
    {
        return view('admin.reports.refereeing_report_user')
                        ->with('user',$user);
    }
}
