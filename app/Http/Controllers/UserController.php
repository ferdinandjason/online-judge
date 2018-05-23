<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use UserSolvedProblem;

class UserController extends Controller
{
    //
    public function index(){
        $user = User::getAllUser();
        return view('user.index',compact('user'));
    }

    public function show($id){
        $user = User::getUser($id);
        $userSolvedProblem = UserSolvedProblem::getUserSolvedProblem($id);
        return view('user.show',compact('user','userSolvedProblem'));
    }

    public function edit($id){
        $user = User::getUser($id);
        return view('user.edit',compact('user'));
    }

    public function update($id,Request $request){
        User::update($id,$request);
        return back();
    }

    public function rank(){
        $user = User::getRank();
        return view('rank.index',compact('user'));
    }
}
