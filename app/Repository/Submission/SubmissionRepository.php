<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/15/18
 * Time: 12:30 AM
 */

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
}