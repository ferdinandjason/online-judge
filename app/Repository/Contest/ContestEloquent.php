<?php

namespace App\Repository\Contest;

use App\Contest;
use ContestRepository;

class ContestEloquent implements ContestRepository
{
    protected $model;

    public function __construct(Contest $contest)
    {
        $this->model = $contest;
    }

    public function findFirst($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(Array $request)
    {
        $this->model->create($request);
    }

    public function update($id, Array $request)
    {
        $this->model->where('id', $id)->update($request);
    }

    public function delete($id)
    {
        $this->model->where('id', $id)->delete();
    }

    public function findQuery($query)
    {
        if ($query == 'active') {
            return $this->model->where('visible', 1)->get();
        } else {
            return $this->model->where('visible', 0)->get();
        }
    }


}