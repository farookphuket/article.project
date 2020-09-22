@extends('layouts.member')

@section('meta_title',"edit post ".$whatnews->title)
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
            <form action="{{route("member.home.update",$whatnews)}}" class="form" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="">title</label>
                    <input type="text" class="form-control title" name="title" placeholder="put your title" required minlength=16 value="{{$whatnews->title}}">
                </div>
                <div class="form-group">
                    <textarea class="form-control body" name="body">{{$whatnews->body}}</textarea>
                </div>
                <div class="from-group">
                    <label class="alert alert-warrning">
                        <input type="checkbox" class="form-control is_public"  name="is_public" @if($whatnews->is_public == 1) checked @endif>
                        Show public ? leave un-check if you want to keep it private
                    </label>

                    <div class="btn-group float-right pt-4">
                        <button class="btn btn-primary" type="submit">
                            Update
                        </button>
                    </div>
                </div>
            </form>

            </div>
        </div>
        
    </div>
@endsection
