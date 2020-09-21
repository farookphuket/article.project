@extends('layouts.admin')

@section('meta_title',"hi ".Auth::user()->name." how are you today?")
@section('tag_in_head')

<script type="text/javascript">
    $(function(){
        let j1 = new Jodit('.body',{"height":550,"placeholder":"test type"});
    });
</script>
    
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="text-center">
            What News
        </h1>
        <form class="form" action="{{url("/admin/whatnews")}}" method="post">
            @csrf
            <div class="form-group">
                <label>title</label>
                <input class="form-control" type="text" name="title">
                
            </div>

            <div class="form-group">
                <label>text body</label>
                <textarea class="form-control body" name="body"></textarea> 
            </div>
                        
            <div class="btn-group float-right">
                <button class="btn btn-primary" type="submit">Save</button>
                
            </div>
            
        </form>
        
    </div>
    <div class="col-lg-12 pt-4">
        <h1 class="text-center pt-4">
            &nbsp;
        </h1>
        <ul class="list-group">
        @foreach($whatnews as $item)        
            <li class="list-group-item">
                <h3 class="text-center">
                    {{$item->title}}
                </h3>
                <p style="text-align:right;font-weight:bold;color:green;">
                   By {{$item->user->name}}
                </p>
                {!!$item->body!!} 
                
                <p class="pt-2" style="text-align:center;font-weight:bold;color:gray;">
                    {{$item->created_at}} {{$item->created_at->diffForHumans()}}
                </p>
            </li>
            
        @endforeach
        </ul>
    </div>
    
</div>
@endsection
