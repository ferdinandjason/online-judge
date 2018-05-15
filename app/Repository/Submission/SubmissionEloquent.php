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
}