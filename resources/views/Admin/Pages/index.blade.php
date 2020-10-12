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
        <div class="col-lg-12 mb-4">
                <h1 class="text-center pt-4 mb-4">
Create new page
                </h1>
                
                <form class="form pt-4 mb-4" action="{{route("admin.pages.store")}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>slug</label>
                        <input class="form-control page_slug" type="text" name="page_slug">
                        
                        
                    </div>

                    <div class="form-group">
                        <label>page title</label>
                        <input class="form-control page_title" type="text" name="page_title">
                        
                    </div>
                    <div class="form-group">
                        <label>page summary</label>
                        <textarea class="form-control page_summary" name="page_summary"></textarea>
                        
                    </div>

                    <div class="form-group">
                        <label>page body</label>
                        <textarea class="form-control page_body" name="page_body"></textarea>
                        
                    </div>
                    
                    <div class="form-group">
                        <label class="alert alert-warning">
                            <input class="form-control" type="checkbox" name="is_public"> leave un-check will be save as "Private"
                            
                        </label>
                        
                    </div>
                    
                    <div class="btn-group float-right">
                        <button class="btn btn-primary" type="submit">Save</button>
                        
                    </div>
                    
                    
                </form>
        </div>
        
        <div class="col-lg-12 pt-4">
            
            @if(!$pages->isEmpty())
                <ul class="list-group mb-4 pt-4">
                
                @foreach($pages as $page)
                    <li class="list-group-item">
                        <h2 class="text-center">{{$page->page_title}}</h2>
                        {!!$page->page_summary!!}
                        <div class="float-left">
                            <p class="badge badge-primary">by {{$page->user->name}}</p>
                            
                        </div>
                        <div class="btn-group float-right">
                            <a class="btn btn-primary" href="{{route('admin.pages.edit',$page->id)}}">Edit</a>
                            
                            <form class="form" action="{{route('admin.pages.destroy',$page->id)}}" method="post">
                            @method('DELETE')
                            @csrf

                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            
                            
                        </div>
                        
                        
                    </li>
                @endforeach
                </ul>
               @else

                <div class="alert alert-warning">There is no content</div>
            @endif
                
        </div>
        
    </div>
@endsection
