<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['problem_id','user_id','comment'];

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
}