@extends('layouts.dashboard')
@section('content')

    <title>Add settings to the web site</title>
    <form method="post">
        {{ csrf_field() }}
        
        <h3>Change contact information</h3>
        
        <label for="">Phone</label>
        <div>
        <input type="tel" name="phone">
        </div>
        
        <label for="">Email</label>
        <div>
        <input type="email" name="email">
        </div>
        
        <label for="">Address</label>
        <div>
        <input type="text" name="address">
        </div>
        
        <h3>Correct meta information</h3>
        
        <label for="">Title</label>
        <div>
            <input type="text" name="title">
        </div>
        
        <label for="">Author</label>
        <div>
        <input type="text" name="author">
        </div>
        
        <label for="">Keywords</label>
        <div>
        <textarea name="keywords" cols="10" rows="5"></textarea>
        </div>
        
        <label for="">Description</label>
        <div>
        <textarea name="description" cols="10" rows="5"></textarea>
        </div>
                
        @if(!empty($errors))
        
        @foreach($errors as $error)
            <p>{{ $error }}</p>
        @endforeach
        
        @endif
        <div>
        <input type="submit" value="Save">
        </div>
    </form>

@endsection
