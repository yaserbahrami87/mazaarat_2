<?php

namespace App;

use Carbon\Carbon;
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

    public function diff()
    {

        date_default_timezone_set('UTC');
        $dt=Carbon::now('Asia/Tehran');
        if (($dt->diffInSeconds($this->created_at))<=59)
        {
            return $dt->diffInMinutes($this->created_at)." ثانیه ";
        }
        else if( ($dt->diffInMinutes($this->created_at))<=59)
        {
            return $dt->diffInMinutes($this->created_at)." دقیقه ";
        }
        else if( ($dt->diffInHours($this->created_at))<=23)
        {
            return $dt->diffInHours($this->created_at)." ساعت ";
        }
        else
        {
            return $dt->diffInDays($this->created_at)." روز ";
        }
    }

    public function diff_en()
    {
        date_default_timezone_set('UTC');
        $dt=Carbon::now('Asia/Tehran');
        if (($dt->diffInSeconds($this->created_at))<=59)
        {
            return $dt->diffInMinutes($this->created_at)." Seconds ";
        }
        else if( ($dt->diffInMinutes($this->created_at))<=59)
        {
            return $dt->diffInMinutes($this->created_at)." Minutes ";
        }
        else if( ($dt->diffInHours($this->created_at))<=23)
        {
            return $dt->diffInHours($this->created_at)." Hours ";
        }
        else
        {
            return $dt->diffInDays($this->created_at)." Days ";
        }
    }
}
