@extends('layouts.dashboard') @section('content')

    <h1>Products</h1>
    <div id="datatable-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-fixed-header" class="table table-striped table-bordered dataTable no-footer"
                       role="grid" aria-describedby="datatable-fixed-header_info">
                    <thead>
                    <tr role="row">
                        <th>ID</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Count</th>
                        <th>Rating</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->product }}</td>
                            <td>{{ $product->category->category }}</td>
                            <td>{{ $product->brand->brand }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->count }}</td>
                            <td>{{ $product->rating }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection