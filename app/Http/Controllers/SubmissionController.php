<?php

namespace App\Http\Controllers;

use \Problem;
use App\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // ULANG
        $array_lang = ['C++','C','Python'];
        $_POST['lang'] = $array_lang[$request['lang']];

        Submissions::create($_POST);

        $id = Submissions::orderBy('id','desc')->first()->id;

        DB::table('codes')->insert(Array('code'=>$request['codes'],'id'=>$id) );

        $temp = DB::table('users')->where('id',$request->get('user_id'))->first()->total_submit;
        DB::table('users')->where('id',$request->get('user_id'))->update(["total_submit"=>$temp+1]);

        $temp = DB::table('problems')->where('problem_id',$request->get('problem_id'))->first()->submit;
        DB::table('problems')->where('problem_id',$request->get('problem_id'))->update(["submit"=>$temp+1]);

        if(isset($_POST['contest_id'])){
            return redirect('contest/'.$_POST['contest_id'].'/submissions');
        }

        return redirect('/submissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function show(Submission $submission)
    {
        //
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
