<?php

namespace App\Repository\Clarification;

use App\Clarification;
use ClarificationRepository;

class ClarificationEloquent implements ClarificationRepository
{
    protected $model;

    public function __construct(Clarification $clarification)
    {
        $this->model = $clarification;
    }

    public function find($contestId, $to)
    {
        if ($contestId != -1) {
            return $this->model->where('contest_id', $contestId)->where('to', $to)->get();
        } else {
            return $this->model->where('to', $to)->get();
        }
    }

    public function create($request)
    {
        $this->model->create($request);
    }

    public function findFirst($id)
    {
        return $this->model->where('id', $id)->first();
    }
}