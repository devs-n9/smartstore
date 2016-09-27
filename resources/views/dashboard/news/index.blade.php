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