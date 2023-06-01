<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
        'user_id','comment','user_id_answer','comment_id','product_id','type'
    ];
}
