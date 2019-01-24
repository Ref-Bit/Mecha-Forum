@extends('layouts.app')

@section('content')

<!--Discussion Section-->
    <div class="card">
        <div class="card-header bg-white">
            <img src="{{$discussion->user->avatar}}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
            <span><b>{{$discussion->user->name}} ({{$discussion->user->points}})</b></span>

            @if($discussion->hasBestAnswer())
                <span class="btn btn-danger btn-sm float-right">CLOSED</span>
            @else
                <span class="btn btn-dark btn-sm float-right">OPEN</span>
            @endif

            @if(Auth::id() == $discussion->user->id)
                @if(!$discussion->hasBestAnswer())
                    <a href="{{route('discussions.edit',['slug'=>$discussion->slug])}}" class="btn btn-outline-info btn-sm float-right" style="margin-right: 8px;">Edit</a>
                @endif
            @endif
        @if($discussion->is_being_watch_by_auth_user())
                <a href="{{route('discussion.unwatch',['id'=>$discussion->id])}}" class="btn btn-outline-danger btn-sm float-right" style="margin-right: 8px;">Un-Watch</a>
            @else
                <a href="{{route('discussion.watch',['id'=>$discussion->id])}}" class="btn btn-outline-dark btn-sm float-right" style="margin-right: 8px;">Watch</a>
            @endif
        </div>

        <div class="card-body">
            <h4 class="text-center text-primary"><b>{{$discussion->title}}</b></h4>
            <hr>
            <p class="text-center">{!! Markdown::convertToHtml($discussion->body)!!}</p>
            <hr>
            @if($best_answer)
                <div class="text-center" style="padding: 40px">
                    <h3 class="text-center">BEST ANSWER</h3>
                    <div class="card">
                        <div class="card-header bg-warning">
                            <img src="{{$best_answer->user->avatar}}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                            <span>{{$best_answer->user->name}} ({{$best_answer->user->points}})</span>
                        </div>

                        <div class="card-body">{!! Markdown::convertToHtml($best_answer->body) !!}</div>
                    </div>
                </div>
            @endif
        </div>

        <div class="card-footer">
            <span>{{$discussion->replies->count()}} Replies</span>
            <a href="{{route('channel', ['slug'=>$discussion->channel->slug])}}" class="float-right btn btn-default">{{$discussion->channel->title}}</a>
        </div>
    </div>
<!--Discussion End Section-->

    <br>

<!--Reply Section-->
    @foreach($discussion->replies as $reply)
        <div class="card">
            <div class="card-header bg-white">
                <img src="{{$reply->user->avatar}}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                <span>{{$reply->user->name}} <b>({{$reply->user->points}})</b></span>

                @if(!$best_answer)
                    @if(Auth::id() == $discussion->user->id)
                        <a href="{{route('discussion.best.answer', ['id'=>$reply->id])}}" class="btn btn-sm btn-outline-warning float-right">Mark as best answer</a>
                    @endif
                @endif


                @if(Auth::id() == $reply->user->id)
                    @if(!$reply->best_answer)
                        <a href="{{route('reply.edit', ['id'=>$reply->id])}}" class="btn btn-sm btn-outline-info float-right" style="margin-right: 8px">Edit</a>
                    @endif
                @endif
            </div>

            <div class="card-body">
                <p class="text-center">{!! Markdown::convertToHtml($reply->body) !!}</p>
            </div>

            <div class="card-footer">
                @if($reply->is_liked_by_auth_user())
                    <a href="{{route('reply.unlike', ['id'=>$reply->id])}}" class="btn btn-sm btn-outline-danger">Unlike  <span class="badge">{{$reply->likes->count()}}</span></a>
                    @else
                    <a href="{{route('reply.like', ['id'=>$reply->id])}}" class="btn btn-sm btn-outline-primary">Like <span class="badge">{{$reply->likes->count()}}</span></a>
                @endif
            </div>
        </div>
    @endforeach
<br>
<!--Reply End Section-->
<div class="card">
    <div class="card-body">
        @if(Auth::check())
        <form action="{{route('discussions.reply', ['id'=>$discussion->id])}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="reply">Leave a reply....</label>
                <textarea name="reply" id="reply" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-outline-dark float-right">Reply</button>
            </div>
        </form>
            @else
            <div class="text-center">
                <h2>Sign in to leave a reply</h2>
            </div>
        @endif
    </div>
</div>
@endsection


@section('scripts')
@endsection