<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/14/18
 * Time: 2:57 PM
 */

namespace App\Service\ProblemTag;

use Illuminate\Support\Facades\Facade;

class ProblemTagFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ProblemTagServices';
    }
}