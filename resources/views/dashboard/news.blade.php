@extends('layouts.dashboard') @section('content')

    <h1>News</h1>
    <div id="datatable-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table id="categories-table" class="table table-striped table-bordered dataTable no-footer"
                       role="grid" aria-describedby="datatable-fixed-header_info" data-token="{{ csrf_token() }}">
                    <thead>
                    <tr role="row">
                        <th>ID</th>
                        <th>News</th>
                        <th>Alias</th>
                        <th>Description</th>
                        <th>Content</th>
                        <th>Preview</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Edit</th>
                    </thead>
                    <tbody>
                    @foreach($news as $news_one)
                        <tr>
                            <td>{{ $news_one->id }}</td>
                            <td>{{ $news_one->title }}</td>
                            <td>{{ $news_one->alias }}</td>
                            <td>{{ $news_one->description }}</td>
                            <td>{{ $news_one->content }}</td>
                            <td>{{ $news_one->preview }}</td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="/dashboard/news/edit/{{ $news_one->id }}"><span
                                            class="fa fa-pencil fa-2x"></span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection