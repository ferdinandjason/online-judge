<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/19/18
 * Time: 7:59 PM
 */

namespace App\Service\Clarification;


use Illuminate\Support\Facades\Facade;

class ClarificationFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ClarificationServices';
    }
}