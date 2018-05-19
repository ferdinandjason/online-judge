<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/19/18
 * Time: 6:46 PM
 */

namespace App\Service\Comment;


use Illuminate\Support\Facades\Facade;

class CommentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CommentServices';
    }
}