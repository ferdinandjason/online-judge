<?php

namespace App\Service\Clarification;

use Illuminate\Support\Facades\Facade;

class ClarificationFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ClarificationServices';
    }
}