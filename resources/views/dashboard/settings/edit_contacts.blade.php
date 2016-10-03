@extends('layouts.dashboard')
@section('content')

     <h3>Change contact information</h3>

    <form method="post">
        {{ csrf_field() }}
             
@foreach ($contacts as $c)
<p>for contact ingormation № {{$contacts->id}}</p>
@endforeach
                
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
        
        <div>
        <input class="btn btn-success" type="submit" value="Save">
        </div>
    </form>

@endsection

        
        