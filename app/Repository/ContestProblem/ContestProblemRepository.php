<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/16/18
 * Time: 10:15 PM
 */

interface ContestProblemRepository
{
    public function all();
    public function delete($contestId,$problemId);
    public function create($request);
    public function findAndOrder($contest);
}