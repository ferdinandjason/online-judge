<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/16/18
 * Time: 9:25 PM
 */

namespace App\Service\Contest;


use Illuminate\Support\Facades\Facade;

class ContestFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ContestServices';
    }
}