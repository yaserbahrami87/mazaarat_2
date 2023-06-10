<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
        'user_id','comment','user_id_answer','comment_id','product_id','type'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function contactUs()
    {
        return $this->belongsTo('App\ContactUs','product_id');
    }
}
