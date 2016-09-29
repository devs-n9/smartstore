<<<<<<< HEAD
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
=======
@extends('layouts.dashboard.news')

@section('content')
    <a class="btn btn-success" href="/dashboard/news/post/create">Create new News</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Categories</th>
            <th>Edit</th>
            <th>delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($news as $n)
            <tr>
                <td>{{ $n->id }}</td>
                <td>{{ $n->title }}</td>
                <td>
                    @foreach($n->categories as $cat)
                        {{ $cat->category }}
                    @endforeach
                </td>
                <td><a class="glyphicon glyphicon-pencil" href="/dashboard/post/edit/{{ $n->id }}"></a></td>
                <td><a class="glyphicon glyphicon-remove" href="/dashboard/post/delete/{{ $n->title }}"></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
>>>>>>> ae6aef221a6516e2c4588fd561435a2b6395ca4f
