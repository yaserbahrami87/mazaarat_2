<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ContactUs extends Model
{
    protected $table='contact_us';
    use Notifiable;

    protected $fillable=[
        'name','email','comment','status'
    ];

    public function status()
    {
        if ($this->status==1)
        {
            return "خوانده نشده";
        }
        else
        {
            return "خوانده نشده";
        }
    }

    public function comments()
    {
        return $this->hasMany('App\Comment','product_id')->where('type','=','contactUs');
    }
}
