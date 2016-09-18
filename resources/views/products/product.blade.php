@extends('layouts.index')

@section('content')

<div class="space-60"></div>
<div class="container">
    <div class="row single-product">

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-5 margin-b-30">
                    <div id="product-single"  class="owl-carousel owl-theme single-product-slider">
                        <div class="item">
                            <a href="images/men/s-1.jpg" data-lightbox="roadtrip"> <img src="images/men/s-1.jpg" alt="Product image" class="img-responsive"></a>
                        </div>
                        <div class="item">
                            <a href="images/men/s-2.jpg" data-lightbox="roadtrip"> <img src="images/men/s-2.jpg" alt="Product image" class="img-responsive"></a>
                        </div>
                        <div class="item">
                            <a href="images/men/s-3.jpg" data-lightbox="roadtrip"> <img src="images/men/s-3.jpg" alt="Product image" class="img-responsive"></a>
                        </div>
                        <div class="item">
                            <a href="images/men/s-4.jpg" data-lightbox="roadtrip"> <img src="images/men/s-4.jpg" alt="Product image" class="img-responsive"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="product-detail-desc">
                        <h3 class="title"><a href="#">Product Name</a></h3>
                        <span class="price"><del>$299.00</del> $199.00</span>
                                <span class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-full"></i>
                                    <a href="#">8 Reviews</a>
                                </span>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <div class="colors">
                            <span>Choose color</span>
                            <a href="#" class="light"></a>
                            <a href="#" class="blue"></a>
                            <a href="#" class="yellow"></a>
                            <a href="#" class="red"></a>
                        </div>
                        <div class="available">
                            Availability : In Stock
                        </div>
                        <div class="size">
                            <span>Size:</span>
                            <select><option>38</option><option>40</option><option>42</option><option>44</option></select>
                        </div>
                        <div class="add-buttons">
                            <a href="#" class="btn btn-border btn-lg" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart"></i></a>
                            <a href="#" class="btn btn-border btn-lg"  data-toggle="tooltip" data-placement="top" title="Add to Compare"><i class="fa fa-random"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Add to cart" class="btn btn-skin btn-lg"><i class="fa fa-shopping-cart"></i> Add to cart</a>
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
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                                <p>
                                    Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.
                                </p>
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
            <div class="sidebar-widget">
                <h3>Categories</h3>
                <ul class="list-unstyled">
                    <li><a href="#">New Arrivals</a></li>
                    <li><a href="#">Men</a></li>
                    <li><a href="#">Women</a></li>
                    <li><a href="#">T-shirts</a></li>
                    <li><a href="#">Shoes</a></li>
                    <li><a href="#">Handbags</a></li>
                    <li><a href="#">Accessories</a></li>
                </ul>
            </div><!--sidebar-widget end-->
            <div class="sidebar-widget">
                <h3>Bestseller </h3>
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="images/men/5.jpg" alt="" width="70">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href='#'>men's backpack</a></h4>
                                <span class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-empty"></i>
                                </span>
                                <span class="price">
                                    <del>$99.00</del>
                                    $49.00
                                </span>

                    </div>
                </div><!--media-->
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="images/men/6.jpg" alt="" width="70">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href='#'>men's T-shirts</a></h4>
                                <span class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-empty"></i>
                                </span>
                                <span class="price">
                                    <del>$99.00</del>
                                    $49.00
                                </span>

                    </div>
                </div><!--media-->
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="images/women/5.jpg" alt="" width="70">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href='#'>Women's lowers</a></h4>
                                <span class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-empty"></i>
                                </span>
                                <span class="price">
                                    <del>$99.00</del>
                                    $49.00
                                </span>

                    </div>
                </div><!--media-->
            </div><!--sidebar-widget end-->
            <div class="sidebar-widget clearfix">
                <h3>Color</h3>
                <a class="color-box gray" href='#'></a>
                <a class="color-box black" href='#'></a>
                <a class="color-box blue" href='#'></a>
                <a class="color-box red" href='#'></a>
                <a class="color-box yellow" href='#'></a>
            </div>
        </div><!--sidebar col-->
    </div>
    <div class="space-60"></div>
    <div class="similar-products">
        <h2 class="section-heading">Similar Products</h2>
        <!--owl carousel-->
        <div class="row">
            <div id="owl-slider" class="col-md-12">
                <div class="item">
                    <div class="item_holder">
                        <a href="#"><img src="images/women/1.jpg" alt="" class="img-responsive"></a>
                        <div class="title">
                            <h5>Sky-Blue <br>Short Skirt</h5>
                            <span class="price">$29.99</span>
                        </div>
                    </div><!--item holder-->
                </div> <!--item loop-->
                <div class="item">
                    <div class="item_holder">
                        <a href="#"><img src="images/men/1.jpg" alt="" class="img-responsive"></a>
                        <div class="title">
                            <h5>Dark-Blue <br>Men's t-shirt</h5>
                            <span class="price">$19.99 <del>$25.99</del></span>
                        </div>
                    </div><!--item holder-->
                </div> <!--item loop-->
                <div class="item">
                    <div class="item_holder">
                        <a href="#"><img src="images/women/2.jpg" alt="" class="img-responsive"></a>
                        <div class="title">
                            <h5>Black <br>Short Skirt</h5>
                            <span class="price">$29.99</span>
                        </div>
                    </div><!--item holder-->
                </div> <!--item loop-->
                <div class="item">
                    <div class="item_holder">
                        <a href="#"><img src="images/men/3.jpg" alt="" class="img-responsive"></a>
                        <div class="title">
                            <h5>Black <br>analog watch</h5>
                            <span class="price">$45.99</span>
                        </div>
                    </div><!--item holder-->
                </div> <!--item loop-->
                <div class="item">
                    <div class="item_holder">
                        <a href="#"><img src="images/men/4.jpg" alt="" class="img-responsive"></a>
                        <div class="title">
                            <h5>Black & blue <br>Backpack</h5>
                            <span class="price">$45.99</span>
                        </div>
                    </div><!--item holder-->
                </div> <!--item loop-->
                <div class="item">
                    <div class="item_holder">
                        <a href="#"><img src="images/men/5.jpg" alt="" class="img-responsive"></a>
                        <div class="title">
                            <h5>Black & blue <br>Laptop bag</h5>
                            <span class="price">$45.99</span>
                        </div>
                    </div><!--item holder-->
                </div> <!--item loop-->
            </div>
        </div>
        <!--owl end-->
    </div><!--similar products-->

</div>
<div class="space-60"></div>

@endsection