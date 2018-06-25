<?php

namespace App\Service\Scoreboard;

use Illuminate\Support\Facades\Facade;

class ScoreboardFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ScoreboardServices';
    }
}