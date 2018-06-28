<?php

namespace App\Service\ProblemTag;

use ProblemTagRepository;

class ProblemTagServices
{
    protected $repo;

    public function __construct(ProblemTagRepository $problemTagRepo)
    {
        $this->repo = $problemTagRepo;
    }

    public function all()
    {
        return $this->repo->all();
    }

    public function allPaginate($n)
    {
        return $this->repo->allPaginate($n);
    }

    public function create($data, $problem_id)
    {
        $this->repo->create(explode(',', $data), $problem_id);
    }

    public function update($request, $id)
    {
        return $this->repo->update($request, $id);
    }

    public function getProblemTag($problemId)
    {
        return $this->repo->find($problemId);
    }
}