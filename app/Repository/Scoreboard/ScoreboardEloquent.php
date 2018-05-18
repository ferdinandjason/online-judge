<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/18/18
 * Time: 5:57 PM
 */

namespace App\Repository\Scoreboard;


use App\Scoreboard;

class ScoreboardEloquent implements \ScoreboardRepository
{
    protected $model;

    public function __construct(Scoreboard $scoreboard)
    {
        $this->model = $scoreboard;
    }

    public function find($contestId,$problemId,$userId)
    {
        // TODO: Implement find() method.
        return $this->model
            ->where('contest_id',$contestId)
            ->where('problem_id',$problemId)
            ->where('user_id',$userId);
    }

    public function create(Array $request)
    {
        // TODO: Implement create() method.
        $this->model->create($request);
    }

    public function getContest($contestId)
    {
        // TODO: Implement getContest() method.
        return $this->model->where('contest_id',$contestId)->get();
    }


}