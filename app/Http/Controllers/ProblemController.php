<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Problem;
use ProblemTag;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        //
        $problem = Problem::all();
        $problemTag = ProblemTag::allPaginate(50);
        $arr = (explode('/',$request->url()));
        if(Auth::user()->isAdmin){
            if($arr[3] === 'problems'){
                return redirect('admin/problems');
            }
            return view('admin.problem.index',compact('problemTag','problem'));
        }
        else {
            if($arr[3] === 'admin'){
                return redirect('problems');
            }
            return view('problem.index', compact('problemTag', 'problem'));
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
        if(Auth::user()->isAdmin) {
            return view('admin.problem.create');
        }
        return redirect('problems');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!isset($request['active'])){
            $request->merge(['contest_only'=>0]);
        }
        else{
            $request->merge(['contest_only'=>1]);
        }
        if(Auth::user()->isAdmin) {
            Problem::validate($request);
            Problem::create($request->except('tags'));
            ProblemTag::create($request['tags'],$request);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function show($problemId)
    {
        //
        $problem = Problem::getProblem($problemId);
        if(Auth::user()->isAdmin){
            return view('admin.problem.show',compact('problem'));
        }
        else{
            return view('problem.show',compact('problem'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function edit($problemId)
    {
        //
        $problem = Problem::getProblem($problemId);
        $tags = ProblemTag::getProblemTag($problemId);
        return view('admin.problem.edit',compact('problem','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $problemId)
    {
        //
        if(!isset($request['active'])){
            $request->merge(['contest_only'=>0]);
        }
        else{
            $request->merge(['contest_only'=>1]);
        }
        if(Auth::user()->isAdmin) {
            Problem::validate($request);
            Problem::udpate($problemId,$request->except('tags'));
            ProblemTag::update($problemId,$request['tags'],$request);
            return redirect('/admin/problems');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function destroy($problemId)
    {
        //
        Problem::delete($problemId);
        return back();
    }
}
