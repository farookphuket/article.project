
@extends('layouts.admin')

@section('meta_title',"hi ".Auth::user()->name." how are you today?")
@section('tag_in_head')

<script type="text/javascript">
    $(function(){
        let j1 = new Jodit('.body',{"height":550,"placeholder":"test type","theme":"summer"});
    });
</script>
    
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="text-center">
            What News
        </h1>
        <form class="form" action="{{route("admin.whatnews.update",$whatnews->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>title</label>
                <input class="form-control" type="text" name="title" value="{{$whatnews->title}}">
                
            </div>

            <div class="form-group">
                <label>text body</label>
                <textarea class="form-control body" name="body">{{$whatnews->body}}</textarea> 
            </div>

            <div class="form-group pt-4">
                    <label class="alert alert-warning">
                        <input type="checkbox" class="form-control is_public" name="is_public" @if($whatnews->is_public == 1) checked @endif> 
                        show public? if you leave un-check your post will not visible to public
                    </label>
            </div>
                        
            <div class="btn-group float-right">
                <button class="btn btn-primary" type="submit">Update</button>
                
            </div>
            
        </form>
        
    </div>
    
</div>
@endsection
