<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/14/18
 * Time: 11:37 AM
 */

namespace App\Repository\ProblemTag;

use App\ProblemTag;
use Illuminate\Support\Facades\DB;

class ProblemTagEloquent implements \ProblemTagRepository
{
    protected $model;

    public function __construct(ProblemTag $problemTag)
    {
        $this->model = $problemTag;
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return $this->model->where('name',$id)->get();
    }

    public function findFirst($id)
    {
        // TODO: Implement findFirst() method.
        return $this->model->where('id',$id)->first();
    }

    public function all()
    {
        // TODO: Implement all() method.
        return $this->model->select('name',DB::raw('count(*) as total'))
            ->groupBy('name')->orderBy('name')->get();
    }

    public function allPaginate($n)
    {
        // TODO: Implement allPaginate() method.
        return $this->model->select('name',DB::raw('count(*) as total'))
            ->groupBy('name')->orderBy('name')->paginate($n);
    }

    public function create($data,$request)
    {
        // TODO: Implement create() method.
        foreach ($data as $tag){
            $this->model->create(Array('name'=>$tag,'problem_id'=>$request['id']));
        }
    }

    public function update($id,$request){
        // TODO: Implement update() method.
        $temporary = $this->find($id);
        $data_tags_old = Array();
        foreach ($temporary as $t){
            array_push($data_tags_old,$t->Tags);
        }
        $data_tags = explode(',',$request['Tags']);
        if(count($data_tags) >= count($data_tags_old)){
            $temp = array_diff($data_tags,$data_tags_old);
            $this->create($temp,$request);
        }
        else{
            $this->delete($id);
            $this->create($data_tags,$request);
        }
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $this->model->where('Id',$id)->delete();
    }


}