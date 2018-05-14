<?php

namespace App\Http\Controllers;

use \Testcase;
use \Problem;
use Illuminate\Http\Request;

class TestcaseController extends Controller
{
    public $problemId;

    public function __construct()
    {
        $this->middleware('auth');
        $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        $this->problemId= explode('/',$url)[5];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $this->problemId = $id;
        $tc = Testcase::find($this->problemId);
        $problem = Problem::getProblem($this->problemId);
        return view('admin.testcase.index',compact('tc','problem'));
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
        Testcase::create($this->problemId,$request);
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
