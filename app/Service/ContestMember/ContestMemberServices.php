<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/16/18
 * Time: 11:10 PM
 */

namespace App\Service\ContestMember;


class ContestMemberServices
{
    protected $repo;

    public function __construct(\ContestMemberRepository $contestMemberRepository)
    {
        $this->repo = $contestMemberRepository;
    }

    public function getContestMember($id){
        return $this->repo->all($id);
    }

    public function getAllContestMember(){
        return $this->repo->allContest();
    }

    public function create($request){
        $this->repo->create($request);
    }

    public function countPeopleJoin($id){
        return $this->repo->countPeopleJoin($id);
    }
}