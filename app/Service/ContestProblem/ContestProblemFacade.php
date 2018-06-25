<?php

namespace App\Service\ContestProblem;

use Illuminate\Support\Facades\Facade;

class ContestProblemFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ContestProblemServices';
    }
}