<?php

namespace App\Repository\UserSolvedProblem;

use App\UserSolvedProblem;
use UserSolvedProblemRepository;

class UserSolvedProblemEloquent implements UserSolvedProblemRepository
{
    protected $model;

    public function __construct(UserSolvedProblem $userSolvedProblem)
    {
        $this->model = $userSolvedProblem;
    }

    public function find($id)
    {
        return $this->model->where('user_id', $id)->orderBy('created_at', 'asc')->get();
    }

    public function create($request)
    {
        $this->model->create($request);
    }

}