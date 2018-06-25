<?php

interface ProblemTagRepository
{
    public function find($id);
    public function findFirst($id);
    public function all();
    public function allPaginate($n);
    public function create($data,$request);
    public function update($id,$request);
    public function delete($id);
}