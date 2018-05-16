<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/16/18
 * Time: 10:20 PM
 */

namespace App\Service\ContestProblem;


class ContestProblemServices
{
    protected $repo;

    public function __construct(\ContestProblemRepository $contestProblemRepository)
    {
        $this->repo = $contestProblemRepository;
    }

    public function getContestProblem($contest){
        return $this->repo->findAndOrder($contest);
    }

    public function create($request){
        $this->repo->create($request);
    }

    public function delete($id){
        $this->repo->delete($id);
    }
}