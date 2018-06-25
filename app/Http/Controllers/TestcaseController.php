<?php

namespace App\Http\Controllers;

use Contest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Problem;
use Testcase;

class TestcaseController extends Controller
{
    public $problemId;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($problemId)
    {
        $tc = Testcase::find($problemId);
        $problem = Problem::getProblem($problemId);
        $contest = Contest::all();
        return view('admin.testcase.index',compact('tc','problem','contest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($problemId,Request $request)
    {
        Testcase::create($problemId,$request);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testcase  $testcase
     * @return \Illuminate\Http\Response
     */
    public function destroy($problemId,$id)
    {
        $tc = Testcase::findFirst($id);
        Storage::delete([$tc->path_input,$tc->path_output]);
        Testcase::delete($id);
        return back();
    }
}
