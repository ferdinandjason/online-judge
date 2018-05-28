<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserAlreadyRegister
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
        if(count($array_uri)>2){
            $contestId = $array_uri[2];
        }
        else {
            return $next($request);
        }

        if(NotInsideCM($contestId,\ContestMember::getContestMember($contestId)) && !Auth::user()->isAdmin){
            return redirect('/contest');
        }
        return $next($request);
    }
}
