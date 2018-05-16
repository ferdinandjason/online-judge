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


// API
Route::post('/api/v1/statistics/problems/{id}','APIController@problems');