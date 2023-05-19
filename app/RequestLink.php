<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestLink extends Model
{
    protected $fillable=[
        'user_id','festival_id','link','status'
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
