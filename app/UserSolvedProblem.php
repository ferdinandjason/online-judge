<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSolvedProblem extends Model
{
    //
    public $incrementing=false;
    protected $fillable = ['user_id','problem_id','created_at','updated_at'];
}
