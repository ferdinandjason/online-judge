<?php

interface SubmissionRepository
{
    public function findFirst($id);
    public function findContest($id);
    public function all();
    public function create($request);
    public function findLast();
    public function newSubmission();
    public function updateCompileResult($id,$compileResult);
    public function updateVerdictResult($id,$verdictResult);
    public function updateTimeResult($id,$time);
    public function updateMemoryResult($id,$memo);
    public function update($id,$data);
    public function getSubmissionContestWithProblem($id,$pid);
    public function rankProblem($id);
}