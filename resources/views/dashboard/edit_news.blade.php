@extends('layouts.dashboard')
@section('content')
    <h1>Edit</h1>
    <form method="post" class="form-horizontal">
        {{ csrf_field() }}

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Title:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" required name="category" value="{{$title}}" class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Alias:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" required name="alias" value="{{$alias}}" class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" required name="description" value="{{$desc}}"
                       class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Content:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" required name="content" value="{{$content}}"
                       class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Preview:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <textarea class="form-control col-md-7 col-xs-12"
                          name="preview" value="">{{$preview}}</textarea>
            </div>
        </div>

        <div class="col-md-1 col-sm-1 col-xs-12">
            <input type="submit" value="Edit category" class="form-control btn btn-success">
        </div>
    </form>
@endsection