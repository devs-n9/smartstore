@extends('layouts.dashboard')
@section('content')

<h3>Contact information</h3>

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
        <input type="submit" value="Save">
        </div>
    </form>

@endsection
