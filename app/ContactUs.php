<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table='contact_us';

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
}
