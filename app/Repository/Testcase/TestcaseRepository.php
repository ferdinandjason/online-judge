<?php

interface TestcaseRepository
{
    public function find($id);
    public function findFirst($id);
    public function create($request,$id);
    public function delete($id);
    public function getTestcase($id);
}