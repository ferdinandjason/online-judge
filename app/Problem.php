<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    //
    public $incrementing = false;
    protected $fillable = [
        'id','title','description','sample_input','sample_output','time_limit','memory_limit','contest_only','total_submit',
        'total_ce','total_ac','total_wa','total_rte','total_tle','total_mle','total_fsc','total_tl'
    ];

    public function tags(){
        return $this->hasMany('App\ProblemTag');
    }
}
