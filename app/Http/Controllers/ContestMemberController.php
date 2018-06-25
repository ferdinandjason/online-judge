<?php

namespace App\Http\Controllers;

use ContestMember;
use Illuminate\Http\Request;

class ContestMemberController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ContestMember::create($request);
        return back();
    }
}
