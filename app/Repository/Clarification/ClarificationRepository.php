<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/19/18
 * Time: 7:54 PM
 */

interface ClarificationRepository
{
    public function find($contestId,$to);
    public function create($request);
    public function findFirst($id);
}