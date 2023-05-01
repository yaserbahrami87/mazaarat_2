<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pillar extends Model
{
    protected $fillable=[
        'fname_fa','lname_fa','position_fa','biography_fa','image','fname_en','lname_en','position_en','biography_en','order','insert_user_id','festival_id','status'
    ];

    public function festival()
    {
        return $this->belongsTo('App\festival');
    }
}
