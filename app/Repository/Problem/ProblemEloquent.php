<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/14/18
 * Time: 11:24 AM
 */

namespace App\Repository\Problem;


use App\Problem;

class ProblemEloquent implements \ProblemRepository
{
    protected $model;

    public function __construct(Problem $problem)
    {
        $this->model = $problem;
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
        return $this->model->orderBy('created_at','dsc')->get();
    }

    public function allPaginate($n)
    {
        // TODO: Implement allPaginate() method.
        return $this->model->paginate($n);
    }

    public function create(Array $request)
    {
        // TODO: Implement create() method.
        $this->model->create($request);
    }

    public function update($id,Array $request)
    {
        // TODO: Implement update() method.
        $this->mode->where('id',$id)->update($request->except('_method','_token','tags'));
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $this->model->where('id',$id)->delete();
    }

    public function increment($id, $table)
    {
        // TODO: Implement increment() method.
        $this->model->where('id',$id)->increment($table);
    }


}