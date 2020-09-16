@extends('layouts.app')

@section('meta_title',"hi ".Auth::user()->name." how are you today?")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <p class="pt-4">
                        welcome {{Auth::user()->name}} this is the member section page 
                    </p>
                    <div class="col-lg-12">
                        <p class="pt-4">
                            &nbsp;
                        </p>
                    </div>
                   <h1 class="text-center">
                       {{$user->name}}'s profile edit?
                   </h1>
                   
                    <form class="form" action="{{route('home.update',$user)}}" method="post">

                        @csrf
                        @method('PUT')
                        <div class="from-group">
                            <label>
                                User Name
                            </label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
                        </div>
                        
                        <div class="from-group">
                            <label>
                                E-mail
                            </label>
                            <input type="email" name="email" class="form-control" value="{{$user->email}}" required>
                        </div>
                        <div class="from-group">
                            <label>
                                Password
                            </label>
                            <input type="password" name="password" class="form-control" placeholder="เปลี่ยนรหัสผ่าน ไม่เปลี่ยนเว้นว่างไว้">
                        </div>

                        <div class="from-group">
                            <label>
                                Confirm Password
                            </label>
                            <input type="password" name="pass_conf" class="form-control" placeholder="ยืนยันรหัสผ่านใหม่อีกครั้ง">
                        </div>

                        <div class="form-group pt-4 mb-4">
                            <div class="float-right">
                                <div class="btn-group">
                                <button class="btn btn-primary" type="submit">Update Profile</button>
                                
                                
                                </div>
                            </div>
                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <h1 class="text-center">
                Danger Zone
            </h1>
           <p class="pt-4 mb-4">
            this action will delete your account "{{$user->name}}"
           </p>
           
            <div class="float-right">

                <form class="form" action="{{route('home.destroy',$user)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">
    Delete Account!
                    </button>
                    
                </form>
            </div>
            
        </div>
        
    </div>
</div>
@endsection
