<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/14/18
 * Time: 11:09 PM
 */

namespace App\Service\Testcase;


use Illuminate\Support\Facades\Facade;

class TestcaseFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'TestcaseServices';
    }
}