<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class refereeing extends Model
{
    protected $fillable=[
        'competiton_id','user_id','festival_id','score','date_fa','time_fa','description','status','is_public'
    ];

    public function competition()
    {
        return $this->belongsTo(competiton::class,'competiton_id','id');
    }


    public function unratedCompetitions()
    {
        return competiton::whereDoesntHave('referees', function ($query) {
            $query->where('referee_id', $this->id);
        })->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
