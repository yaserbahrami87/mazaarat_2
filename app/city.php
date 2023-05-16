<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    public function User()
    {
        return $this->hasMany('App\User','city_id','id');
    }
}
