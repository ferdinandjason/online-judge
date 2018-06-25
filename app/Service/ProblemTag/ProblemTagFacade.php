<?php

namespace App\Service\ProblemTag;

use Illuminate\Support\Facades\Facade;

class ProblemTagFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ProblemTagServices';
    }
}