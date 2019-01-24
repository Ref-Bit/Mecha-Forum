@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header text-center">Create a new Discussion</div>

        <div class="card-body">
            <form action="{{route('discussions.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="channel">Pick a Channel</label>
                    <select name="channel_id" id="channel" class="form-control">
                        @foreach($channels as $channel)
                            <option value="{{$channel->id}}">{{$channel->title}}</option>
                            @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="body">Ask a question</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{old('body')}}</textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success float-right" type="submit">Create discussion</button>
                </div>
            </form>

        </div>
    </div>

@endsection
