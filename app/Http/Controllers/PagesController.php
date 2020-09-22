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

        return view('Public.index')->with('whatnews',$wn);
    }
}
