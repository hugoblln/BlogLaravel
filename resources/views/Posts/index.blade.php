@extends('layouts.app')


@section('content')
<div>
    @foreach ($posts as $post)
        <p>{{$post->title}}</p>
        <p>{{$post->content}}</p>
        <p>{{ $post->user->name }}</p>
    @endforeach
</div>
@endsection