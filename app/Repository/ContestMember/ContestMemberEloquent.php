<?php

namespace App\Repository\ContestMember;

use App\ContestMember;
use ContestMemberRepository;
use Illuminate\Support\Facades\DB;

class ContestMemberEloquent implements ContestMemberRepository
{
    protected $model;

    public function __construct(ContestMember $contestMember)
    {
        $this->model = $contestMember;
    }

    public function all($id)
    {
        return $this->model->where('contest_id', $id)->get();
    }

    public function allContest()
    {
        return $this->model->all();
    }


    public function create($request)
    {
        $this->model->create($request->all());
    }

    public function countPeopleJoin($id)
    {
        return $this->model->select('contest_id', DB::raw('count(*) as member'))->groupBy('contest_id')->where('contest_id', $id)->first();
    }


}