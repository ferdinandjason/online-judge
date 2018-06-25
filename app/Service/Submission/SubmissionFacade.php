<?php

namespace App\Service\Submission;

use Illuminate\Support\Facades\Facade;

class SubmissionFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SubmissionServices';
    }
}