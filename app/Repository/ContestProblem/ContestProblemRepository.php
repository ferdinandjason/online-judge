<?php

interface ContestProblemRepository
{
    public function all();
    public function delete($contestId,$problemId);
    public function create($request);
    public function findAndOrder($contest);
}