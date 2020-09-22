@extends('layouts.pub')

@section('meta_title',"hi friends, how's going on?")
@section('content')
    <div class="row ">
        <div class="col-lg-12 pt-4">
            <h1 class="text-center">Welcome friends,What's going on?</h1>
            <p style="text-align:right;color:green;font-weight:bold;">
            {{date("d-m-Y")}}
            </p>
            
            <ol class="list-group">
                @if($whatnews)            
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
                <li class="list-group-item">
                    <img src="https://camo.githubusercontent.com/6d61cc63b77e9169131ea89c4cfd5ef5352f3546/68747470733a2f2f692e70696e696d672e636f6d2f353634782f63342f38322f38632f63343832386332383265636464633237643339346432623165646536376534352e6a7067" class="responsive">
                    <p class="text-center">Am I sexy enough?</p>
                </li>
                @endif
            </ol>
        </div>
    </div>
@endsection
