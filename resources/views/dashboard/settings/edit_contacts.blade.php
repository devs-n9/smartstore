@extends('layouts.dashboard')
@section('content')

     <h3>Change contact information</h3>

    <form method="post" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">        
        <label for="">Phone</label>
        <div>
        <input type="tel" name="phone" value="{{ $contacts->phone }}">
        </div>
        </div>
        
        <div class="form-group">
        <label for="">Email</label>
        <div>
        <input type="email" name="email" value="{{ $contacts->email }}">
        </div>
        </div>
        
        <div class="form-group">
        <label for="">Address</label>
        <div>
        <input type="text" name="address" value="{{ $contacts->address }}">
        </div>
        </div>
        
        <div class="form-group">
        <div>
        <input class="btn btn-success" type="submit" value="Save">
        </div>
        </div>
    </form>

@endsection

        
        