<?php

namespace App\Repository\Comment;

use App\Comment;
use CommentRepository;

class CommentEloquent implements CommentRepository
{
    protected $model;

    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }

    public function all($id)
    {
        return $this->model->where('problem_id',$id)->get();
    }

    public function create($request)
    {
        $this->model->create($request);
    }

}