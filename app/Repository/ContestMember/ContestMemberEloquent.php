<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/16/18
 * Time: 11:08 PM
 */

namespace App\Repository\ContestMember;

use Illuminate\Support\Facades\DB;
use App\ContestMember;

class ContestMemberEloquent implements \ContestMemberRepository
{
    protected $model;

    public function __construct(ContestMember $contestMember)
    {
        $this->model = $contestMember;
    }

    public function all()
    {
        return $this->model->all();
        // TODO: Implement all() method.
    }

    public function create($request)
    {
        $this->model->create($request->all());
        // TODO: Implement create() method.
    }

    public function countPeopleJoin($id)
    {
        // TODO: Implement countPeopleJoin() method.
        return $this->model->select('contest_id',DB::raw('count(*) as member'))->groupBy('contest_id')->where('contest_id',$id)->first();
    }


}