<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class competiton extends Model
{

    protected $fillable=[
        'user_id','image','competiton_category_id','description','name_place','location','date_fa','time_fa','status','festival_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function competition_category()
    {
        return $this->belongsTo('App\competiton_category','competiton_category_id','id');
    }

    public function referee()
    {
        return $this->hasMany('App\competition');
    }

    public function referees()
    {
        return $this->hasMany(refereeing::class);
    }

    public function scopeUnrefereed($query)
    {
        return $query->whereDoesntHave('referees');
    }

    public function scopeUnrefereedBy($query, $userId)
    {
        return $query->whereDoesntHave('referees', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        });
    }

    // در مدل Competition
    public function refereeScores()
    {
        return $this->hasMany(Refereeing::class)->where('is_public', false);
    }

    public function publicScore()
    {
        return $this->hasOne(Refereeing::class)->where('is_public', true);
    }










}
