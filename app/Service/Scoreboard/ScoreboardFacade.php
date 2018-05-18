<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/18/18
 * Time: 5:56 PM
 */

namespace App\Service\Scoreboard;


use Illuminate\Support\Facades\Facade;

class ScoreboardFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ScoreboardServices';
    }
}