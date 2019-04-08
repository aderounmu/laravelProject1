@extends('layouts.app')

@section('content')
    <h1>Create A Post</h1>
    {{-- {!! Form::open(['action' => 'PostsController@store', 'method'=>'POST']) !!}
        <div class="form-group">
           {{Form::label('title','Title')}} 
           {{Form::text('title','',['class'=>'form-control', 'placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
           {{Form::label('body','Body')}} 
           {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control', 'placeholder'=>'Body text'])}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!} --}}

    <form action = "{{ route('posts.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="">Body</label>
            <textarea name="body" id="article-ckeditor" cols="30" rows="10" class="form-control" placeholder="Body text"></textarea>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
    
@endsection