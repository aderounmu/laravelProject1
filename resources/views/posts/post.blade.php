@extends('layouts.app')

@section('content')
    <a href="{{url('posts')}}" class = "btn btn-success">Go back</a>
    <h1>{{$post->title}}</h1>
    <div>
        {{-- too pass html also --}}
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    {{-- <a href="posts/{{$post->id}}/edit" class="btn btn-info">Edit</a> --}}
    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
            <div>
                <a href="{{route('posts.edit',['post'=> $post->id])}}" class="btn btn-info">Edit</a>
                <a href="{{route('posts.destroy',['post'=> $post->id])}}" class="btn btn-danger float-right">Delete</a>
            </div>
        @endif
        
    @endif
   

@endsection