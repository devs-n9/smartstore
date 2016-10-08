<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Gentallela Dashboard</title>

	<!-- Bootstrap -->
	<link href="{{ asset('bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="{{ asset('bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<!-- iCheck -->
	<link href="{{ asset('bower_components/gentelella/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
	<!-- bootstrap-progressbar -->
	<link href="{{ asset('bower_components/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
	<!-- jVectorMap -->
	<link href="{{ asset('bower_components/gentelella/production/css/maps/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />

    <!-- data tables -->
    <link href="{{ asset('bower_components/gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">

	<!-- cropper -->
    <link href="{{ asset('bower_components/cropperjs/dist/cropper.min.css') }}" rel="stylesheet">

	<!-- datetimepicker -->
	<link href="{{ asset('bower_components/datetimepicker/build/jquery.datetimepicker.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
	<link href="{{ asset('bower_components/gentelella/build/css/custom.min.css') }}" rel="stylesheet">

	<!-- our dashboard custom styles -->
	<link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
</head>

<body class="nav-md">

	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="{{ url('dashboard') }}" class="site_title"><span>Smart dashboard</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile">
						<div class="profile_pic">
							@if(Auth::user()->avatar)
								<img class="img-circle profile_img" src="{{ asset('/uploads/images/users/' . Auth::user()->avatar) }}" alt="">
							@else
								<img class="img-circle profile_img" src="{{ asset('/assets/images/default-user-image.png') }}" alt="">
							@endif
						</div>
						<div class="profile_info">
							@if(Auth::check())
								<span>Welcome,</span>
								<h2>Welcome {{ Auth::user()->login }}</h2>
							@endif
						</div>
						<div class="clearfix"></div>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>General</h3>
							<ul class="nav side-menu">
								<li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Home</a>
								</li>
								<li><a href="/dashboard/orders"><i class="fa fa-inbox"></i> Orders</a></li>
								<li><a><i class="fa fa-cube"></i> {{ trans('messages.Products') }} <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="/dashboard/products/all">{{ trans('messages.Show_products') }}</a></li>
										<li><a href="/dashboard/product/add">{{ trans('messages.Add_product') }}</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-apple"></i> {{ trans('messages.Brands') }} <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="/dashboard/brands/all">{{ trans('messages.Show_brands') }}</a></li>
										<li><a href="/dashboard/brands/add">{{ trans('messages.Add_brand') }}</a></li>
									</ul>
								</li>
								<li><a href="/dashboard/notify"><i class="fa fa-inbox"></i> Уведомления</a></li>
							</ul>
						</div>
					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Logout">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav class="" role="navigation">
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>

						<ul class="nav navbar-nav navbar-right">
							<li class="">
								<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									@if(Auth::user()->avatar)
										<img src="{{ asset('/uploads/images/users/' . Auth::user()->avatar) }}" alt="">
									@else
										<img src="{{ asset('/assets/images/default-user-image.png') }}" alt="">
									@endif
									@if(Auth::check())
										<span>Welcome {{ Auth::user()->login }}</span>
									@endif
									<span class=" fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									{{--<li><a href="javascript:;"> Profile</a></li>--}}
									{{--<li>--}}
										{{--<a href="javascript:;">--}}
											{{--<span class="badge bg-red pull-right">50%</span>--}}
											{{--<span>Settings</span>--}}
										{{--</a>--}}
									{{--</li>--}}
									{{--<li><a href="javascript:;">Help</a></li>--}}
									<li><a href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
								</ul>
							</li>

							{{--<li role="presentation" class="dropdown">--}}
								{{--<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">--}}
									{{--<i class="fa fa-envelope-o"></i>--}}
									{{--<span class="badge bg-green">6</span>--}}
								{{--</a>--}}
								{{--<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">--}}
									{{--<li>--}}
										{{--<a>--}}
											{{--<span class="image"><img src="{{ asset('bower_components/gentelella/production/images/img.jpg') }}" alt="Profile Image" /></span>--}}
											{{--<span>--}}
                          {{--<span>John Smith</span>--}}
											{{--<span class="time">3 mins ago</span>--}}
											{{--</span>--}}
											{{--<span class="message">--}}
                          {{--Film festivals used to be do-or-die moments for movie makers. They were where...--}}
                        {{--</span>--}}
										{{--</a>--}}
									{{--</li>--}}
									{{--<li>--}}
										{{--<a>--}}
											{{--<span class="image"><img src="{{ asset('bower_components/gentelella/production/images/img.jpg') }}" alt="Profile Image" /></span>--}}
											{{--<span>--}}
                          {{--<span>John Smith</span>--}}
											{{--<span class="time">3 mins ago</span>--}}
											{{--</span>--}}
											{{--<span class="message">--}}
                          {{--Film festivals used to be do-or-die moments for movie makers. They were where...--}}
                        {{--</span>--}}
										{{--</a>--}}
									{{--</li>--}}
									{{--<li>--}}
										{{--<a>--}}
											{{--<span class="image"><img src="{{ asset('bower_components/gentelella/production/images/img.jpg') }}" alt="Profile Image" /></span>--}}
											{{--<span>--}}
                          {{--<span>John Smith</span>--}}
											{{--<span class="time">3 mins ago</span>--}}
											{{--</span>--}}
											{{--<span class="message">--}}
                          {{--Film festivals used to be do-or-die moments for movie makers. They were where...--}}
                        {{--</span>--}}
										{{--</a>--}}
									{{--</li>--}}
									{{--<li>--}}
										{{--<a>--}}
											{{--<span class="image"><img src="{{ asset('bower_components/gentelella/production/images/img.jpg') }}" alt="Profile Image" /></span>--}}
											{{--<span>--}}
                          {{--<span>John Smith</span>--}}
											{{--<span class="time">3 mins ago</span>--}}
											{{--</span>--}}
											{{--<span class="message">--}}
                          {{--Film festivals used to be do-or-die moments for movie makers. They were where...--}}
                        {{--</span>--}}
										{{--</a>--}}
									{{--</li>--}}
									{{--<li>--}}
										{{--<div class="text-center">--}}
											{{--<a>--}}
												{{--<strong>See All Alerts</strong>--}}
												{{--<i class="fa fa-angle-right"></i>--}}
											{{--</a>--}}
										{{--</div>--}}
									{{--</li>--}}
								{{--</ul>--}}
							{{--</li>--}}
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->

			<!-- page content -->
			<div class="right_col" role="main">
				@yield('content')
			</div>
			<!-- /page content -->



			<!-- footer content -->
			<footer>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>

	<!-- jQuery -->
	<script src="{{ asset('bower_components/gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('bower_components/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<!-- FastClick -->
	<script src="{{ asset('bower_components/gentelella/vendors/fastclick/lib/fastclick.js') }}"></script>
	<!-- NProgress -->
	<script src="{{ asset('bower_components/gentelella/vendors/nprogress/nprogress.js') }}"></script>
	<!-- Chart.js -->
	<script src="{{ asset('bower_components/gentelella/vendors/Chart.js/dist/Chart.min.js') }}"></script>
	<!-- gauge.js -->
	<script src="{{ asset('bower_components/gentelella/vendors/bernii/gauge.js/dist/gauge.min.js') }}"></script>
	<!-- bootstrap-progressbar -->
	<script src="{{ asset('bower_components/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
	<!-- iCheck -->
	<script src="{{ asset('bower_components/gentelella/vendors/iCheck/icheck.min.js') }}"></script>
	<!-- Skycons -->
	<script src="{{ asset('bower_components/gentelella/vendors/skycons/skycons.js') }}"></script>
	<!-- Flot -->
	<script src="{{ asset('bower_components/gentelella/vendors/Flot/jquery.flot.js') }}"></script>
	<script src="{{ asset('bower_components/gentelella/vendors/Flot/jquery.flot.pie.js') }}"></script>
	<script src="{{ asset('bower_components/gentelella/vendors/Flot/jquery.flot.time.js') }}"></script>
	<script src="{{ asset('bower_components/gentelella/vendors/Flot/jquery.flot.stack.js') }}"></script>
	<script src="{{ asset('bower_components/gentelella/vendors/Flot/jquery.flot.resize.js') }}"></script>
	<!-- Flot plugins -->
	<script src="{{ asset('bower_components/gentelella/production/js/flot/jquery.flot.orderBars.js') }}"></script>
	<script src="{{ asset('bower_components/gentelella/production/js/flot/date.js') }}"></script>
	<script src="{{ asset('bower_components/gentelella/production/js/flot/jquery.flot.spline.js') }}"></script>
	<script src="{{ asset('bower_components/gentelella/production/js/flot/curvedLines.js') }}"></script>
	<!-- jVectorMap -->
	<script src="{{ asset('bower_components/gentelella/production/js/maps/jquery-jvectormap-2.0.3.min.js') }}"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="{{ asset('bower_components/gentelella/production/js/moment/moment.min.js') }}"></script>
	<script src="{{ asset('bower_components/gentelella/production/js/datepicker/daterangepicker.js') }}"></script>

	<!-- datetimepicker -->
	<script src="{{ asset('bower_components/datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>

	<!-- Custom Theme Scripts -->
	<script src="{{ asset('bower_components/gentelella/build/js/custom.min.js') }}"></script>

	<!-- Flot -->
	<script>
		$(document).ready(function () {
			var data1 = [
            [gd(2012, 1, 1), 17],
            [gd(2012, 1, 2), 74],
            [gd(2012, 1, 3), 6],
            [gd(2012, 1, 4), 39],
            [gd(2012, 1, 5), 20],
            [gd(2012, 1, 6), 85],
            [gd(2012, 1, 7), 7]
        ];

			var data2 = [
            [gd(2012, 1, 1), 82],
            [gd(2012, 1, 2), 23],
            [gd(2012, 1, 3), 66],
            [gd(2012, 1, 4), 9],
            [gd(2012, 1, 5), 119],
            [gd(2012, 1, 6), 6],
            [gd(2012, 1, 7), 9]
        ];
			$("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
            data1, data2
        ], {
				series: {
					lines: {
						show: false,
						fill: true
					},
					splines: {
						show: true,
						tension: 0.4,
						lineWidth: 1,
						fill: 0.4
					},
					points: {
						radius: 0,
						show: true
					},
					shadowSize: 2
				},
				grid: {
					verticalLines: true,
					hoverable: true,
					clickable: true,
					tickColor: "#d5d5d5",
					borderWidth: 1,
					color: '#fff'
				},
				colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
				xaxis: {
					tickColor: "rgba(51, 51, 51, 0.06)",
					mode: "time",
					tickSize: [1, "day"],
					//tickLength: 10,
					axisLabel: "Date",
					axisLabelUseCanvas: true,
					axisLabelFontSizePixels: 12,
					axisLabelFontFamily: 'Verdana, Arial',
					axisLabelPadding: 10
				},
				yaxis: {
					ticks: 8,
					tickColor: "rgba(51, 51, 51, 0.06)",
				},
				tooltip: false
			});

			function gd(year, month, day) {
				return new Date(year, month - 1, day).getTime();
			}
		});
	</script>
	<!-- /Flot -->

    <!-- Datatables -->
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-scroller/js/datatables.scroller.min.js') }}"></script>
    <!-- Datatables -->

	<!-- cropper -->
	<script src="{{ asset('bower_components/cropperjs/dist/cropper.min.js') }}"></script>

    <!-- jVectorMap -->
	<script src="{{ asset('bower_components/gentelella/production/js/maps/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('bower_components/gentelella/production/js/maps/jquery-jvectormap-us-aea-en.js') }}"></script>
	<script src="{{ asset('bower_components/gentelella/production/js/maps/gdp-data.js') }}"></script>
	<!-- bootstrap file input -->
	<script src="{{ asset('assets/js/bootstrap.file-input.js') }}"></script>
	<!-- litranslit -->
	<script src="{{ asset('assets/js/jquery.liTranslit.js') }}"></script>
	<script src="{{ asset('assets/js/dashboard.js') }}"></script>
	<script src="http://smartstore:3000/socket.io/socket.io.js"></script>
	<script src="{{ asset('assets/js/notify.js') }}"></script>
	
	<!-- javascript texts translate here -->
	<script>
		var are_you_sure = '{{ trans('messages.Sure_remove') }}';
	</script>
</body>

</html>
