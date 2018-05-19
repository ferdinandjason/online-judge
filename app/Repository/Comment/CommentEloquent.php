<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/19/18
 * Time: 6:42 PM
 */

namespace App\Repository\Comment;


use App\Comment;

class CommentEloquent implements \CommentRepository
{
    protected $model;

    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }

    public function all($id)
    {
        // TODO: Implement all() method.
        return $this->model->where('problem_id',$id)->get();
    }

    public function create($request)
    {
        // TODO: Implement create() method.
        $this->model->create($request);
    }

}