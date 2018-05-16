<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/16/18
 * Time: 11:08 PM
 */

interface ContestMemberRepository
{
    public function all();
    public function create($request);
    public function countPeopleJoin($id);
}