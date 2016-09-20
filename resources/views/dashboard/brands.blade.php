@extends('layouts.dashboard') @section('content')

    <h1>Products</h1>
    <div class="alert alert-success alert-dismissible fade in" style="display: none;" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span>
        </button>
        <span id="message"></span>
    </div>
    <div id="datatable-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

        <div class="row">
            <div class="col-sm-12">
                <table id="products-table" class="table table-striped table-bordered dataTable no-footer"
                       role="grid" aria-describedby="datatable-fixed-header_info" data-token="{{ csrf_token() }}">
                    <thead>
                    <tr role="row">
                        <th>ID</th>
                        <th>Brand</th>
                        <th>Logo</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                        <tr data-id="{{$brand->id}}" class="product-row">
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->brand }}</td>
                            <td><img src="{{ $brand->logo }}" alt=""></td>
                            <td>
                                <div class="brand-edit" data-id="{{ $brand->id }}"><span
                                            class="fa fa-pencil fa-2x"></span></div>
                                <div class="brand-delete" data-id="{{ $brand->id }}"><span
                                            class="fa fa-close fa-2x"></span></div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection