<?php

namespace App\Http\Controllers\Moderate;

use App\Http\Controllers\Controller;
use App\User;
use App\WhatNews;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $wn = WhatNews::where("is_public",1)
                        ->orWhere("user_id",Auth::user()->id)
                        ->orderBy('created_at','desc')
                        ->paginate(20);
        return view('Moderate.index')->with([
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
        $wn->title = strip_tags($request->title);
        $wn->body = xxs_clean($request->body);
        $wn->is_public = isset($request->is_public[0])?1:0;
        $wn->save();

        return redirect('/moderate/home')->with(Session::flash("success","your post has been created"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wn = WhatNews::findOrFail($id);
        return view('Moderate.WhatNews.edit')->with('whatnews',$wn);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $whatnews = WhatNews::findOrFail($id);
        $whatnews->title = strip_tags($request->title); 
        $whatnews->user_id = Auth::user()->id; 
        //$whatnews->body = str_replace(array('<script>','</script>'),array('&lt;/script&gt;','&lt;/script&gt;'),$request->body); 
        $whatnews->body = xxs_clean($request->body); 
        $whatnews->updated_at = Carbon::now();
        $whatnews->is_public = isset($request->is_public[0])?1:0;
        $whatnews->save();

       return redirect('/moderate/home')->with(Session::flash("success","your post has been updated"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wn = WhatNews::findOrFail($id);
        $wn->delete();
        return redirect('/moderate/home')->with(Session::flash("success","your post has been deleted!"));

    }
}
