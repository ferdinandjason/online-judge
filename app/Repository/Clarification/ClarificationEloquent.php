<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/19/18
 * Time: 7:55 PM
 */

namespace App\Repository\Clarification;


use App\Clarification;

class ClarificationEloquent implements \ClarificationRepository
{
    protected $model;

    public function __construct(Clarification $clarification)
    {
        $this->model = $clarification;
    }

    public function find($contestId, $to)
    {
        // TODO: Implement find() method.
        if($contestId != -1){
            return $this->model->where('contest_id',$contestId)->where('to',$to)->get();
        }
        else{
            return $this->model->where('to',$to)->get();
        }
    }

    public function create($request)
    {
        // TODO: Implement create() method.
        $this->model->create($request);
    }

    public function findFirst($id)
    {
        // TODO: Implement findFirst() method.
        return $this->model->where('id',$id)->first();
    }
}