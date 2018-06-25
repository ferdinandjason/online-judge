<?php

namespace App\Http\Controllers;

use Contest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Problem;
use Submission;

class SubmissionController extends Controller
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
        $submission = Submission::all();
        $link = (explode('/',$request->url()));
        if(Auth::user()->isAdmin){
            if($link[3] === 'submission'){
                return redirect()->route('admin.submissions.index');
            }
            $contest = Contest::all();
            return view('admin.submission.index',compact('submission','contest'));
        } else{
            if($link[3] === 'admin'){
                return abort(404);
            }
            return view('submission.index',compact('submission'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $problem = Problem::getProblem($id);
        return view('submission.create',compact('problem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Submission::create($request);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $submission = Submission::getSubmission($id);
        return view('submission.show',compact('submission'));
    }

    public function regrade($id)
    {
        Submission::regrade($id);
        return back();
    }

    public function code($id)
    {
        $code = DB::table('codes')->where('id',$id)->first()->code;
        $headers = array(
            "Content-type" => "text/cpp",
            "Content-Disposition" => "attachment; filename=$id.cpp",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
        return \Response::make($code,200,$headers);
    }
}