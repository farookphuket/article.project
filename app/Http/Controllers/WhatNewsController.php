<?php

namespace App\Http\Controllers;

use App\WhatNews;
use App\User;

use Illuminate\Support\Facaded\Auth;
use Illuminate\Http\Request;

class WhatNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo"what new!";
    }

    public function member(){
        echo"meber place";
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
