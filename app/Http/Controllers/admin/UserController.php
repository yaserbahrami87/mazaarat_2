<?php

namespace App\Http\Controllers\admin;

use App\festival;
use App\Http\Controllers\Controller;
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
    public function index(Request $request)
    {

        if($request->has('festivals') && $request->festivals!='all')
        {

            $festival=festival::where('festival_en',$request->festivals)
                                ->first();

            if(is_null($festival))
            {
                alert()->error('جشنوار مورد نظر یافت نشد')->persistent('بستن');
                return back();
            }
            else
            {
                $users=User::when($request->has('nationality'),function ($query) use ($request)
                {
                    if($request->nationality=='iranian')
                    {
                        $query->where('code','+98');
                    }
                    elseif($request->nationality=='foreign')
                    {
                        $query->where('code','<>','+98');
                    }
                    else
                    {
                        $query->wherenull('code');
                    }

                })
                ->with('competitions')
                ->wherehas('competitions',function ($query) use ($festival)
                {

                     $query->where('festival_id',$festival->id);

                })
                ->get();
            }

        }
        else
        {
            $users=User::orderby('id','desc')
                        ->get();

            $festival=festival::latest()->first();
        }







        return view('admin.users.users_all')
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        $festival=festival::latest()->first();
        return view('admin.users.user')
                        ->with('festival',$festival)
                        ->with('user',$user);
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

    public function loginWithUser(User $user)
    {
        Auth::loginUsingId($user->id);
        alert()->success('شما با اکانت '.$user->fname.' '.$user->lname.' وارد شده اید')->persistent('بستن');
        return redirect('/panel/competiton/create');
    }

    public function accessLevel(User $user)
    {

        return view('admin.users.accessLevel.accessLevel')
                    ->with('user',$user);
    }

    public function accessLevel_store(Request $request,User $user)
    {
        $this->validate($request,[
           'accessLevel'    =>'required|numeric|between:1,3'
        ]);

        if($request->accessLevel==1)
        {
            $user->type=$request->accessLevel;
            $user->is_admin=0;
        }
        elseif($request->accessLevel==2)
        {
            $user->type=$request->accessLevel;
            $user->is_admin=0;
        }
        elseif($request->accessLevel==3)
        {
            $user->type=1;
            $user->is_admin=1;
        }

        $user->save();
        alert()->success('سطح دسترسی با موفقیت تغییر کرد')->persistent('بستن');

        return back();
    }
}
