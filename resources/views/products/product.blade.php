@extends('layouts.index')

@section('content')

<div class="space-60"></div>
<div class="container">
    <div class="row single-product">

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-5 margin-b-30">
                    <div id="product-single"  class="owl-carousel owl-theme single-product-slider">
                        @foreach($images as $image)
                        <div class="item">
                            <a href="{{ asset('/uploads/images/product/' . $image->image) }}" data-lightbox="roadtrip">
                                <img src="{{ asset('/uploads/images/product/' . $image->image) }}" alt="Product image" class="img-responsive">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="product-detail-desc">
                        <h3 class="title">{{ $product->product }}</h3>
                        <span class="price">{{ $product->price }}</span>
                        <span class="cat"><a href="/category/{{ $product_category->alias }}">{{ $product_category->category }}</a></span>
                        <span class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-full"></i>
                            <a href="#">8 Reviews</a>
                        </span>
                        <div class="available">
                            Availability :
                            @if($product->count > 0)
                            In Stock
                            @else
                            Not available
                            @endif
                        </div>
                        <p>{{ $product->description }}</p>
                        <div class="add-buttons">
                            <a href="#" class="btn btn-border btn-lg" data-toggle="tooltip" data-placement="top" title="Add to wishlist"
                               data-id="{{ $product->id }}" data-alias="{{ $product->alias }}">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a href="#" class="btn btn-border btn-lg"  data-toggle="tooltip" data-placement="top" title="Add to Compare"
                               data-id="{{ $product->id }}" data-alias="{{ $product->alias }}">
                                <i class="fa fa-random"></i>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Add to cart" class="btn btn-skin btn-lg"
                               data-id="{{ $product->id }}" data-alias="{{ $product->alias }}">
                                <i class="fa fa-shopping-cart"></i> Add to cart
                            </a>
                        </div>
                    </div>
                </div>
            </div><!--single product details end-->
            <div class="space-40"></div>
            <div class="row">
                <div class="col-md-12 item-more-info">
                    <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-justified" role="tablist">
                            <li role="presentation" class="active"><a href="#desc" aria-controls="desc" role="tab" data-toggle="tab">Description</a></li>
                            <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Reviews</a></li>
                            <li role="presentation"><a href="#add-cmnt" aria-controls="add-cmnt" role="tab" data-toggle="tab">Add Review</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="desc">
                                {{ $product->content }}
                            </div>
                            <div role="tabpanel" class="tab-pane" id="reviews">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object img-circle" src="images/team-1.jpg" width="80" alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h5>Emily</h5>
                                        <p>
                                            Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris.
                                        </p>
                                                <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                </span>
                                    </div>
                                </div><!--media-->
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object img-circle" src="images/team-1.jpg" width="80" alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h5>Emily</h5>
                                        <p>
                                            Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris.
                                        </p>
                                                <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                </span>
                                    </div>
                                </div><!--media-->
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object img-circle" src="images/team-1.jpg" width="80" alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h5>Emily</h5>
                                        <p>
                                            Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris.
                                        </p>
                                                <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                </span>
                                    </div>
                                </div><!--media-->
                            </div>
                            <div role="tabpanel" class="tab-pane" id="add-cmnt">
                                <form role="form" method="post" action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputFirstName" class="control-label">First Name:<span class="text-error">*</span></label>
                                                <div>
                                                    <input type="text" class="form-control" id="inputFirstName">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputCompany" class="control-label">Company:</label>
                                                <div>
                                                    <input type="text" class="form-control" id="inputCompany">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="review" class="control-label">Add Review:*</label>
                                                <textarea class="form-control" id="review">    </textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <input type="submit" class="btn-skin btn btn-lg" value="Add Review">
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-3">
            @include('includes.categories_menu')
        </div><!--sidebar col-->
    </div>
    <div class="space-60"></div>

</div>
<div class="space-60"></div>

@endsection