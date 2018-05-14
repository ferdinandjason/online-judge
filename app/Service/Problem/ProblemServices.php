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

	public function create(Request $request){
		$this->repo->create($request);
	}

	public function update($id,Request $request){
		$this->repo->update($id,$request);
	}

	public function delete($id){
		$this->repo->delete($id);
	}

}