<?php

namespace App\Service\Submission;

use Illuminate\Support\Facades\DB;
use SubmissionRepository;

class SubmissionServices
{
    protected $repo;

    public function __construct(SubmissionRepository $submissions_repo)
    {
        $this->repo = $submissions_repo;
    }

    public function getContestSubmission($contest)
    {
        return $this->repo->findContest($contest);
    }

    public function getSubmission($id)
    {
        return $this->repo->findFirst($id);
    }

    public function all()
    {
        return $this->repo->all();
    }

    public function create($request)
    {
        $array_lang = ['C++','C','Python'];
        $_POST['lang'] = $array_lang[$request['lang']];
        unset($_POST['_token']);

        $this->repo->create($_POST);
        $id = $this->repo->findLast()->id;
        DB::table('codes')->insert(Array('code'=>$request['codes'],'id'=>$id) );

        $temp = DB::table('users')->where('id',$request->get('user_id'))->first()->total_submission;
        DB::table('users')->where('id',$request->get('user_id'))->update(["total_submission"=>$temp+1]);

        $temp = DB::table('problems')->where('id',$request->get('problem_id'))->first()->total_submit;
        DB::table('problems')->where('id',$request->get('problem_id'))->update(["total_submit"=>$temp+1]);
    }

    public function hasNewSubmission()
    {
        return $this->repo->newSubmission()->take(1)->first();
    }

    public function getNewSubmission()
    {
        return $this->repo->newSubmission()->orderBy('id','asc')->first();
    }

    public function updateCompileResult($id,$compileResult)
    {
        $this->repo->updateCOmpileResult($id,$compileResult);
    }

    public function updateVerdictResult($id,$verdictResult)
    {
        $this->repo->updateVerdictResult($id,$verdictResult);
    }

    public function updateTimeResult($id,$verdictResult)
    {
        $this->repo->updateTimeResult($id,$verdictResult);
    }

    public function updateMemoryResult($id,$verdictResult)
    {
        $this->repo->updateMemoryResult($id,$verdictResult);
    }

    public function regrade($id){
        $this->repo->update($id,['verdict'=>-1]);
    }

    public function getSubmissionContestWithProblem($id,$pid){
        $this->repo->getSubmissionContestWithProblem($id,$pid);
    }

    public function getRank($id){
        return $this->repo->rankProblem($id);
    }
}