<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/14/18
 * Time: 2:58 PM
 */

namespace App\Service\ProblemTag;


class ProblemTagServices
{
    protected $repo;

    public function __construct(\ProblemTagRepository $problemTagRepo)
    {
        $this->repo = $problemTagRepo;
    }

    public function all(){
        return $this->repo->all();
    }

    public function allPaginate($n){
        return $this->repo->allPaginate($n);
    }

    public function create($data,$request){
        $this->repo->create(explode(',',$data),$request);
    }

    public function update($request,$id){
        return $this->repo->update($request,$id);
    }

    public function getProblemTag($problemId){
        return $this->repo->find($problemId);
    }
}