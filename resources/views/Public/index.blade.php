@extends('layouts.pub')

@section('meta_title',isset($meta_title)?$meta_title:"welcome friends ")
@section('content')
    <div class="row ">
        <div class="col-lg-12 pt-4">
            <h1 class="text-center">Welcome friends,What's going on?</h1>
            <p style="text-align:right;color:green;font-weight:bold;">
            {{date("d-m-Y")}}
            </p>
            
            <ol class="list-group">
                @if(!$whatnews->isEmpty())            
                    @foreach($whatnews as $item)
                       <li class="list-group-item">
                            <div class="col-lg-12">
                                <h1 class="text-center">
                                    {{$item->title}}
                                </h1>
                               <p style="text-align:right;color:green;">
                                   by <b> {{$item->user->name}}</b> {{$item->created_at}} {{$item->created_at->diffForHumans()}}
                               </p>
                               {!!$item->body!!} 
                               <p class="pt-4">&nbsp;</p>
                               
                           </div>
                       </li>
                       
                    @endforeach
                @else

                    <li class="list-group-item pt-4 mb-4 text-center">
                        @include('layouts.no_data')
                    </li>

                @endif

            </ol>
        </div>
    </div>
@endsection
