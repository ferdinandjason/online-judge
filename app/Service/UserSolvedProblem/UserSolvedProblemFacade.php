<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/22/18
 * Time: 10:09 PM
 */

namespace App\Service\UserSolvedProblem;


use Illuminate\Support\Facades\Facade;

class UserSolvedProblemFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'UserSolvedProblemServices';
    }
}