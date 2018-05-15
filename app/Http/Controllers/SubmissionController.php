<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use \Problem;
use \Submission;
use Illuminate\Http\Request;

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
        //
        $submission = Submission::all();
        $link = (explode('/',$request->url()));
        if(Auth::user()->isAdmin){
            if($link[3] === 'submission'){
                return redirect('admin/submission');
            }
            return view('admin.submission.index',compact('submission'));
        }
        else{
            if($link[3] === 'admin'){
                return redirect('submission');
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
        return redirect('/submissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $submission = Submission::getSubmission($id);
        return view('submission.show',compact('submission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function edit(Submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submission $submission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submission $submission)
    {
        //
    }
}
