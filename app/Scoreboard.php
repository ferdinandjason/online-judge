<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scoreboard extends Model
{
    protected $fillable = ['contest_id','problem_id', 'user_id','submission_count','penalty','is_accepted'];
}
