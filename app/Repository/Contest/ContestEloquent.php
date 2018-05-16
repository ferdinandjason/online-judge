<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/16/18
 * Time: 9:18 PM
 */

namespace App\Repository\Contest;


use App\Contest;

class ContestEloquent implements \ContestRepository
{
    protected $model;

    public function __construct(Contest $contest)
    {
        $this->model = $contest;
    }

    public function findFirst($id)
    {
        // TODO: Implement findFirst() method.
        return $this->model->where('id',$id)->first();
    }

    public function all()
    {
        // TODO: Implement all() method.
        return $this->model->all();
    }

    public function create(Array $request)
    {
        // TODO: Implement create() method.
        $this->model->create($request);
    }

    public function update($id, Array $request)
    {
        // TODO: Implement update() method.
        $this->model->where('id',$id)->update($request);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $this->model->where('id',$id)->delete();
    }

}