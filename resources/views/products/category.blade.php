@extends('layouts.index')

@section('content')
<div class="breadcrumb-wrapper">
    <div class="container">
        <h1>{{ $category->category }}</h1>
    </div>
</div>

<div class="space-60"></div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <ul class="product-filter-block list-inline clearfix">
                <li>Sort by:</li>
                <li class="active"><a href="#">Top Rated</a></li>
                <li><a href="#">Featured items</a></li>
                <li><a href="#">new arrivals</a></li>
            </ul><!--fliter list end-->
            @foreach($category_products as $product)
            <div class="product-list">
                <div class="row">
                    <div class="col-md-4 margin-b-30">
                        <div class="product-list-thumb">
                            <a href="/product/{{ $product->alias }}">
                                <img src="{{ asset('uploads/images/products/' . $product->preview ) }}" alt="{{ $product->product }}" class="img-responsive">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="product-list-desc">
                            <h3 class="title"><a href="/product/{{ $product->alias }}">{{ $product->product }}</a></h3>
                            <span class="price">$ {{ $product->price }}</span>
                            <span class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-full"></i>
                                <a href="#">8 Reviews</a>
                            </span>
                            <p>
                                @if(strlen($category->category) > 100)
                                {{ mb_substr($product->description,0,100,'UTF-8') . '...' }}
                                @else
                                {{ $product->description }}
                                @endif
                            </p>
                            <div class="icon-list">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to wishlist"
                                   data-id="{{ $product->id }}" data-alias="{{ $product->alias }}">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Compare"
                                   data-id="{{ $product->id }}" data-alias="{{ $product->alias }}">
                                    <i class="fa fa-random"></i>
                                </a>
                                <a id="addCart" href="#" data-toggle="tooltip" data-placement="top" title="Add to cart" class="btn btn-skin"
                                   data-id="{{ $product->id }}" data-alias="{{ $product->alias }}">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--products list-->
            @endforeach

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
            @include('includes.categories_menu')
        </div><!--sidebar col-->
    </div>
</div>
<div class="space-60"></div>

@endsection