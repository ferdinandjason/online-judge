<?php

namespace App\Http\Controllers;

use Clarification;
use Contest;
use ContestProblem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClarificationController extends Controller
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
    public function index($contestId)
    {
        //
        if(!Auth::user()->isAdmin) {
            $contest = Contest::getContest($contestId);
            $contestProblem = ContestProblem::getContestProblem($contestId);
            $clarification = Clarification::getClarificationFromAdmin($contestId);
            return view('contest.clarification', compact('clarification', 'contest', 'contestProblem'));
        }
        else{
            return abort(404);
        }
    }

    public function indexAdmin()
    {
        if(Auth::user()->isAdmin) {
            $clarification = Clarification::getClarificationFromUser();
            $contest = Contest::all();
            return view('admin.clarification', compact('clarification', 'contest', 'contestProblem', 'contest'));
        }
        else{
            return abort(404);
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
        if(!Auth::user()->isAdmin) {
            Clarification::validator($request);
            Clarification::create($request->all());
            return back();
        }
        else{
            return abort(404);
        }
    }

    public function storeAdmin(Request $request)
    {
        if(Auth::user()->isAdmin){
            Clarification::validator($request);
            Clarification::create($request->all());
            return back();
        }
        else{
            return abort(404);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clarification  $clarification
     * @return \Illuminate\Http\Response
     */
    public function show($contestId,$clarificationId)
    {
        //
        $contest = Contest::all();
        $clarification = Clarification::getClarification($clarificationId);
        return view('contest.clarification.show',compact('clarification','contest'));
    }

    public function showAdmin($clarificationId)
    {
        $contest = Contest::all();
        $clarification = Clarification::getClarification($clarificationId);
        return view('admin.clarification_show',compact('clarification','contest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clarification  $clarification
     * @return \Illuminate\Http\Response
     */
    public function edit(Clarification $clarification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clarification  $clarification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clarification $clarification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clarification  $clarification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clarification $clarification)
    {
        //
    }
}
