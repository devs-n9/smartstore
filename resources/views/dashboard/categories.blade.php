@extends('layouts.dashboard') @section('content')

    <h1>Categories</h1>
    <div id="datatable-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table id="categories-table" class="table table-striped table-bordered dataTable no-footer"
                       role="grid" aria-describedby="datatable-fixed-header_info" data-token="{{ csrf_token() }}">
                    <thead>
                    <tr role="row">
                        <th>ID</th>
                        <th>Category</th>
                        <th>Alias</th>
                        <th>Description</th>
                        <th>Content</th>
                        <th>Preview</th>
                        <th></th>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category }}</td>
                            <td>{{ $category->alias }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->content }}</td>
                            <td>{{ $category->preview }}</td>
                            <td>
                                 <a href="/dashboard/category/edit/{{ $category->id }}"><span
                                            class="fa fa-pencil fa-2x"></span>
                                  <a href="/dashboard/category/delete/{{ $category->id }}"><span
                                            class="fa fa-close fa-2x"></span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection