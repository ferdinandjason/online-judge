<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/22/18
 * Time: 10:07 PM
 */

interface UserSolvedProblemRepository
{
    public function find($id);
    public function create($request);
}