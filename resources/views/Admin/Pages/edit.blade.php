@extends('layouts.admin')

@section("meta_title","Manage pages ".Auth::user()->name)
@section('tag_in_head')
<script type="text/javascript">
    $(function(){
        let psum = new Jodit(".page_summary",{"height":450,"placeholder":"test typing"});
        let pbody = new Jodit(".page_body",{"height":650,"placeholder":"your page body here"});
    });
</script>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            
            <h1 class="text-center mb-4">editing {{$page->page_title}}</h1>
               
            <form class="form pt-4 mb-4" action="{{route("admin.pages.update",$page->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>slug</label>
                        <input class="form-control page_slug" type="text" name="page_slug" value="{{$page->page_slug}}">
                        
                        
                    </div>

                    <div class="form-group">
                        <label>page title</label>
                        <input class="form-control page_title" type="text" name="page_title" value="{{$page->page_title}}">
                        
                    </div>
                    <div class="form-group">
                        <label>page summary</label>
                        <textarea class="form-control page_summary" name="page_summary">{!!$page->page_summary!!}</textarea>
                        
                    </div>

                    <div class="form-group">
                        <label>page body</label>
                        <textarea class="form-control page_body" name="page_body">{!!$page->page_body!!}</textarea>
                        
                    </div>
                    
                    <div class="form-group">
                        <label class="alert alert-warning">
                            <input class="form-control" type="checkbox" name="is_public" @if($page->is_public == 1) checked @endif> leave un-check will be save as "Private"
                            
                        </label>
                        
                    </div>
                    
                    <div class="btn-group float-right">
                        <button class="btn btn-primary" type="submit">Update</button>
                        
                    </div>
                    
                    
                </form>
                
        </div>
        
    </div>
@endsection
