<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContestMember extends Model
{
    protected $fillable = [
        'contest_id','user_id'
    ];

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
}
