<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/16/18
 * Time: 11:09 PM
 */

namespace App\Service\ContestMember;


use Illuminate\Support\Facades\Facade;

class ContestMemberFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ContestMemberServices';
    }
}