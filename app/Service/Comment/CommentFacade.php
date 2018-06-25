<?php

namespace App\Service\Comment;

use Illuminate\Support\Facades\Facade;

class CommentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CommentServices';
    }
}