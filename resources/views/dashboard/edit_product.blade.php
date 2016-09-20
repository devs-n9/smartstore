@extends('layouts.dashboard')
@section('content')
    <h1>Edit product "{{ $form_data['product'] }}"</h1>
    @if(!empty($message))
        <div class="alert alert-{{ $type }} alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span>
            </button>
            @if(is_array($message))
                @foreach($message as $mes)
                    {{ $mes }}<br>
                @endforeach
            @else
                {{$message}}
            @endif
        </div>
    @endif
    <form method="post" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Product name:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" required name="product" value="{{$form_data['product'] or ''}}"
                       class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Product alias:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" required name="alias" value="{{$form_data['alias'] or ''}}"
                       class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Product category:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <select class="form-control" name="category">
                    <option value="0" selected></option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @if(!empty($form_data))
                                @if($category->id == $form_data['category_id'])
                                selected
                                @endif
                                @endif
                        >{{ $category->category }}</option>
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
                        <option value="{{ $brand->id }}"
                                @if(!empty($form_data))
                                @if($brand->id == $form_data['brand_id'])
                                selected
                                @endif
                                @endif
                        >{{ $brand->brand }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Short description:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <textarea class="form-control col-md-7 col-xs-12"
                          name="short_description">{{ $form_data['description'] or '' }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Full description:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <textarea class="form-control col-md-7 col-xs-12"
                          name="content">{{ $form_data['content'] or '' }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Price:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="number" required min="0" name="price" value="{{ $form_data['price'] or '' }}"
                       class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Product count:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="number" required min="0" name="count" value="{{ $form_data['count'] or '' }}"
                       class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Photos:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="file" name="photos[]" multiple title="Choose photos"
                       class="form-control btn btn-round btn-warning">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="submit" value="Edit product" class="form-control btn btn-success">
            </div>
        </div>
    </form>
@endsection