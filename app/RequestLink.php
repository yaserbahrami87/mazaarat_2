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

    public function festival()
    {
        return $this->belongsTo('App\festival');
    }

    public function status()
    {
        switch ($this->status)
        {
            case 0:return "در حال بررسی";
                        break;
            case 1:return "تایید شده";
                        break;
            case 2:return "رد شده";
                        break;
            default:return "خطا";
        }
    }
}
