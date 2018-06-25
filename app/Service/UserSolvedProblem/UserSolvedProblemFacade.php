<?php

namespace App\Service\UserSolvedProblem;

use Illuminate\Support\Facades\Facade;

class UserSolvedProblemFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'UserSolvedProblemServices';
    }
}