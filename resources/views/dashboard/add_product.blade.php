@extends('layouts.dashboard')
@section('content')
    <h1>Products</h1>
    <form method="post" class="form-horizontal">
            {{ csrf_field() }}
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Product name:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Product category:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
            <select class="form-control" name="category">
                <option value="0" selected></option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Product brand:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <select class="form-control" name="brand">
                    <option value="0" selected></option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Short description:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <textarea class="form-control col-md-7 col-xs-12"> </textarea>
            </div>
        </div>





        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Photos:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="file" name="photos[]" title="Choose photos" class="form-control btn btn-round btn-warning">
            </div>
        </div>
    </form>
    <script>
        $('.textarea').wysihtml5();
    </script>
@endsection