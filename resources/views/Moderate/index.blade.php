@extends('layouts.mod')

@section('meta_title','Manage users moderate '.Auth::user()->name)
@section('content')
    <div class="row ">
        <div class="col-lg-12">
            <h1 class="text-center pt-4">
                Moderate page welcome {{Auth::user()->name}}
            </h1>
           <p>
this is the test system of "multi roles login user with Laravel"
           </p>
           
        </div>
    </div>
@endsection
