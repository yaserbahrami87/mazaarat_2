<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    public function getRouteKeyName()
    {
        return 'title_en';
    }

    protected $fillable=[
        'title_fa','description_fa','content_fa','image','title_en','description_en','content_en','festival_id','insert_user_id','date_fa','time_fa'
    ];

    public function festival()
    {
        return $this->belongsTo('App\festival');
    }
}
