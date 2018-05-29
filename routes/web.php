<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    if (Auth::check() && Auth::user()->isAdmin){
        return redirect('/admin');
    }
    $problem = \Problem::getRandom();
    return view('welcome',compact('problem'));
})->name('root');

// Webpages
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// admin
Route::name('admin.')->group(function () {
    Route::resource('admin/problems','ProblemController');
    Route::resource('admin/submissions','SubmissionController');
    Route::resource('admin/problems/{id}/testcase','TestcaseController');
    Route::resource('admin/contest','ContestController');
    Route::get('admin/contest/{id}/add_problem','ContestProblemController@create')->name('contest.problem.create');
    Route::post('admin/contest/{id}/add_problem','ContestProblemController@store')->name('contest.problem.store');
    Route::delete('admin/contest/{id}/problems/{pid}','ContestProblemController@destroy')->name('contest.problem.destroy');
    Route::get('admin/submissions/{id}/regrade','SubmissionController@regrade')->name('submissions.regrade');
    Route::get('admin/clarification','ClarificationController@indexAdmin')->name('clarification.admin.index');
    Route::post('admin/clarification','ClarificationController@storeAdmin')->name('clarification.admin.store');
    Route::get('admin/clarification/{id}','ClarificationController@showAdmin')->name('clarification.admin.show');
});
Route::get('admin',function(){
	if(Auth::user()->isAdmin) {
	    $contest = Contest::all();
    	return view('admin.index',compact('contest'));
    }
    return back();
})->name('admin.index');
Route::get('admin/general',function(){
	if(Auth::user()->isAdmin) {
	    $contest = Contest::all();
    	return view('admin.general',compact('contest'));
    }
    return back();
})->name('admin.general');

//user
Route::resource('problems','ProblemController');
Route::resource('submissions','SubmissionController');
Route::get('problems/{id}/submit','SubmissionController@create')->name('problem.submit');
Route::resource('contest','ContestController');
Route::post('','ContestMemberController@store')->name('contestmember.store');
Route::get('contest/{id}/problems','ContestController@problemIndex')->name('contest.problem.index');
Route::get('contest/{id}/submission','ContestController@submissionIndex')->name('contest.submission.index');
Route::get('contest/{id}/scoreboard','ContestController@scoreboard')->name('contest.scoreboard');
Route::get('contest/{id}/problems/OOPS','ContestProblemController@oops')->name('contest.problem.oops');
Route::get('contest/{id}/problems/{pid}','ContestProblemController@show')->name('contest.problem.show');
Route::get('contest/{id}/problems/{pid}/submit','ContestController@submit')->name('contest.problem.submit');
Route::get('contest/{id}/submissions/{sid}','ContestController@submission')->name('contest.submission.show');
Route::post('comment','CommentController@store')->name('comment.store');
Route::get('problems/{id}/html','ProblemController@html')->name('problem.html');
Route::get('problems/{id}/csv','ProblemController@csv')->name('problem.csv');
Route::get('problems/{id}/rank','ProblemController@rank')->name('problem.rank');
Route::get('contest/{id}/clarification','ClarificationController@index')->name('clarification.index');
Route::post('contest/{id}/clarification','ClarificationController@store')->name('clarification.store');
Route::get('contest/{id}/clarification/{cid}','ClarificationController@show')->name('clarification.show');
Route::get('submissions/{id}/code','SubmissionController@code')->name('submission.code');

Route::resource('/user','UserController');
Route::get('/rank','UserController@rank')->name('user.rank');
Route::get('/about',function(){
	return view('about.index');
})->name('about');

// API
Route::post('/api/v1/statistics/problems/{id}','APIController@problems');
Route::post('/api/v1/statistics/contest/percent/{id}','APIController@contestPercentage');
Route::post('/api/v1/statistics/contest/elapsed/{id}','APIController@contestElapsed');
Route::post('/api/v1/statistics/contest/remaining/{id}','APIController@contestRemaining');
Route::post('/api/v1/statistics/contest/linecharts/{id}','APIController@getLineCharts');
Route::post('/api/v1/statistics/contest/endcontest/{id}','APIController@stop');