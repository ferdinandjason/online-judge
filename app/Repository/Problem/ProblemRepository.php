<?php

interface ProblemRepository{
    public function find($id);
    public function findFirst($id);
    public function all();
    public function allPaginate($n);
    public function create(Array $request);
    public function update($id,Array $request);
    public function delete($id);
    public function increment($id,$table);
    public function random();
}