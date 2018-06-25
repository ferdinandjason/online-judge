<?php

namespace App\Service\Testcase;

use Illuminate\Support\Facades\Facade;

class TestcaseFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'TestcaseServices';
    }
}