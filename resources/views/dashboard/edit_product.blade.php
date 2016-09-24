@extends('layouts.dashboard')
@section('content')
    <h1>{{ trans('messages.Edit_product') }} "{{ $form_data['product'] }}"</h1>
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
            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('messages.Product_name') }}:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" data-translit="true" required name="product" value="{{$form_data['product'] or ''}}"
                       class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('messages.Alias') }}:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" required name="alias" value="{{$form_data['alias'] or ''}}"
                       class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('messages.Product_category') }}:</label>
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
            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('messages.Product_brand') }}:</label>
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
            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('messages.Short_description') }}:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <textarea class="form-control col-md-7 col-xs-12"
                          name="short_description">{{ $form_data['description'] or '' }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('messages.Full_description') }}:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <textarea class="form-control col-md-7 col-xs-12"
                          name="content">{{ $form_data['content'] or '' }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('messages.Price') }}:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="number" required min="0" name="price" step="any" value="{{ $form_data['price'] or '' }}"
                       class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('messages.Old_price') }}:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="number" min="0" name="old_price" step="any" value="{{ $form_data['old_price'] or '' }}"
                       class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('messages.Price_from') }}:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" name="price_from_date" value="{{ $form_data['price_from_date'] or '' }}"
                       class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('messages.Price_to') }}:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" name="price_to_date" value="{{ $form_data['price_to_date'] or '' }}"
                       class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('messages.Count') }}:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="number" required min="0" name="count" value="{{ $form_data['count'] or '' }}"
                       class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('messages.Rating') }}:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="number" required min="0" name="rating" value="{{ $form_data['rating'] or '' }}"
                       class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('messages.Photos') }}:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input style="opacity: 0;" type="file" name="photos[]" multiple title="{{ trans('messages.Choose_photos') }}"
                       class="form-control btn btn-round btn-warning">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="submit" value="{{ trans('messages.Edit_product') }}" class="form-control btn btn-success">
            </div>
        </div>
    </form>
@endsection