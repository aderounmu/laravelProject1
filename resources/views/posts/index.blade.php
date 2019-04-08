@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    {{-- @if (count($posts) > 0)
        @foreach ($posts as $item)
            <div class="card card-body bg-light">
                <h3><a href = "/posts/{{$item->id}}">{{$item->title}}</a></h3>
                <small>Written at {{$item->created_at}}</small>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p> no post <p>
    @endif --}}

    
    @forelse ($posts as $item)
        <div class="card card-body bg-light">
            <h3><a href = "{{ route('posts.show',['post' => $item->id]) }}">{{$item->title}}</a></h3>
            <small>Written at {{$item->created_at}} by {{$item->user->name}}</small>
        </div>
    @empty
        <p> no post <p>
    @endforelse

    {{$posts->links()}}

    
@endsection
