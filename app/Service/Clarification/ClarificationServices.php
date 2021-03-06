<?php

namespace App\Service\Clarification;

use ClarificationRepository;

class ClarificationServices
{
    protected $repo;

    public function __construct(ClarificationRepository $clarificationRepository)
    {
        $this->repo = $clarificationRepository;
    }

    public function getClarificationFromAdmin($contestId)
    {
        return $this->repo->find($contestId,0);
    }

    public function getClarificationFromUser()
    {
        return $this->repo->find(-1,1);
    }

    public function create($request)
    {
        $this->repo->create($request);
    }

    public function validator($request){
        return $request->validate([
            'user_id'=>'required',
            'contest_id'=>'required',
            'title'=>'required|string',
            'content'=>'required|string',
            'to'=>'required'
        ]);
    }

    public function getClarification($clarificationId){
        return $this->repo->findFirst($clarificationId);
    }
}