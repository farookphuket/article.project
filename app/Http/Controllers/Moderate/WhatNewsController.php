<?php

namespace App\Http\Controllers\Moderate;

use App\Http\Controllers\Controller;
use App\WhatNews;
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
        dd($request);
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
        echo"this is what news edit";
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
