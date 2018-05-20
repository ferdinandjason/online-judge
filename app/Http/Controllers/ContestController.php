<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Contest;
use ContestMember;
use ContestProblem;
use Submission;
use Scoreboard;
use Problem;

class ContestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $link = (explode('/',$request->url()));
        $contest = Contest::all();
        $contestMember = ContestMember::getAllContestMember();
        if(Auth::user()->isAdmin){
            if($link[3] === 'contest'){
                return redirect('admin/contest');
            }
            return view('admin.contest.index',compact('contest','contestMember'));
        }
        else{
            if($link[3] === 'admin'){
                return redirect('contest');
            }
            return view('contest.index',compact('contest','contestMember'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.contest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(!isset($_POST['active'])){
            $_POST['active'] = 0;
        }
        else{
            $_POST['active'] = 1;
        }
        Contest::validator($request);
        Contest::create(Contest::prosesPostData($_POST));
        return redirect('contest');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $contest = Contest::getContest($id);
        $contestProblem = ContestProblem::getContestProblem($id);
        return view('contest.show',compact('contest','contestProblem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contest = Contest::getContest($id);
        return view('admin.contest.edit',compact('contest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$contest)
    {
        //
        if(!isset($_POST['active'])){
            $_POST['active'] = 0;
        }
        else{
            $_POST['active'] = 1;
        }
        Contest::validator($request);
        Contest::update($contest,Contest::prosesPostData($_POST));
        return redirect('contest');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contest $contest)
    {
        //
        Contest::delete($contest);
        return redirect('contest');
    }

    public function messages()
    {
        return [
            'required'=>'The :attribute field is required',
            'string'=>'The :attribute value :input is not string'
        ];
    }

    public function problemIndex($id){
        $contest = Contest::getContest($id);
        $contestProblem = ContestProblem::getContestProblem($id);
        return view('contest.problem.index',compact('contestProblem','contest'));
    }

    public function submissionIndex($id){
        $contest = Contest::getContest($id);
        $contestProblem = ContestProblem::getContestProblem($id);
        $contestSubmission = Submission::getContestSubmission($id);
        return view('contest.submission.index',compact('contestSubmission','contest','contestProblem'));
    }

    public function scoreboard($id){
        $contest = Contest::getContest($id);
        $contestProblem = ContestProblem::getContestProblem($id);
        $scoreboard = Scoreboard::getScoreboard($id);
        return view('contest.scoreboard',compact('scoreboard','contest','contestProblem'));
    }

    public function submit($id,$pid){
        $contest = Contest::getContest($id);
        $contestProblem = ContestProblem::getContestProblem($id);
        $problem = Problem::getProblem($pid);
        return view('contest.submission.create',compact('contest','contestProblem','problem'));
    }

    public function submission($id,$sid){
        $submission = Submission::getSubmission($sid);
        $contest = Contest::getContest($id);
        $contestProblem = ContestProblem::getContestProblem($id);
        return view('contest.submission.show',compact('submission','contest','contestProblem'));
    }
}
