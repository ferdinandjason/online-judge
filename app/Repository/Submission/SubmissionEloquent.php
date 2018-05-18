<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/15/18
 * Time: 12:33 AM
 */

namespace App\Repository\Submission;


use App\Submission;

class SubmissionEloquent implements \SubmissionRepository
{
    protected $model;

    public function __construct(Submission $submissions)
    {
        $this->model = $submissions;
    }

    public function findFirst($id)
    {
        return $this->model->where('id',$id)->first();
    }

    public function findContest($id)
    {
        return $this->model->where('contest_id',$id)->get();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create($request)
    {
        // TODO: Implement create() method.
        $this->model->create($request);
    }

    public function findLast()
    {
        // TODO: Implement findLast() method.
        return $this->model->orderBy('id','desc')->first();
    }

    public function newSubmission()
    {
        // TODO: Implement newSubmission() method.
        return $this->model->where('verdict','<=',0);
    }

    public function updateCompileResult($id, $compileResult)
    {
        // TODO: Implement updateCOmpileResult() method.
        $this->model->where('id',$id)->update(['compile_result'=>$compileResult]);
    }

    public function updateVerdictResult($id, $verdictResult)
    {
        // TODO: Implement updateVerdictResult() method.
        $this->model->where('id',$id)->update(['verdict'=>$verdictResult]);
    }

    public function updateTimeResult($id, $time)
    {
        // TODO: Implement updateTimeResult() method.
        $this->model->where('id',$id)->update(['time'=>$time]);
    }

    public function updateMemoryResult($id, $memo)
    {
        // TODO: Implement updateMemoryResult() method.
        $this->model->where('id',$id)->update(['memory'=>$memo]);
    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
        $this->model->where('id',$id)->update($data);
    }

    public function getSubmissionContestWithProblem($id, $pid)
    {
        // TODO: Implement getSubmissionContestWithProblem() method.
        return $this->model->where('contest_id',$id)->where('problem_id',$id)->get();
    }


}