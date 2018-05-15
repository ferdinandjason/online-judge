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
}