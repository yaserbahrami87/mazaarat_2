<?php

namespace App\Http\Controllers\admin;

use App\ContactUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(($request->has('status')))
        {
            $contacts=ContactUs::where('status','=',$request->status)
                        ->orderby('id','desc')
                        ->paginate(10);
        }
        else
        {
            $contacts=ContactUs::orderby('id','desc')
                ->paginate(10);
        }

        return view('admin.contactUs.contactUs_all')
                        ->with('contacts',$contacts);
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
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contactUs=ContactUs::find($id);
        if($contactUs)
        {
            return view('admin.contactUs.contactUs_single')
                        ->with('contactUs',$contactUs);
        }
        else
        {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        $this->validate($request,[
            'status'    =>'required|boolean',
        ]);

        $contactUs=ContactUs::find($request->id);
        if(!is_null($contactUs))
        {
            $status=$contactUs->update($request->all());

            if($status)
            {
                toast('پیام خوانده شد','success')->position('bottom-start');

            }
            else
            {
                toast('خطا در خواند پیام','error');
            }
        }
        else
        {
            abort(403);
        }


        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }
}
