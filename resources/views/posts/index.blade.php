@extends('layout.default')

@section('content')

@if(session()->has('status'))
<div class="alert alert-success">
    {{session()->get('status')}}
</div>
@endif


@foreach($posts as $post)

<article><h3>{{$post->content}}</h3></article>
<small><a href="posts/{{$post->id}}/edit">{{$post->created_at}}</a></small>

<form action="/posts/{{$post->id}}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
</form>

<hr>

@endforeach

@endsection