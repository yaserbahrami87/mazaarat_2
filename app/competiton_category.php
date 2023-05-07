<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class competiton_category extends Model
{
    protected $fillable=[
        'category_fa','category_fa','category_en','status'
    ];

    public function competitions()
    {
        $this->hasMany('App\competiton_category','competiton_category_id','id');
    }
}
