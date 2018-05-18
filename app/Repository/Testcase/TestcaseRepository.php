<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/14/18
 * Time: 11:04 PM
 */

interface TestcaseRepository
{
    public function find($id);
    public function findFirst($id);
    public function create($request,$id);
    public function delete($id);
    public function getTestcase($id);
}