<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname','lname', 'email','father_name' ,'password','is_admin','type','type','code','country','tel','state_id','city_id','gender','datebirth','shenasnameh','codemelli','image','education','reshteh','resume'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isSuperAdmin()
    {
        return $this->is_admin;
    }

    public function isUser()
    {
        if($this->type==1)
        {
            return true;
        }
    }

    public function isReferee()
    {
        if($this->type==2)
        {
            return true;
        }
    }

    public  function competitions()
    {
        return $this->hasMany('App\competiton');
    }

    public function state()
    {
        return $this->belongsTo('App\state','state_id','id');
    }

    public function city()
    {
        return $this->belongsTo('App\city','city_id','id');
    }

    public function requestLinks()
    {
        return $this->hasMany('App\RequestLink','user_id','id');
    }

    public function comments()
    {
        return $this->hasMany('App\comment','user_id','id');
    }


}
