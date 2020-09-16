<?php

namespace App\Http\Controllers\Moderate;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at','desc')->paginate(10);
        $roles = Role::all();
        return view('Moderate.Users.index')->with([
            'users' => $users,
            'roles' => $roles
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
        $roles = Role::where('name','!=','admin')->get();
    
        return view('Moderate.Users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $his_pass = User::where('id',Auth::user()->id)->first();
        if(Hash::check($request->pass_conf,$his_pass->password)):
            
            if(isset($request->new_pass)):
                $user->password = Hash::make($request->new_pass);
            endif;
        if($user->id == Auth::user()->id):
            $msg = "your profile has been updated!";
        else:

            $msg = "The user '{$request->name}' has been updated!";
       endif; 
            $user->roles()->sync($request->roles);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->updated_at = Carbon::now();
            $user->save();
            $status = 'success';
        else:

            
            $status = 'error';
            $msg = 'Error could not update user please check your confirm password';
        endif;

        return redirect()->route('moderate.users.index')->with(Session::flash($status,$msg));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->destroy();
        return redirect()->route('moderate.users.index')->with(Session::flash('success','item has been deleted!'));
    }
}
