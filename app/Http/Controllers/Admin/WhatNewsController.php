<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\WhatNews;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
        $wn = WhatNews::where('is_public',1)
            ->orWhere('user_id',Auth::user()->id)
            ->orderBy('created_at','desc')->paginate(10);
        return view('Admin.WhatNews.index')->with([
            'whatnews' => $wn
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

        $wn = new WhatNews();
        $wn->user_id = Auth::user()->id;
        $wn->title = $request->title;
        $wn->body = $request->body;
        $wn->is_public = isset($request->is_public[0])?1:0;
        $wn->save();

        return redirect('/admin/whatnews/')->with(Session::flash('success','your post has been save'));

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
    public function edit($id)
    {
        $wn = WhatNews::findOrFail($id);
        return view("Admin.WhatNews.edit")->with('whatnews',$wn);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WhatNews  $whatNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $wn = WhatNews::findOrFail($id);
        $wn->user_id = Auth::user()->id;
        $wn->title = $request->title;
        $wn->body = $request->body;
        $wn->is_public = isset($request->is_public[0])?1:0;
        $wn->updated_at = Carbon::now();
        $wn->save();
        
        return redirect('/admin/whatnews/')->with(Session::flash('success','your post has been updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WhatNews  $whatNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(WhatNews $whatNews)
    {
        
        $wn = WhatNews::findOrFail($id);
        $wn->delete();

        return redirect('/admin/whatnews/')->with(Session::flash('success','your post has been deleted!'));
    }
}
