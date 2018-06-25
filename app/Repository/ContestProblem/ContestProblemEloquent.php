<?php

namespace App\Repository\ContestProblem;

use App\ContestProblem;
use ContestProblemRepository;

class ContestProblemEloquent implements ContestProblemRepository
{
    protected $model;

    public function __construct(ContestProblem $contestProblem)
    {
        $this->model = $contestProblem;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function delete($contestId,$problemId)
    {
        $this->model->where('contest_id',$contestId)->where('problem_id',$problemId)->delete();
    }

    public function create($request)
    {
        $this->model->create($request->all());
    }

    public function findAndOrder($contest)
    {
        return $this->model->where('contest_id',$contest)->orderBy('alias')->get();
    }


}