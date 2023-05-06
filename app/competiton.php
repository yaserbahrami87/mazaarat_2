<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class competiton extends Model
{
    protected $fillable=[
        'user_id','image','competiton_category_id','description','name_place','location','date_fa','time_fa','status','festival_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
