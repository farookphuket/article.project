@extends('layouts.mod')

@section('meta_title','welcome '.Auth::user()->name)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="text-center">Edit user {{$user->name}}</h1>
        
        <form class="form" action="{{route('moderate.users.update',$user)}}" method="post">
            @csrf 
            @method('PUT')

            <div class="forom-group">
                <label>
                    Name
                </label>
                <input type="text" name="name" class="form-control" value="{{$user->name}}"> 
            </div>
            <div class="forom-group">
                <label>
                    Email
                </label>
                <input type="email" name="email" class="form-control" value="{{$user->email}}"> 
            </div>

            @if($user->id == Auth::user()->id)
                                
            <div class="forom-group pt-4 mb-3">
                <label >
                    New password
                    <span class="alert alert-warning">
                        if you don't want to change the password just leave this field blank
                    </span>
                    
                </label>
                <input type="text" name="new_pass" class="form-control" placeholder="your new passowrd"> 
            </div>

            @endif

            <div class="form-group pt-4">
                @foreach($roles as $role)

                    <label class="alert alert-warning checkbox-inline">
                        <input type="checkbox" class="form-control" name="roles[]" value="{{$role->id}}"  @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                        {{$role->name}}
                    </label>
                    
                @endforeach
            </div>
            
            @if(!$user->hasRole('admin'))
            <div class="forom-group pt-4 mb-4">
                <label>
                    confirm your password
                    <span class="alert alert-warning">
                        you have to confirm your password to save change!
                    </span>
                    
                </label>
                <input type="pass_conf" name="pass_conf" class="form-control" placeholder="confirm to save with your password"> 
            </div>
            @endif
           
            <div class="form-group pt-4">
                <div class="float-right">
                    <div class="btn-group">
                        <button class="btn btn-primary" type="submit">
                            Update
                        </button>
                        
                    </div>
                    
                </div>
            </div>
            
        </form>
        
    </div>
</div>
@endsection
