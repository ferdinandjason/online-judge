<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $fillable = [
        'name','description','password','start_time','freeze_time','end_time','visible'
    ];
}