<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gallery_category extends Model
{
    protected $fillable=[
        'category_fa','category_en','status'
    ];

    public function getRouteKeyName()
    {
        return 'category_en';
    }

    public function gallery()
    {
        return $this->hasMany('App\gallery','gallery_category_id','id');
    }

}
