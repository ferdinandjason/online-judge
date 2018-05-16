<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/16/18
 * Time: 10:20 PM
 */

namespace App\Service\ContestProblem;


use Illuminate\Support\Facades\Facade;

class ContestProblemFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ContestProblemServices';
    }
}