@extends('layouts.dashboard.news.posts')

@section('content')
    <h3>Edit News</h3>
    <form method="post">
       {{ csrf_field() }}
        <label for="">Title</label>
        <br>
        <input type="text" name="title" value="{{ $post->title }}">
        <br>
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
        <label for="">Content</label>
        <br>
        <textarea name="content" cols="30" rows="10">{{ $post->content }}</textarea>
        <br>
        <input type="submit" value="Save">
    </form>
@endsection