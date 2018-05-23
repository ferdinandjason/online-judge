<?php

namespace App\Service\Problem;

use Illuminate\Http\Request;

class ProblemServices
{
	protected $repo;

	public function __construct(\ProblemRepository $problemRepo)
	{
		$this->repo = $problemRepo;
	}

	public function getProblem($id){
		return $this->repo->findFirst($id);
	}

	public function all(){
		return $this->repo->all();
	}

	public function create(Array $request){
        if(!isset($request['active'])){
            $request['active'] = 0;
        }
        else{
            $request['active'] = 1;
        }
		$this->repo->create($request);
	}

	public function update($id,Array $request){
		$this->repo->update($id,$request);
	}

	public function delete($id){
		$this->repo->delete($id);
	}

	public function validate($request){
        return $request->validate([
            'id'=>'required|string',
            'title'=>'required',
            'time_limit'=>'required|integer|between:1,10',
            'memory_limit'=>'required|integer|between:32,1024',
            'description'=>'required',
            'tags'=>'required'
        ]);
    }

    public function increment($id,$table)
    {
        $this->repo->increment($id,$table);
    }

    public function getRandom()
    {
        return $this->repo->random();
    }
}