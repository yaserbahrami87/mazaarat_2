<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\RequestLink;
use Illuminate\Http\Request;

class RequestLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $RequestLinks=RequestLink::orderby('id','desc')
                        ->get();

        return view('admin.requestLink.requestLink_all')
                                ->with('requestLinks',$RequestLinks);
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
     * @param  \App\RequestLink  $RequestLink
     * @return \Illuminate\Http\Response
     */
    public function show(RequestLink $RequestLink)
    {
        return view('admin.requestLink.requestLink_single')
                    ->with('RequestLink',$RequestLink);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RequestLink  $requestLink
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestLink $RequestLink)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RequestLink  $RequestLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestLink $RequestLink)
    {
        $this->validate($request,[
            'status'    =>'required|numeric|between:0,2',
        ]);

        $status=$RequestLink->update($request->all());
        if($status)
        {
            alert()->success('بروزرسانی شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بروزرسانی')->persistent('بستن');
        }

        return redirect('/admin/RequestLink');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequestLink  $requestLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestLink $RequestLink)
    {
        //
    }
}
