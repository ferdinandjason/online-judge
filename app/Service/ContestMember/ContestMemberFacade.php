<?php

namespace App\Service\ContestMember;

use Illuminate\Support\Facades\Facade;

class ContestMemberFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ContestMemberServices';
    }
}