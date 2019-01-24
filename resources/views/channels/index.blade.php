@extends('layouts.app')

@section('content')
                <div class="card">
                    <div class="card-header">Channels</div>

                    <div class="card-body">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Edit</th>
                              <th scope="col">Delete</th>
                            </tr>
                          </thead>

                          <tbody>
                          @foreach($channels as $channel)
                            <tr>
                              <td>{{$channel->title}}</td>
                              <td><a href="{{route('channels.edit', ['channel'=>$channel->id])}}" class="btn btn-sm btn-outline-primary">Edit</a></td>
                              <td><form action="{{route('channels.destroy', ['channel'=>$channel->id])}}" method="post">
                                      {{csrf_field()}}
                                      {{method_field('DELETE')}}
                                      <button class="btn btn-sm btn-outline-danger">Destroy</button>
                                  </form>
                              </td>
                            </tr>
                              @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
@endsection


{{--@if (session('status'))--}}
    {{--<div class="alert alert-success" role="alert">--}}
        {{--{{ session('status') }}--}}
    {{--</div>--}}
{{--@endif--}}