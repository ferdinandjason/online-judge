<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/15/18
 * Time: 1:50 PM
 */

namespace App\Service\Submission;


use Illuminate\Support\Facades\Facade;

class SubmissionFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SubmissionServices';
    }
}