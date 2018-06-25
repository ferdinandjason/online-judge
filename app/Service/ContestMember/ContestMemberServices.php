<?php

namespace App\Service\ContestMember;

use ContestMemberRepository;

class ContestMemberServices
{
    protected $repo;

    public function __construct(ContestMemberRepository $contestMemberRepository)
    {
        $this->repo = $contestMemberRepository;
    }

    public function getContestMember($id)
    {
        return $this->repo->all($id);
    }

    public function getAllContestMember()
    {
        return $this->repo->allContest();
    }

    public function create($request)
    {
        $this->repo->create($request);
    }

    public function countPeopleJoin($id)
    {
        return $this->repo->countPeopleJoin($id);
    }
}