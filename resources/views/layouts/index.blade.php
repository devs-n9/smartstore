<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Assan E-commerce</title>

        <!-- Bootstrap -->
        <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!--plugins-->
        <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('bower_components/flexslider/flexslider.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/libs/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/libs/owl-carousel/owl.theme.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/libs/owl-carousel/owl.transitions.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/fonts/pe-icons/Pe-icon-7-stroke.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/libs/custom-scrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/yamm.css') }}" rel="stylesheet">
        <!--revolution css-->
        <link href="{{ asset('assets/libs/revolution/css/navigation.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/libs/revolution/css/layers.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/libs/revolution/css/settings.css') }}" rel="stylesheet">
        <!--sky-forms css file-->
        <link href="{{ asset('assets/libs/sky-form/css/sky-forms.css') }}" rel="stylesheet">
        <!--custom css file-->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--search toggle form-->
        <div class="search-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <form>
                            <input type="text" class="form-control" placeholder="E.g. Blue T-shirt...">
                            <span class="search-close"><i class="fa fa-times"></i></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--search toggle form end-->
        <!--header start-->
        <header class="header">
            <!--top bar-->
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 hidden-xs">
                            <span>Welcome message goes here...</span>
                        </div>
                        <div class="col-sm-6 text-right">
                            <ul class="list-inline">
                                <li class="hidden-xs"><a href="#" class="offers">offers</a></li>                              
                                <li class="hidden-xs"><a href="#"><i class="pe-7s-user"></i> Register</a></li>
                                <li><a href="#"><i class="pe-7s-lock"></i> Login</a></li>
                                <li class="lang-dropdown">
                                    <a href="#"><img src="{{ asset('assets/images/flag1.png') }}" alt=""> English <i class="fa fa-angle-down"></i></a>
                                    <div class="lang-drop-menu">
                                        <a href="#"><img src="{{ asset('assets/images/flag1.png') }}" alt=""> English</a>
                                        <a href="#"><img src="{{ asset('assets/images/flag2.png') }}" alt=""> French</a>
                                        <a href="#"><img src="{{ asset('assets/images/flag3.png') }}" alt=""> German</a>
                                    </div>
                                </li>
                                <li><a href="javascript:void(0)" class="search-toggle"><i class="fa fa-search"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--top bar end-->


            <!--main navigation start-->
            <!-- Static navbar -->
            <nav class="navbar navbar-default navbar-static-top yamm sticky">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/"><img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/">Home</a></li>
                            <!--mega menu-->
                            <li class="dropdown yamm-fw">
                                <a href="/catalog" class="dropdown-toggle js-activated" data-toggle="dropdown">Catalog  <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="yamm-content">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h3 class="heading">Base pages</h3>
                                                    <ul class="nav mega-vertical-nav">
                                                        <li><a href="/catalog"><i class="fa fa-angle-right"></i> Catalog </a></li>
                                                        <li><a href="product-detail.html"><i class="fa fa-angle-right"></i> Product Detail </a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <img src="{{ asset('assets/images/women/10.jpg') }}" class="img-responsive" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li> <!--menu Features li end here-->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown" role="button" aria-haspopup="true">Blog <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    
                                    <li><a href="blog-masonry.html">Masonry view</a></li>
                                    <li><a href="blog-post.html">Single Post</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown" role="button" aria-haspopup="true"><i class="pe-7s-cart"></i>
                                    <span class="badge">{{ Session::get('cntProd') }}</span>
                                </a>
                                <div class="dropdown-menu shopping-cart">
                                    <div class="cart-items content-scroll">
                                        @if(Session::get('cart'))
                                            @foreach(Session::get('cart') as $k => $val)
                                               <div class="cart-item clearfix" data-id="{{ $val['id'] }}">
                                                    <div class="img">
                                                        <img src="{{ asset('assets/images/men/'.$val['preview']) }}" alt="" class="img-responsive">
                                                    </div><!--img-->
                                                    <div class="description">
                                                        <a href="category/{{ $val['alias'] }}">{{ $val['product'] }}</a><strong class="price">1 x ${{ $val['price'] }}</strong>
                                                    </div><!--Description-->
                                                    <div class="buttons delCart" data-id="{{ $val['id'] }}">
                                                        <a href="#" class="fa fa-trash-o"></a>
                                                    </div>
                                                </div><!--cart item-->
                                            @endforeach
                                        @endif
                                    </div><!--cart-items-->

                                    <div class="cart-footer">
                                        <a href="/cart" class="btn btn-light-dark"> View Cart</a>
                                    </div><!--footer of cart-->


                                </div><!--cart dropdown end-->
                            </li>

                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>
            <!--main navigation end-->
        </header>
        <!--header end-->

        @yield('content')

        <!--footer start-->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 margin-b-30">
                        <h3>About store</h3>
                        <p>
                            Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus
                        </p>
                        <ul class="list-inline social-footer">
                            <li><a href="#" data-toggle="tooltip" data-placement="top" data-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" data-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" data-title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" data-title="Google plus"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" data-title="Youtube"><i class="fa fa-youtube-play"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" data-title="Rss feeds"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3>Latest Tweets </h3>
                        <div class="tweet"></div>
                    </div>
                    <div class="col-md-3 margin-b-30">
                        <h3>Product Tags </h3>
                        <div class="tags clearfix">
                            <a href="#">Fashion</a>
                            <a href="#">Shoes</a>
                            <a href="#">bootstrap</a>
                            <a href="#">Kids</a>
                            <a href="#">Slippers</a>
                            <a href="#">inner-wears</a>
                            <a href="#">Women</a>
                            <a href="#">Men</a>
                            <a href="#">T-shirts</a>
                            <a href="#">Jeans</a>
                            <a href="#">Socks</a>
                            <a href="#">Sports</a>
                            <a href="#">Clothes</a>
                            <a href="#">Watches</a>
                        </div>
                    </div>
                    <div class="col-md-3 margin-b-30">
                        <h3>Help Center</h3>
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">+01 1800 345-4509</h4>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">care@assan.com</h4>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">124, Lorem street, California, Usa</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="footer-bottom">
            <div class="container text-center">
                <h3><a href="index.html"><img src="{{ asset('assets/images/logo-white.png') }}" alt=""></a></h3>
                <ul class="list-inline">
                    <li><a href="#">Site Map</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="#">Privacy & policy</a></li>
                </ul>
                <img src="{{ asset('assets/images/payment.png') }}" alt="" class="img-responsive payment">
                <span class="copyright">&copy; Copyright 2015, Assan.</span>
            </div>
        </div>
        <!--footer end-->
        <!--js plugins-->
        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!--        <script src="{{ asset('bower_components/jquery-migrate/jquery-migrate.min.js') }}" type="text/javascript"></script>-->
        <script src="{{ asset('bower_components/jquery.easing/js/jquery.easing.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.sticky.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.mousewheel.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/libs/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('bower_components/flexslider/jquery.flexslider-min.js') }}"></script>
        <script src="{{ asset('assets/libs/owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/tweetie.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/custom.js') }}" type="text/javascript"></script>
        <script src="{{ asset('bower_components/lightbox2/dist/js/lightbox.min.js') }}" type="text/javascript"></script>
        <!--revolution slider extentions-->
        <script type="text/javascript" src="{{ asset('assets/libs/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/libs/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
        <!--revolution slider extentions-->
        <script type="text/javascript" src="{{ asset('assets/libs/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/libs/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/libs/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
        <!--cart script-->
        <script type="text/javascript" src="{{ asset('assets/js/cart.js') }}"></script>
        <script>
            /******************************************
             -	PREPARE PLACEHOLDER FOR SLIDER	-
             ******************************************/

            var revapi;
            jQuery(document).ready(function () {
                revapi = jQuery("#rev_slider").revolution({
                    sliderType: "standard",
                    sliderLayout: "auto",
                    delay: 9000,
                    navigation: {
                        arrows: {enable: true}
                    },
                    gridwidth: 1230,
                    gridheight: 500
                });
            });	/*ready*/
        </script>	
    </body>
</html>
