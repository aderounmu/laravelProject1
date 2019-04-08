@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <ol class="list-group">
    @if (count($services) > 0 )
        @foreach ($services as $item)
          <li class = "list-group-item"> {{$item}}</li>  
        @endforeach
    @endif
    </ol>
@endsection
    