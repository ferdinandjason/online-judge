<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/19/18
 * Time: 6:41 PM
 */

interface CommentRepository
{
    public function all($id);
    public function create($request);
}