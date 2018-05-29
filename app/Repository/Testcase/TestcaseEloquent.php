<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/14/18
 * Time: 11:05 PM
 */

namespace App\Repository\Testcase;

use App\Testcase;


class TestcaseEloquent implements \TestcaseRepository
{
    protected $model;

    public function __construct(Testcase $testcase)
    {
        $this->model = $testcase;
    }

    public function find($id)
    {
        return $this->model->where('problem_id',$id)->get();
    }

    public function findFirst($id)
    {
        return $this->model->where('id',$id)->first();
    }

    public function create($request,$id)
    {
        if (!is_dir('../../../public/storage/testcase/'.$id)){
            mkdir('../../../public/storage/testcase/'.$id,0777,true);
        }

        $path_in = $request->file('input')->storeAs('testcase/'.$id ,$request->file('input')->getClientOriginalName(),'public');
        $path_out = $request->file('output')->storeAs('testcase/'.$id ,$request->file('output')->getClientOriginalName(),'public');
        $this->model->create(Array('problem_id'=>$id,'path_input'=>$path_in,'path_output'=>$path_out));
    }

    public function delete($id)
    {
        $this->model->where('id',$id)->delete();
    }

    public function getTestcase($id)
    {
        // TODO: Implement getTestcase() method.
        return $this->model->where('problem_id',$id)->get();
    }


}