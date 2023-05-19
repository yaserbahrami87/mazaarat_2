<?php

namespace App\Http\Controllers;

use App\RequestLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestLinkController extends BaseController
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
        $this->validate($request,[
           'link'   =>'required|url',
        ]);

        $RequestLink=RequestLink::create($request->all()+[
                'user_id'       =>Auth::user()->id,
                'festival_id'   =>$this->festival->id,
            ]);
        if($RequestLink)
        {
            if(session('lang')=='farsi')
            {
                alert()->success('درخواست شما با موفقیت ارسال شد')->persistent('بستن');
            }
            else
            {
                alert()->success('Request successfully')->persistent('close');
            }

        }
        else
        {
            if(session('lang')=='farsi') {
                alert()->error('خطا در ارسال لینک')->persistent('بستن');
            }
            else
            {
                alert()->error('Error Request')->persistent('Close');
            }
        }

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RequestLink  $requestLink
     * @return \Illuminate\Http\Response
     */
    public function show(RequestLink $requestLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RequestLink  $requestLink
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestLink $requestLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RequestLink  $requestLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestLink $requestLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequestLink  $requestLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestLink $requestLink)
    {
        //
    }
}
