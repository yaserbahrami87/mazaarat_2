<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
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

    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(!isset($data['state_id']))
        {
            $data['state_id']=NULL;
        }

        if(!isset($data['city_id']))
        {
            $data['city_id']=NULL;
        }

        return User::create([
            'fname'     => $data['fname'],
            'lname'     => $data['lname'],
            'email'     => $data['email'],
            'tel'       => $data['tel'],
            'country'   => $data['country'],
            'code'      => $data['code'],
            'password'  => Hash::make($data['password']),
            'state_id'  => $data['state_id'],
            'city_id'   => $data['city_id'],
        ]);
    }
}
