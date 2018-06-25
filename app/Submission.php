<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Submission extends Model
{
    protected $fillable = ['problem_id', 'user_id','lang','contest_id'];

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }

    public function codes(){
        return DB::table('codes')->where('id',$this->id)->first();
    }
}
