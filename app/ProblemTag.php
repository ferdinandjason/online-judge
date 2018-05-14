<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProblemTag extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'name','problem_id'
    ];
}
