<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()):
            return redirect('/');
        endif;
        $user = User::where('id',Auth::user()->id)->first();
        return view('home')->with([
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
    public function edit(User $user)
    {
        //
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
       
        $his_pass = User::where('id',Auth::user()->id)->first(); 
        if(Hash::check($request->pass_conf,$his_pass->password)):
            $user = User::findOrFail($id);
            if(isset($request->password)):
                $user->password = Hash::make($request->password);
            endif;
                
                $user->name = $request->name;
                $user->email = $request->email;
                $user->updated_at = Carbon::now();
                $user->save();
                $msg = "Success your profile has been save";
                $status = "success";
        else:
                $msg = "Error! check your given password";
                $status = "error";
        endif;

        return redirect()->route('home')->with(Session::flash($status,$msg));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id',$id)->first();
        $user->roles()->detach();
        $user->delete();
        return redirect('/logout');
    }
}
