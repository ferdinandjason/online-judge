<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/22/18
 * Time: 10:10 PM
 */

namespace App\Service\UserSolvedProblem;


class UserSolvedProblemServices
{
    protected $repo;

    public function __construct(\UserSolvedProblemRepository $userSolvedProblemRepository)
    {
        $this->repo = $userSolvedProblemRepository;
    }

    public function getUserSolvedProblem($id)
    {
        return $this->repo->find($id);
    }

    public function create($userId,$problemId)
    {
        $this->repo->create([
            'user_id'=>$userId,
            'problem_id'=>$problemId,
            'created_at'=>\Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now()

        ]);
    }
}