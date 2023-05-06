<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class festival extends Model
{
    protected $fillable=[
        'festival_fa','call_fa','start_date_fa','start_time_fa','end_date_fa','end_time_fa','judgment_date_fa','judgment_time_fa','winner_date_fa','winner_time_fa','festival_en','call_en','start_date_en','start_time_en','end_date_en','end_time_en','judgment_date_en','judgment_time_en','winner_date_en','winner_time_en','insert_user_id','order'
    ];

    public function getRouteKeyName()
    {
        return 'festival_en';
    }

    public function pillars()
    {
        return $this->hasMany('App\pillar');
    }

    public function news()
    {
        return $this->hasMany('App\news');
    }

    public function gallery()
    {
        return $this->hasMany('App\gallery');
    }


}
