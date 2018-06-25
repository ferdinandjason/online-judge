<?php

interface ClarificationRepository
{
    public function find($contestId,$to);
    public function create($request);
    public function findFirst($id);
}