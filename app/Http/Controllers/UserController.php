<?php

namespace App\Http\Controllers;

use App\city;
use App\state;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        $states=state::get();
        if(!is_null(Auth::user()->state_id) )
        {
            $cities=city::where('ostan',Auth::user()->state_id)
                                ->get();
        }
        else
        {
            $cities=[];
        }

        return view('user_fa.users.profile')
                    ->with('cities',$cities)
                    ->with('states',$states);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,
        [
           'fname'    =>'required|string|max:20',
           'lname'    =>'required|string|max:20',
           'father_name' =>'nullable|persian_alpha|max:20',
           'email'    =>'required|email|max:100',
           'datebirth'=>'nullable|date|max:11',
           'state_id' =>'required|numeric|',
           'city_id'  =>'required|numeric|',
           'gender'   =>'nullable|boolean|',
           'shenasnameh'=>'nullable|numeric|',
           'codemelli'=>'nullable|numeric',
           'zipcode'  =>'nullable|string|max:30',
           'address'  =>'nullable|string|max:200',
           'image'    =>'nullable|mimes:jpeg,jpg,bmp,png|max:600',
           'resume'   =>'nullable|mimes:jpeg,jpg,bmp,png,pdf,doc,docx|max:600',
        ]);

        $status=Auth::user()->update($request->all());

        if ($request->has('image') )
        {
            $file = $request->file('image');
            $personal_image = "personal-" . time(). "." . $request->file('image')->extension();
            $path = public_path('images/users/');
            $files = $request->file('image')->move($path, $personal_image);
            $request->personal_image = $personal_image;
            Auth::user()->image=$personal_image;
            Auth::user()->save();
        }

        if ($request->has('resume') )
        {
            $file = $request->file('resume');
            $resume = "resume-" . time(). "." . $request->file('resume')->extension();
            $path = public_path('images/users/');
            $files = $request->file('resume')->move($path, $resume);
            $request->resume = $resume;
            Auth::user()->resume=$resume;
            Auth::user()->save();
        }


        if($status)
        {
            alert()->success('اطلاعات با موفقیت بروزرسانی شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بروزرسانی')->persistent('بستن');
        }

        return back();



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
