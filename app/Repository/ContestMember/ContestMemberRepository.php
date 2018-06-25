<?php

interface ContestMemberRepository
{
    public function all($id);
    public function allContest();
    public function create($request);
    public function countPeopleJoin($id);
}