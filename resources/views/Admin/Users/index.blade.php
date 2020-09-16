@extends('layouts.admin')

@section('meta_title','welcome '.Auth::user()->name)
@section('content')
<div class="row">
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
                        <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-primary">
                            Edit
                        </a>

                        <form class="form" action="{{route('admin.users.destroy',$user)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                            
                        </form>
                        
                    </div>
                    
                </td>
            </tr>
        @endforeach
            </table>
            <p class="pt-3">&nbsp;</p>
            {{$users->links()}} 
        </div>

    </div>
</div>
@endsection
