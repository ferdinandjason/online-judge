<?php

namespace App\Service\Contest;

use Illuminate\Support\Facades\Facade;

class ContestFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ContestServices';
    }
}