<?php

namespace App\Service\ContestProblem;

use ContestProblemRepository;

class ContestProblemServices
{
    protected $repo;

    public function __construct(ContestProblemRepository $contestProblemRepository)
    {
        $this->repo = $contestProblemRepository;
    }

    public function getContestProblem($contest)
    {
        return $this->repo->findAndOrder($contest);
    }

    public function create($request)
    {
        $this->repo->create($request);
    }

    public function delete($contestId, $problemId)
    {
        $this->repo->delete($contestId, $problemId);
    }
}