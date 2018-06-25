<?php

interface ContestRepository{
    public function findFirst($id);
    public function all();
    public function create(Array $request);
    public function update($id,Array $request);
    public function delete($id);
    public function findQuery($query);
}