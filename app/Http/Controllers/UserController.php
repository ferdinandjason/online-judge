<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;

class UserController extends Controller
{
    //
    public function index(){
        $user = User::getAllUser();
        return view('user.index',compact('user'));
    }

    public function show($id){
        $user = User::getUser($id);
        return view('user.show',compact('user'));
    }
}
