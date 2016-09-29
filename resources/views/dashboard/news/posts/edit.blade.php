<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h3>Edit Post</h3>
=======
@extends('layouts.dashboard.news.posts')

@section('content')
    <h3>Edit News</h3>
>>>>>>> ae6aef221a6516e2c4588fd561435a2b6395ca4f
    <form method="post">
       {{ csrf_field() }}
        <label for="">Title</label>
        <br>
        <input type="text" name="title" value="{{ $post->title }}">
        <br>
<<<<<<< HEAD
=======
        <br>
        @foreach($categories as $category)
            
            <input type="checkbox" 
            
             @foreach($n->categories as $cat)
                 @if($category->id == $cat->id)  
                     checked    
                 @endif
             @endforeach
             
             name="categories[]" value="{{ $category->id }}" > : {{ $category->category }} <br>
        @endforeach
        <br>
>>>>>>> ae6aef221a6516e2c4588fd561435a2b6395ca4f
        <label for="">Content</label>
        <br>
        <textarea name="content" cols="30" rows="10">{{ $post->content }}</textarea>
        <br>
        <input type="submit" value="Save">
    </form>
<<<<<<< HEAD
</body>
</html>
=======
@endsection
>>>>>>> ae6aef221a6516e2c4588fd561435a2b6395ca4f
