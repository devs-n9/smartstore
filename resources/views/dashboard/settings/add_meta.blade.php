@extends('layouts.dashboard')
@section('content')

 <h3>Meta tag's information</h3>

    <form method="post">
        {{ csrf_field() }}
        
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
        <input class="btn btn-success" type="submit" value="Save">
        </div>
    </form>

@endsection
