<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/15/18
 * Time: 1:51 PM
 */

namespace App\Service\Submission;

use Illuminate\Support\Facades\DB;

class SubmissionServices
{
    protected $repo;

    public function __construct(\SubmissionRepository $submissions_repo)
    {
        $this->repo = $submissions_repo;
    }

    public function getContestSubmission($contest)
    {
        return $this->repo->findContest($contest,20);
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
}