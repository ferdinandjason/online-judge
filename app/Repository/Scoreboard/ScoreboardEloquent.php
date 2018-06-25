<?php

namespace App\Repository\Scoreboard;

use App\Scoreboard;
use ScoreboardRepository;

class ScoreboardEloquent implements ScoreboardRepository
{
    protected $model;

    public function __construct(Scoreboard $scoreboard)
    {
        $this->model = $scoreboard;
    }

    public function find($contestId,$problemId,$userId)
    {
        return $this->model
            ->where('contest_id',$contestId)
            ->where('problem_id',$problemId)
            ->where('user_id',$userId);
    }

    public function create(Array $request)
    {
        $this->model->create($request);
    }

    public function getContest($contestId)
    {
        return $this->model->where('contest_id',$contestId)->get();
    }


}