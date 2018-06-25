<?php

namespace App\Repository\Submission;

use App\Submission;
use SubmissionRepository;

class SubmissionEloquent implements SubmissionRepository
{
    protected $model;

    public function __construct(Submission $submissions)
    {
        $this->model = $submissions;
    }

    public function findFirst($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function findContest($id)
    {
        return $this->model->where('contest_id', $id)->get();
    }

    public function all()
    {
        return $this->model->orderBy('created_at', 'dsc')->get();
    }

    public function create($request)
    {
        $this->model->create($request);
    }

    public function findLast()
    {
        return $this->model->orderBy('id', 'desc')->first();
    }

    public function newSubmission()
    {
        return $this->model->where('verdict', '<=', 0);
    }

    public function updateCompileResult($id, $compileResult)
    {
        $this->model->where('id', $id)->update(['compile_result' => $compileResult]);
    }

    public function updateVerdictResult($id, $verdictResult)
    {
        $this->model->where('id', $id)->update(['verdict' => $verdictResult]);
    }

    public function updateTimeResult($id, $time)
    {
        $this->model->where('id', $id)->update(['time' => $time]);
    }

    public function updateMemoryResult($id, $memo)
    {
        $this->model->where('id', $id)->update(['memory' => $memo]);
    }

    public function update($id, $data)
    {
        $this->model->where('id', $id)->update($data);
    }

    public function getSubmissionContestWithProblem($id, $pid)
    {
        return $this->model->where('contest_id', $id)->where('problem_id', $id)->get();
    }

    public function rankProblem($id)
    {
        return $this->model->where('problem_id', $id)->orderBy('time')->get();
    }


}