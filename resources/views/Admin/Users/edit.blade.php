@extends('layouts.admin')

@section('meta_title','welcome '.Auth::user()->name)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="text-center">Edit user {{$user->name}}</h1>
        
        <form class="form" action="{{route('admin.users.update',$user)}}" method="post">
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

                <div class="forom-group pt-4">
                    <label class="alert alert-warning pt-4">
                        Change Password?
                    </label>
                    <input type="text" name="new_pass" class="form-control" placeholder="change your password here"> 
                    <p class="alert alert-danger pt-2 mb-4" style="font-weight:bold;font-size:18px;">
if you do not want to change your password just leave the above field blank.
                    </p>
                    
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
