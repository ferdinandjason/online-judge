<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/14/18
 * Time: 11:37 AM
 */

namespace App\Repository\ProblemTag;


use App\ProblemTag;

class ProblemTagEloquent implements \ProblemTagRepository
{
    protected $model;

    public function __construct(ProblemTag $problemTag)
    {
        $this->model = $problemTag;
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return $this->model->where('id',$id)->get();
    }

    public function findFirst($id)
    {
        // TODO: Implement findFirst() method.
        return $this->model->where('id',$id)->first();
    }

    public function all()
    {
        // TODO: Implement all() method.
        return $this->model->all();
    }

    public function allPaginate($n)
    {
        // TODO: Implement allPaginate() method.
        return $this->model->paginate($n);
    }

    public function create($request)
    {
        // TODO: Implement create() method.
    }

    public function update($id,$request)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }


}