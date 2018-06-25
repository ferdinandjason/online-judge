<?php

namespace App\Service\User;

use Illuminate\Http\Request;
use UserRepository;

class UserServices
{
    protected $repo;

    public function __construct(UserRepository $userRepository)
    {
        $this->repo = $userRepository;
    }

    public function getAllUser()
    {
        return $this->repo->all();
    }

    public function getUser($id)
    {
        return $this->repo->find($id);
    }

    public function update($id,Request $request)
    {
        $this->repo->update($request,$id);
    }

    public function getRank()
    {
        return $this->repo->order();
    }

}