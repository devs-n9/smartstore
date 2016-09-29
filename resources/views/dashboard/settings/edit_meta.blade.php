@extends('layouts.dashboard')
@section('content')

    <h3>Chang meta tag's information</h3>

    <form method="post">
        {{ csrf_field() }}
        
        <label for="">Title</label>
        <div>
            <input type="text" name="title" value="{{ $settings->title }}">
        </div>
        
        <label for="">Author</label>
        <div>
        <input type="text" name="author" value="{{ $settings->author }}">
        </div>
        
        <label for="">Keywords</label>
        <div>
        <textarea name="keywords" cols="10" rows="5">{{ $settings->keywords }}</textarea>
        </div>
        
        <label for="">Description</label>
        <div>
        <textarea name="description" cols="10" rows="5">{{ $settings->description }}</textarea>
        </div>
        
         <div><p>Meta tags updated successfuly</p></div>
         
        <div>
        <input class="btn btn-success" type="submit" value="Save">
        </div>
    </form>

@endsection

        
        