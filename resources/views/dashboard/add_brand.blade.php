@extends('layouts.dashboard')
@section('content')
    <h1>{{ trans('messages.Add_brand') }}</h1>
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
            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('messages.Brand_name') }}:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" data-translit="true" required name="brand" value="{{$form_data['brand'] or ''}}"
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
        <div class="form-group hide">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Crop:</label>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <input type="text" required name="x" value=""
                       class="form-control col-md-5 col-xs-6">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <input type="text" required name="y" value=""
                       class="form-control col-md-5 col-xs-6">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <input type="text" required name="width" value=""
                       class="form-control col-md-5 col-xs-6">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <input type="text" required name="height" value=""
                       class="form-control col-md-5 col-xs-6">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('messages.Logo') }}:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input style="opacity: 0;" type="file" name="logo" title="{{ trans('messages.Choose_logo') }}"
                       class="form-control btn btn-round btn-warning">
            </div>
        </div>
        <div id="cropper" class="col-md-10">
            <div class="img-container">
                <img id="image" src="">
            </div>
        </div>
        <div class="form-group">
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="submit" value="{{ trans('messages.Add_brand') }}" class="form-control btn btn-success">
            </div>
        </div>
    </form>
@endsection
