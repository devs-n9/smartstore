@extends('layouts.dashboard')
@section('content')

    <title>Add settings to the web site</title>
    <form method="post">
        {{ csrf_field() }}
        
        <h3>Change contact information</h3>
        
        <label for="">Phone</label>
        <div>
        <input type="tel" name="phone" value="{{ $contacts->phone }}">
        </div>
        
        <label for="">Email</label>
        <div>
        <input type="email" name="email" value="{{ $contacts->email }}">
        </div>
        
        <label for="">Address</label>
        <div>
        <input type="text" name="address" value="{{ $contacts->address }}">
        </div>
        
        <h3>Correct meta information</h3>
        
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
        
        <div>
        <input type="submit" value="Save">
        </div>
    </form>

@endsection

        
        