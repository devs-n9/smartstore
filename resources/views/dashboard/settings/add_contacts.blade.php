@extends('layouts.dashboard')
@section('content')

<h3>Add new contact information</h3>

    <form method="post">
        {{ csrf_field() }}
        
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
