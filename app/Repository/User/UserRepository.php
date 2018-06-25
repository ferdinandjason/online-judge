<?php

interface UserRepository{
    public function all();
    public function find($id);
    public function update($request,$id);
    public function order();
}