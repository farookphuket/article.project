@extends('layouts.mod')

@section('meta_title','welcome moderate '.Auth::user()->name)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="text-center">
            Moderate page 
        </h1>
        <p>
This page can only access by "Moderate" user only! by the power of Moderate you can "edit,delete member" from the database but you cannot delete yourself.
        </p>
        
    </div>
    
    <div class="col-lg-12">
        
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th>
                        Name
                    </th>

                    <th>
                        Email
                    </th>
                    <th>
                        Role
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Manage
                    </th>
                </tr>
        @foreach($users as $user)
            <?php 
                /*
                    you cannot edit admin
                */
            ?>
            @if(!$user->hasRole('admin'))
            <tr>
                <td>
                    {{$user->name}}
                </td>

                <td>
                    {{$user->email}}
                </td>
                <td>
                    {{implode(',',$user->roles()->pluck('name')->toArray())}}                
                </td>
                <td>
                    <p>
                        Create {{$user->created_at}}  {{$user->created_at->diffForHumans()}}</p>
                    @if($user->created_at != $user->updated_at)
                        <p>
                        &nbsp;Update <span class="alert alert-info">
                            {{$user->updated_at}}  {{$user->updated_at->diffForHumans()}}
                        </span>
                        </p>
                    @endif
                </td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('moderate.users.edit',$user->id)}}" class="btn btn-primary">
                            Edit
                        </a>

                        @if(Auth::user()->id != $user->id)
                        <form class="form" action="{{route('moderate.users.destroy',$user)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                            
                        </form>
                       @endif 
                    </div>
                    
                </td>
            </tr>
            @endif
        @endforeach
            </table>
            <p class="pt-3">&nbsp;</p>
            {{$users->links()}} 
        </div>

    </div>
</div>
@endsection
