<?php

namespace App\Http\Controllers;

use Comment;
use Contest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Problem;
use ProblemTag;
use Submission;

class ProblemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //
        $problem = Problem::all();
        $problemTag = ProblemTag::allPaginate(50);
        $link = (explode('/',$request->url()));
        if(Auth::user()->isAdmin){
            if($link[3] === 'problems'){
                return redirect()->route('admin.problems.index');
            }
            $contest = Contest::all();
            return view('admin.problem.index',compact('problemTag','problem','contest'));
        } else {
            if($link[3] === 'admin'){
                return redirect()->route('admin.problems.index');
            }
            return view('problem.index', compact('problemTag', 'problem'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $contest = Contest::all();
        $arr = (explode('/',$request->url()));
        if(Auth::user()->isAdmin) {
            if($arr[3] === 'problems'){
                return redirect()->route('admin.problems.create');
            }
            return view('admin.problem.create',compact('contest'));
        }
        if($arr[3] === 'admin'){
            return abort('404');
        }
        return redirect()->route('problems.index');
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
        } else{
            $request->merge(['contest_only'=>1]);
        }
        if(Auth::user()->isAdmin) {
            Problem::validate($request);
            $problem = Problem::create($request->except('tags'));
            ProblemTag::create($request['tags'],$problem->id);
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
        $problem = Problem::getProblem($problemId);
        $comment = Comment::getProblemComment($problemId);
        if(Auth::user()->isAdmin){
            return view('admin.problem.show',compact('problem','comment'));
        } else{
            return view('problem.show',compact('problem','comment'));
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
        if(Auth::user()->isAdmin) {
            $problem = Problem::getProblem($problemId);
            $tags = ProblemTag::getProblemTag($problemId);
            return view('admin.problem.edit',compact('problem','tags'));
        } else return abort('404');
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
        if(!isset($request['active'])){
            $request->merge(['contest_only'=>0]);
        } else{
            $request->merge(['contest_only'=>1]);
        }
        if(Auth::user()->isAdmin) {
            Problem::validate($request);
            Problem::udpate($problemId,$request->except('tags'));
            ProblemTag::update($problemId,$request['tags'],$request);
            return redirect()->route('admin.problems.index');
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
        if(Auth::user()->isAdmin) {
            Problem::delete($problemId);
        }
        return back();
    }

    public function html($id)
    {
        $problem = Problem::getProblem($id);
        return view('problem.html',compact('problem'));
    }

    public function csv($id)
    {
        $problem = Problem::getProblem($id);
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$problem->slug.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $columns = array('slug', 'title', 'description', 'sample_input', 'sample_output', 'time_limit', 'memory_limit');
        $callback = function() use ($problem, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            fputcsv($file, array($problem->slug, $problem->title, $problem->description, $problem->sample_input, $problem->sample_output, $problem->time_limit, $problem->memory_limit));
            fclose($file);
        };
        return \Response::stream($callback,200,$headers);
    }

    public function rank($problemId){
        $problem = Problem::getProblem($problemId);
        $rank = Submission::getRank($problemId);
        return view('problem.rank',compact('problem','rank'));
    }
}
