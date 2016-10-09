@extends('layouts.dashboard')
@section('content')

    <h3>Change meta tag's information</h3>

    <form method="post" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
        <label for="">Title</label>
        <div>
        <input type="text" name="title" value="{{ $settings->title }}">
        </div>
        </div>
        
        <div class="form-group">
        <label for="">Author</label>
        <div>
        <input type="text" name="author" value="{{ $settings->author }}">
        </div>
        </div>
        
        <div class="form-group">
        <label for="">Keywords</label>
        <div>
        <textarea name="keywords" cols="10" rows="5">{{ $settings->keywords }}</textarea>
        </div>
        </div>
        
        <div class="form-group">
        <label for="">Description</label>
        <div>
        <textarea name="description" cols="10" rows="5">{{ $settings->description }}</textarea>
        </div>
        </div>
        
        <div class="form-group">
        <div>
        <input class="btn btn-success" type="submit" value="Save">
        </div>
        </div>
    </form>

@endsection

        
        