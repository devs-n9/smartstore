@extends('layouts.index')

@section('content')

<div class="breadcrumb-wrapper">
    <div class="container">
        <h1>Catalog</h1>
    </div>
</div>

<div class="space-60"></div>
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <div class="row">
                @foreach($categories as $category)
                <div class="col-sm-4">
                    <div class="item_holder">
                        <a href="#"><img src="{{ asset('uploads/images/categories/' . $category->preview ) }}" alt="" class="img-responsive"></a>
                        <div class="title">
                            <h5>
                                @if(strlen($category->category) > 40)
                                {{ mb_substr($category->category,0,40,'UTF-8') . '...' }}
                                @else
                                {{ $category->category }}
                                @endif
                            </h5>
                            <p>
                                @if(strlen($category->category) > 45)
                                {{ mb_substr($category->description,0,45,'UTF-8') . '...' }}
                                @else
                                {{ $category->description }}
                                @endif
                            </p>
                        </div>
                    </div><!--item holder-->
                </div><!--col end-->
                @endforeach
            </div><!--row-->
            <!--pagination-->
            <nav>
                <ul class="pagination pull-right clearfix">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!--pagination end-->
        </div>

        <div class="col-md-3 col-md-offset-1">
            <div class="sidebar-widget">
                <h3>Categories</h3>
                <ul class="list-unstyled">
                    @foreach($categories as $category)
                    <li><a href="#">{{ $category->category }}</a></li>
                    @endforeach
                </ul>
            </div><!--sidebar-widget end-->
        </div><!--sidebar col-->
    </div>
</div>
<div class="space-60"></div>

@endsection