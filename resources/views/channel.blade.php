@extends('layouts.app')

@section('content')

    @foreach($discussions as $discussion)
        <div class="card">
            <div class="card-header bg-white">
                <img src="{{$discussion->user->avatar}}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                <span><b>{{$discussion->user->name}}, {{$discussion->created_at->diffForHumans()}}</b></span>
                <a href="{{route('discussions',['slug'=>$discussion->slug])}}" class="btn btn-outline-dark btn-sm float-right" style="margin-left: 9px;">View</a>
                @if($discussion->hasBestAnswer())
                    <span class="btn btn-danger btn-sm float-right">CLOSED</span>
                @else
                    <span class="btn btn-dark btn-sm float-right">OPEN</span>
                @endif
            </div>

            <div class="card-body">
                <h4 class="text-center text-primary"><b>{{$discussion->title}}</b></h4>
                <p class="text-center">{{str_limit($discussion->body, 75)}}</p>
            </div>

            <div class="card-footer">
                <span>{{$discussion->replies->count()}} Replies</span>
                <a href="{{route('channel', ['slug'=>$discussion->channel->slug])}}" class="float-right btn btn-default">{{$discussion->channel->title}}</a>
            </div>
        </div>
    @endforeach
    <div class="offset-5">{{$discussions->links()}}</div>
@endsection
