<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\WhatNews;
use App\User;

class PagesController extends Controller
{
    //
    public function index(){

        // will show whatnews on public page
        $wn = WhatNews::where("is_public",1)
                        ->orderBy("created_at","desc")
                        ->paginate(20);


        $meta_title = WhatNews::where("is_public",1)
                            ->orderBy('created_at','desc')
                            ->latest()
                            ->first();

        return view('Public.index')->with([
            'meta_title' => $meta_title->title,
            'whatnews'=>$wn
        ]);
    }
}
