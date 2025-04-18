<?php

namespace App\Http\Controllers\admin;

use App\festival;
use App\Http\Controllers\Controller;
use App\state;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $states=state::get();
        return view('admin.users.user_insert')
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
        $this->validate($request, [
            'fname'     => ['required', 'string', 'max:255'],
            'lname'     => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'tel'       => ['required', 'string', 'min:8'],
            'country'   => ['required', 'string' ],
            'code'      => ['required', 'string' ],
            'state_id'  =>'required_if:code,+98','numeric',
            'city_id'   =>'required_if:code,+98','numeric',
        ]);

        if(!isset($request['state_id']))
        {
            $request['state_id']=NULL;
        }

        if(!isset($request['city_id']))
        {
            $request['city_id']=NULL;
        }

        $user=User::create([
            'fname'     => $request['fname'],
            'lname'     => $request['lname'],
            'email'     => $request['email'],
            'tel'       => $request['tel'],
            'country'   => $request['country'],
            'code'      => $request['code'],
            'password'  => Hash::make($request['password']),
            'state_id'  => $request['state_id'],
            'city_id'   => $request['city_id'],
        ]);

        if($user)
        {
            alert()->success('کاربر با موفقیت ثبت نام شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت نام کاربر')->persistent('بستن');
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
        $request->validate([
           'fname'  =>'nullable|string|min:2|max:100',
           'lname'  =>'nullable|string|min:2|max:100',
        ]);

        $status=$user->update($request->all());

        if($status)
        {
            alert()->success('اطلاعات با موفقیت بروزرسانی شد')->persistent('بستن');
        }
        else
        {
            alert()->success('خطا در بروزرسانی')->persistent('بستن');
        }

        return back();
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

    public function changePassword(User $user,Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);


        $user->password=Hash::make($request->password);
        $status=$user->save();
        if($status)
        {
            alert()->success('رمز با موفقیت تغییر کرد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بروزرسانی')->persistent('بستن');
        }

        return back();


    }
}
