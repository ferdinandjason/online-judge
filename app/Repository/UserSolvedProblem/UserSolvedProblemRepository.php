<?php

interface UserSolvedProblemRepository
{
    public function find($id);
    public function create($request);
}