@extends('layouts.member')



@section('meta_title',isset($last)?$last->title:"welcome ".Auth::user()->name)
@section("tag_in_head")
    <script type="text/javascript">
        $(function(){

            let my_name = "{!!Auth::user()->name!!}";
            let msg_u = `Hi ,${my_name} what's in your mind?`;
            let j1 = new Jodit(".body",{"placeholder":msg_u,"height":450});
        });
    </script>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pt-4 mb-4">
                <p class="pt-4">&nbsp;</p>
            <form action="{{route("member.home.store")}}" class="form" method="post">
                @csrf
                <div class="form-group">
                    <label class="">title</label>
                    <input type="text" class="form-control title" name="title" placeholder="put your title" required minlength=16>
                </div>
                <div class="form-group">
                    <textarea class="form-control body" name="body"></textarea>
                </div>
                <div class="from-group">
                    <label class="alert alert-warrning">
                        <input type="checkbox" class="form-control is_public"  name="is_public">
                        Show public ? leave un-check if you want to keep it private
                    </label>

                    <div class="btn-group float-right pt-4">
                        <button class="btn btn-primary" type="submit">
                            Post
                        </button>
                    </div>
                </div>
            </form>
            </div>
            <p class="pt-4">&nbsp;</p>

            @if(!$whatnews->isEmpty())
                <ol class="list-group">
                    @foreach($whatnews as $item)
                        <li class="list-group-item">
                            <h1 class="text-center mb-4">
                                {{$item->title}}
                            </h1>
                            <div class="text-center">
                                <p class="alert pt-2">
                                    by {{$item->user->name}}
                                    &nbsp; Create {{$item->created_at}} <span class="badge badge-info"> {{$item->created_at->diffForHumans()}}</span> 
                                    @if($item->updated_at != $item->created_at)
                                        &nbsp; Last update {{$item->updated_at}} 
                                    <span class="badge badge-warning">
                                        {{$item->updated_at->diffForHumans()}}
                                    </span>
                                    @endif

                                </p>
                            </div>

                            {!!$item->body!!}
                            <p class="pt-4">&nbsp;</p>

                            @if($item->user_id == Auth::user()->id)
                                <div class="btn-group float-right">
                                    <a class="btn btn-primary" href="{{route("member.home.edit",$item->id)}}">
                                        Edit
                                    </a>
                                    <form action="{{route("member.home.destroy",$item->id)}}" class="form" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </li>
                        @endforeach

                </ol>
            @else
            <div class="text-center pt-4 mb-4">
                @include('layouts.no_data')
            </div>
            
            <div class="card pt-4">
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
           @endif 
        </div>
        
    </div>
@endsection
