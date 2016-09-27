@extends('layouts.dashboard')

@section('content')
    <h1>ORDERS</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>product id</th>
                <th>user id</th>
                <th>description</th>
                <th>created at</th>
                <th>edit</th>
            </tr>
        </thead>
        <tbody>

                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->product_id }}</td>
                        <td>{{ $order->user_id }}</td>
                        <td>{{ $order->description }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td><a class="btn btn-default" href="/dashboard/orders/edit/{{ $order->id }}" role="button">Edit</a></td>
                    </tr>
                @endforeach
            </tr>
        </tbody>
    </table>

@endsection
