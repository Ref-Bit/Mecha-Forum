@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header text-center">Edit Reply</div>

        <div class="card-body">
            <form action="{{route('reply.update', ['id'=>$reply->id])}}" method="post">
                {{csrf_field()}}


                <div class="form-group">
                    <label for="body">Ask a question</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{$reply->body}}</textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success float-right" type="submit">Save Changes</button>
                </div>
            </form>

        </div>
    </div>

@endsection
