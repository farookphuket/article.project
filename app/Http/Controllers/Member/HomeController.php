<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\WhatNews;
use App\User;
use Illuminate\Http\Request;
use Gate;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        if(Gate::denies('member-user')):
            redirect("/logout");
            exit();
        endif;
        $user = User::findOrFail(Auth::user()->id);
        $wn = WhatNews::where("is_public",1)
                        ->orWhere('user_id',Auth::user()->id)
                        ->orderBy("created_at",'desc')
                        ->paginate(20);
        return view("Member.index")->with([
            'whatnews'=> $wn,
            'user' => $user
        ]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WhatNews  $whatNews
     * @return \Illuminate\Http\Response
     */
    public function show(WhatNews $whatNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WhatNews  $whatNews
     * @return \Illuminate\Http\Response
     */
    public function edit(WhatNews $whatNews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WhatNews  $whatNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WhatNews $whatNews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WhatNews  $whatNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(WhatNews $whatNews)
    {
        //
    }
}
