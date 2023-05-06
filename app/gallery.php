<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    protected $fillable=[
        'fname_fa','lname_fa','description_fa','image','fname_en','lname_en','description_en','gallery_category_id','gallery_category_id','status','insert_user_id'
    ];

    public function gallery_category()
    {
            return $this->belongsTo('App\gallery_category','gallery_category_id','id');
    }
}
