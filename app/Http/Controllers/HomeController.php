<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth::user()->isSuperAdmin())
        {
            return redirect('/admin/panel');
        }
        elseif(Auth::user()->isUser())
        {
            return redirect('/panel/competiton/create');
        }
        elseif(Auth::user()->isReferee())
        {
            return redirect('/panel');
        }


    }

    public function index_en()
    {
//        session()->put('lang','english');
        return redirect('/home');
    }

    public function test(Request $request)
    {
//        $status=$request->file('email')->move(public_path('/'),$request->file('email')->getClientOriginalName());
//        dd($request->file('email').xml_());
//
//
//        xmlrpc_get_type($status);
//
//
//
//
//
//
//        dd(xattr_get($status));
        return view('user_fa.index');


    }
}


