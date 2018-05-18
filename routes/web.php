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
    return view('welcome');
});

// Webpages
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/problems','ProblemController');
Route::resource('admin/submissions','SubmissionController');
Route::resource('admin/problems/{id}/testcase','TestcaseController');
Route::resource('admin/contest','ContestController');
Route::get('admin/contest/{id}/add_problem','ContestProblemController@create');
Route::post('admin/contest/{id}/add_problem','ContestProblemController@store');

Route::resource('problems','ProblemController');
Route::resource('submissions','SubmissionController');
Route::get('problems/{id}/submit','SubmissionController@create');
Route::resource('contest','ContestController');
Route::post('','ContestMemberController@store')->name('contestmember.store');
Route::get('contest/{id}/problems','ContestController@problemIndex');
Route::get('contest/{id}/submission','ContestController@submissionIndex');
Route::get('contest/{id}/scoreboard','ContestController@scoreboard');


// API
Route::post('/api/v1/statistics/problems/{id}','APIController@problems');
Route::post('/api/v1/statistics/contest/percent/{id}','APIController@contestPercentage');
Route::post('/api/v1/statistics/contest/elapsed/{id}','APIController@contestElapsed');
Route::post('/api/v1/statistics/contest/remaining/{id}','APIController@contestRemaining');
Route::post('/api/v1/statistics/contest/linecharts/{id}','APIController@getLineCharts');