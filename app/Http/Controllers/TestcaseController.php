<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use \Testcase;
use \Problem;
use \Contest;
use Illuminate\Http\Request;

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
    public function store($problemId,Request $request)
    {
        //
        Testcase::create($problemId,$request);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testcase  $testcase
     * @return \Illuminate\Http\Response
     */
    public function show(Testcase $testcase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testcase  $testcase
     * @return \Illuminate\Http\Response
     */
    public function edit(Testcase $testcase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testcase  $testcase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testcase $testcase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testcase  $testcase
     * @return \Illuminate\Http\Response
     */
    public function destroy($problemId,$id)
    {
        //
        $tc = Testcase::findFirst($id);
        Storage::delete([$tc->path_input,$tc->path_output]);
        Testcase::delete($id);
        return back();
    }
}
