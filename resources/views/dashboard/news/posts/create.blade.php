<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
=======
@extends('layouts.dashboard.news.posts')

@section('content')
>>>>>>> ae6aef221a6516e2c4588fd561435a2b6395ca4f
    <h3>Create new News</h3>
    <form method="post">
       {{ csrf_field() }}
        <label for="">Title</label>
        <br>
        <input type="text" name="title">
        <br>
<<<<<<< HEAD
=======
        <br>
        @foreach($categories as $category)
            <input type="checkbox" name="categories[]" value="{{ $category->id }}" > : {{ $category->category }} <br>
        @endforeach
        <br>
>>>>>>> ae6aef221a6516e2c4588fd561435a2b6395ca4f
        <label for="">Content</label>
        <br>
        <textarea name="content" cols="30" rows="10"></textarea>
        @if(!empty($errors))
        
        @foreach($errors as $error)
            <p>{{ $error }}</p>
        @endforeach
        
        @endif
        <br>
        <input type="submit" value="Save">
        
    </form>
<<<<<<< HEAD
</body>
</html>
=======
@endsection
>>>>>>> ae6aef221a6516e2c4588fd561435a2b6395ca4f
