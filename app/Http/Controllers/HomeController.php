<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

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

        return view('user_fa.index');
    }

    public function test(Request $request)
    {
        $status=$request->file('email')->move(public_path('/'),$request->file('email')->getClientOriginalName());
        dd($request->file('email').xml_());


        xmlrpc_get_type($status);






        dd(xattr_get($status));



    }
}


