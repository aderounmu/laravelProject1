@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-primary" href="{{url('posts/create')}}">Create post</a>
                   <h3>Your Blog Posts</h3>
                    <table class="table table-striped">
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    @forelse ($posts as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td><a href="{{route('posts.edit',['post' => $item->id])}}" class = "btn btn-info">Edit</a></td>
                            <td><a href="{{route('posts.destroy',['post' => $item->id])}}" class = "btn btn-danger">Delete</a></td>
                        </tr>
                    @empty
                        <tr>No Post here</tr>
                    @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
