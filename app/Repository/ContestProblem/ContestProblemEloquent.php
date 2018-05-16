<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/16/18
 * Time: 10:16 PM
 */

namespace App\Repository\ContestProblem;


use App\ContestProblem;

class ContestProblemEloquent implements \ContestProblemRepository
{
    protected $model;

    public function __construct(ContestProblem $contestProblem)
    {
        $this->model = $contestProblem;
    }

    public function all()
    {
        // TODO: Implement all() method.
        return $this->model->all();
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $this->model->where('id',$id)->delete();
    }

    public function create($request)
    {
        // TODO: Implement create() method.
        $this->model->create($request->all());
    }

    public function findAndOrder($contest)
    {
        // TODO: Implement findAndOrder() method.
        return $this->model->where('contest_id',$contest)->orderBy('alias')->get();
    }


}