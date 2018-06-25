<?php

namespace App\Http\Controllers;

use Contest;
use ContestProblem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Problem;

class ContestProblemController extends Controller
{
    public function __construct(){
        $this->middleware('contest_start');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if(Auth::user()->isAdmin) {
            $contest = Contest::getContest($id);
            $contestProblem = ContestProblem::getContestProblem($id);
            $problem = Problem::all();
            return view('admin.contestproblem.create', compact('contest','contestProblem','problem'));
        }
        else{
            return abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id,Request $request)
    {
        ContestProblem::create($request);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContestProblem  $contestProblem
     * @return \Illuminate\Http\Response
     */
    public function show($contestId,$id)
    {
        $contest = Contest::getContest($contestId);
        $contestProblem = ContestProblem::getContestProblem($contestId);
        $problem = Problem::getProblem($id);
        return view('contest.problem.show',compact('contest','contestProblem','problem'));
    }

    public function oops($contestId){
        $contest = Contest::getContest($contestId);
        $contestProblem = ContestProblem::getContestProblem($contestId);
        return view('contest.problem.oops',compact('contest','contestProblem'));
    }

}
