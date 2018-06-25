<?php

namespace App\Service\Comment;

use CommentRepository;

class CommentServices
{
    protected $repo;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->repo = $commentRepository;
    }

    public function addNewComment($request)
    {
        $this->repo->create($request);
    }

    public function getProblemComment($id)
    {
        return $this->repo->all($id);
    }
}