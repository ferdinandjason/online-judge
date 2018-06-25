<?php

interface CommentRepository
{
    public function all($id);
    public function create($request);
}