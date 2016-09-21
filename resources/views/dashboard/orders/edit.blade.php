@extends('layouts.dashboard')

@section('content')
    <form method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $order->id }}">
        </div><div class="form-group">
            <label for="product_id">product_id</label>
            <input type="text" class="form-control" id="product_id" name="product_id" value="{{ $order->product_id }}">
        </div><div class="form-group">
            <label for="user_id">user_id</label>
            <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $order->user_id }}">
        </div><div class="form-group">
            <label for="description">description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $order->description }}">
        </div><div class="form-group">
            <label for="created_at">created_at</label>
            <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $order->created_at }}">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

@endsection
