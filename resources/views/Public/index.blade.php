@extends('layouts.pub')

@section('meta_title',"hi friends, how's going on?")
@section('content')
    <div class="row ">
        <div class="col-lg-12">
            <h1 class="text-center">Welcome friends,What's going on?</h1>
            <p style="text-align:right;color:green;font-weight:bold;">
            {{date("d-m-Y")}}
            </p>
            
            
        </div>
    </div>
@endsection
