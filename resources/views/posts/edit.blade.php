@extends('layouts.app')
@section('content')
    

<form action = "{{ route('posts.update',['post' => $post->id])}}" method="POST">
    @method('PUT')
    @csrf
    
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Title" value = "{{$post->title}}">
    </div>
        <div class="form-group">
        <label for="">Body</label>
        <textarea name="body" id="article-ckeditor" cols="30" rows="10" class="form-control" placeholder="Body text" value = "{{$post->body}}"></textarea>
    </div>
    <input type="submit" value="Submit" class="btn btn-primary">
</form>

@endsection