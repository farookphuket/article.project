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
                edit {{$whatnews->title}}
            </h1>
            <p style="text-align:right;color:green;font-weight:bold;">
                {{date('d-m-Y')}}
            </p>


            <form action="{{url("/moderate/home",$whatnews)}}" class="form" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>
                        title
                    </label>
                    <input type="text" class="form-control title"  name="title" value="{{$whatnews->title}}">
                </div>

                <div class="form-group">
                    <label class="">
                        body
                    </label>
                    <textarea name="body" class="body form-control">{{$whatnews->body}}</textarea>
                </div>

                <div class="form-group pt-4 mb-4">
                    <label class="alert alert-warning">
                        <input type="checkbox" class="form-control"  name="is_public" @if($whatnews->is_public==1) checked @endif> show public
                    </label>
                </div>

                <div class="btn-group float-right pt-4">
                    <button class="btn btn-primary" type="post">
                        Update
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
