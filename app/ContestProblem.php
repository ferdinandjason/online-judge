<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContestProblem extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'contest_id','problem_id','alias'
    ];
    protected $hidden = [
        'created_at','updated_at'
    ];

    public function problem(){
        $this->belongsTo('App\Problem');
    }
}
