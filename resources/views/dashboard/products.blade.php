@extends('layouts.dashboard') @section('content')

    <h1>Products</h1> @endsection
@foreach($products as $product)
        {{ dd($product->category->categories) }}
@endforeach