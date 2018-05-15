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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/problems','ProblemController');
Route::resource('admin/submissions','SubmissionController');
Route::resource('admin/problems/{id}/testcase','TestcaseController');

Route::resource('problems','ProblemController');
Route::resource('submissions','SubmissionController');
Route::get('problems/{id}/submit','SubmissionController@create');


// API
Route::post('/api/v1/statistics/problems/{id}','APIController@problems');