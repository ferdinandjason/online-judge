<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContestMember extends Model
{
    //
    protected $fillable = [
        'contest_id','user_id'
    ];
}
