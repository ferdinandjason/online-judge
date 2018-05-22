<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/22/18
 * Time: 10:07 PM
 */

namespace App\Repository\UserSolvedProblem;


use App\UserSolvedProblem;

class UserSolvedProblemEloquent implements \UserSolvedProblemRepository
{
    protected $model;

    public function __construct(UserSolvedProblem $userSolvedProblem)
    {
        $this->model = $userSolvedProblem;
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return $this->model->where('user_id',$id)->orderBy('created_at','asc')->get();
    }

    public function create($request)
    {
        // TODO: Implement create() method.
        $this->model->create($request);
    }

}