<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContestMemberController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        ContestMember::create($request);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContestMember  $contestMember
     * @return \Illuminate\Http\Response
     */
    public function show(ContestMember $contestMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContestMember  $contestMember
     * @return \Illuminate\Http\Response
     */
    public function edit(ContestMember $contestMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContestMember  $contestMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContestMember $contestMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContestMember  $contestMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContestMember $contestMember)
    {
        //
    }
}
