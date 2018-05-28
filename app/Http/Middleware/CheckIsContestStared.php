<?php

namespace App\Http\Middleware;

use Closure;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CheckIsContestStared
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $array_uri = explode('/',$request->getRequestUri());
        if(count($array_uri)>2 && !Auth::user()->isAdmin ){
            $contestId = $array_uri[2];
            $contest = \Contest::getContest($contestId);
            if(Carbon::parse($contest->start_time)->diffInSeconds(Carbon::now(),false)>=0){
                return $next($request);
            }
            else if($array_uri[4]!='OOPS'){
                return redirect('/contest/'.$contestId.'/problems/OOPS');
            }
            else{
                return $next($request);
            }
        }
        else {
            return $next($request);
        }
    }
}
