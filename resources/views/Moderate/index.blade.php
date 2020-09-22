@extends('layouts.mod')

@section('meta_title','Manage users moderate '.Auth::user()->name)
@section('tag_in_head')
<script type="text/javascript">
    $(function(){
       

        let my_name = "{!!Auth::user()->name!!}";
        
        let user_msg = `Hi ,${my_name} what's going on today?`;
        let j1 = new Jodit(".body",{
            "height":450,"placeholder":user_msg
        });
    });
</script>
@endsection
@section('content')
    <div class="row ">
        <div class="col-lg-12">
            <h1 class="text-center pt-4">
                What's going on?
            </h1>
            <p style="text-align:right;color:green;font-weight:bold;">
                {{date('d-m-Y')}}
            </p>


            <form action="{{url("/moderate/home")}}" class="form" method="post">
                @csrf
                <div class="form-group">
                    <label>
                        title
                    </label>
                    <input type="text" class="form-control title"  name="title">
                </div>

                <div class="form-group">
                    <label class="">
                        body
                    </label>
                    <textarea name="body" class="body form-control"></textarea>
                </div>

                <div class="form-group pt-4 mb-4">
                    <label class="alert alert-warning">
                        <input type="checkbox" class="form-control"  name="is_public"> show public
                    </label>
                </div>

                <div class="btn-group float-right pt-4">
                    <button class="btn btn-primary" type="post">
                        Post
                    </button>
                </div>
            </form>

        </div>
        <div class="col-lg-12 pt-4">
            
            <ul class="list-group">
                
                @foreach($whatnews as $item)
                    <li class="list-group-item">
                        <h3 class="text-center">
                            {{$item->title}}
                        </h3>

                        <p style="text-align:right;color:green;font-weight:bold;">
                            {{$item->user->name}}
                        </p>
                        {!!$item->body!!}

                        <p class="pt-4">&nbsp;</p>
                        @if($item->user_id == Auth::user()->id)

                            @if($item->is_public != 1)
                                    <p class="alert alert-warning pt-4">
                                        post {{$item->title}} will only visible to you 
                                    </p>
                            @else
                                
                                <p class="alert alert-success pt-4">
                                    the post {{$item->title}} post visible to public  
                                </p>
                            @endif

                            <div class="btn-group mb-4 float-right">
                                <a href="{{url("/moderate/home/".$item->id."/edit")}}" class="btn btn-primary">Edit</a>
                                <form action="{{route("moderate.home.destroy",$item->id)}}" class="form" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        @endif


                        <p style="text-align:center;color:gray;font-weight:bold;">
                          created  {{$item->created_at}}  {{$item->created_at->diffForHumans()}}

                        @if($item->updated_at != $item->created_at)
                            <span style="text-align:right;color:blue;font-weight:bold;">
                              updated  {{$item->updated_at}} {{$item->updated_at->diffForHumans()}}
                            </span>
                        @endif
                        </p>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
@endsection
