<?php

interface ScoreboardRepository
{
    public function find($contestId,$problemId,$userId);
    public function create(Array $request);
    public function getContest($contestId);
}