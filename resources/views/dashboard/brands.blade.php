@extends('layouts.dashboard') @section('content')

    <h1>{{ trans('messages.Brands') }}</h1>
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
                        <th>{{ trans('messages.Brand') }}</th>
                        <th>{{ trans('messages.Products_in_brand') }}</th>
                        <th>{{ trans('messages.Alias') }}</th>
                        <th>{{ trans('messages.Logo') }}</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                        <tr data-id="{{$brand->id}}" class="product-row">
                            <td>{{ $brand->id }}</td>
                            <td class="brand">{{ $brand->brand }}</td>
                            <td class="brand">{{ $brand->productsInBrand->count() }}</td>
                            <td class="brand">{{ $brand->alias }}</td>
                            <td><img src="/uploads/images/brands/{{ $brand->logo }}" alt=""></td>
                            <td>
                                <div class="brand-edit"><a href="/dashboard/brand/edit/{{ $brand->id }}"
                                            class="fa fa-pencil fa-2x"></a></div>
                            </td>
                            <td>
                                <div class="brand-delete" data-id="{{ $brand->id }}"><a
                                            class="fa fa-close fa-2x"></a></div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
