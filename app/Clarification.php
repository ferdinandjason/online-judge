<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clarification extends Model
{
    //
    protected $fillable = ['user_id','contest_id','title','content','to'];
}