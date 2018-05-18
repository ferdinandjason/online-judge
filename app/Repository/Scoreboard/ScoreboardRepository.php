<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/18/18
 * Time: 5:57 PM
 */

interface ScoreboardRepository
{
    public function find($contestId,$problemId,$userId);
    public function create(Array $request);
    public function getContest($contestId);
}