<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id){
    	$user = User::where('id',$id)->first();
    	return view('user.show', compact('user'));
    }
}
