<?php

namespace App\Service\UserSolvedProblem;

use Carbon\Carbon;
use UserSolvedProblemRepository;

class UserSolvedProblemServices
{
    protected $repo;

    public function __construct(UserSolvedProblemRepository $userSolvedProblemRepository)
    {
        $this->repo = $userSolvedProblemRepository;
    }

    public function getUserSolvedProblem($id)
    {
        return $this->repo->find($id);
    }

    public function create($userId, $problemId)
    {
        $this->repo->create([
            'user_id' => $userId,
            'problem_id' => $problemId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);
    }
}