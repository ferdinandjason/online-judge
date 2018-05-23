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
    $problem = \Problem::getRandom();
    return view('welcome',compact('problem'));
});

// Webpages
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// admin
Route::resource('admin/problems','ProblemController');
Route::resource('admin/submissions','SubmissionController');
Route::resource('admin/problems/{id}/testcase','TestcaseController');
Route::resource('admin/contest','ContestController');
Route::get('admin/contest/{id}/add_problem','ContestProblemController@create');
Route::post('admin/contest/{id}/add_problem','ContestProblemController@store');
Route::get('admin/submissions/{id}/regrade','SubmissionController@regrade');
Route::get('admin/clarification','ClarificationController@indexAdmin');
Route::post('admin/clarification','ClarificationController@storeAdmin');
Route::get('admin/clarification/{id}','ClarificationController@showAdmin');
Route::get('admin',function(){
	if(Auth::user()->isAdmin) {
	    $contest = Contest::all();
    	return view('admin.index',compact('contest'));
    }
    return back();
});
Route::get('admin/general',function(){
	if(Auth::user()->isAdmin) {
	    $contest = Contest::all();
    	return view('admin.general',compact('contest'));
    }
    return back();
});

//user
Route::resource('problems','ProblemController');
Route::resource('submissions','SubmissionController');
Route::get('problems/{id}/submit','SubmissionController@create');
Route::resource('contest','ContestController');
Route::post('','ContestMemberController@store')->name('contestmember.store');
Route::get('contest/{id}/problems','ContestController@problemIndex');
Route::get('contest/{id}/submission','ContestController@submissionIndex');
Route::get('contest/{id}/scoreboard','ContestController@scoreboard');
Route::get('contest/{id}/problems/{pid}','ContestProblemController@show');
Route::get('contest/{id}/problems/{pid}/submit','ContestController@submit');
Route::get('contest/{id}/submissions/{sid}','ContestController@submission');
Route::post('comment','CommentController@store');
Route::get('problems/{id}/html','ProblemController@html');
Route::get('problems/{id}/csv','ProblemController@csv');
Route::get('problems/{id}/rank','ProblemController@rank');
Route::get('contest/{id}/clarification','ClarificationController@index');
Route::post('contest/{id}/clarification','ClarificationController@store');
Route::get('contest/{id}/clarification/{cid}','ClarificationController@show');
Route::get('submissions/{id}/code','SubmissionController@code');

Route::resource('/user','UserController');
Route::get('/rank','UserController@rank');
Route::get('/about',function(){
	return view('about.index');
});

// API
Route::post('/api/v1/statistics/problems/{id}','APIController@problems');
Route::post('/api/v1/statistics/contest/percent/{id}','APIController@contestPercentage');
Route::post('/api/v1/statistics/contest/elapsed/{id}','APIController@contestElapsed');
Route::post('/api/v1/statistics/contest/remaining/{id}','APIController@contestRemaining');
Route::post('/api/v1/statistics/contest/linecharts/{id}','APIController@getLineCharts');
Route::post('/api/v1/statistics/contest/endcontest/{id}','APIController@stop');