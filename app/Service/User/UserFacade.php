<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/19/18
 * Time: 5:56 PM
 */

namespace App\Service\User;


use Illuminate\Support\Facades\Facade;

class UserFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'UserServices';
    }
}