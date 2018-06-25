<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testcase extends Model
{
    protected $fillable = [
        'problem_id', 'path_input' , 'path_output'
    ];
}
