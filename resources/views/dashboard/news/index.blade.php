@extends('layouts.dashboard')
@section('content')

<h3>News</h3>
@endsection


<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News</title>
</head>
<body>
    <h3>News</h3>
    <p>Welcome {{ Auth::user()->name }}</p>
    <a href="/dashboard/post/create">Create new Post</a>
    <ul>
        @foreach($posts as $post)
        <li>{{ $post->title }} 
            <a href="/dashboard/post/edit/{{ $post->id }}"> edit</a>
            <a href="/dashboard/post/delete/{{ $post->title }}"> delete</a>
        </li>
        @endforeach
    </ul>
</body>
</html>-->
