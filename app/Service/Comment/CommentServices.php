<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/19/18
 * Time: 6:48 PM
 */

namespace App\Service\Comment;


class CommentServices
{
    protected $repo;

    public function __construct(\CommentRepository $commentRepository)
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