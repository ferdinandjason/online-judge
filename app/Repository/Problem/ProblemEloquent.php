<?php

namespace App\Repository\Problem;

use App\Problem;
use ProblemRepository;

class ProblemEloquent implements ProblemRepository
{
    protected $model;

    public function __construct(Problem $problem)
    {
        $this->model = $problem;
    }

    public function find($id)
    {
        return $this->model->where('id',$id)->get();
    }

    public function findFirst($id)
    {
        return $this->model->where('id',$id)->first();
    }

    public function all()
    {
        return $this->model->orderBy('created_at','dsc')->get();
    }

    public function allPaginate($n)
    {
        return $this->model->paginate($n);
    }

    public function create(Array $request)
    {
        $this->model->create($request);
    }

    public function update($id,Array $request)
    {
        $this->mode->where('id',$id)->update($request->except('_method','_token','tags'));
    }

    public function delete($id)
    {
        $this->model->where('id',$id)->delete();
    }

    public function increment($id, $table)
    {
        $this->model->where('id',$id)->increment($table);
    }

    public function random()
    {
        return $this->model->inRandomOrder()->take(1)->first();
    }
}