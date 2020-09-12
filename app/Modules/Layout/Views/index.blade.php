<!doctype html>
<html lang="en" dir="ltr">

<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="msapplication-TileColor" content="#0061da">
		<meta name="theme-color" content="#1643a3">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="#" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="#" />

		<!-- Title -->
		<title>Green Admin</title>
		<link rel="stylesheet" href="{{asset('fonts/fontawesome/css/all.min.css')}}">

		<!-- Font Family-->
		<link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,700" rel="stylesheet">

		<!-- Dashboard Css -->
        <link href="{{asset('css/sidemenu.css')}}" rel="stylesheet" />
		<link href="{{asset('css/dashboard.css')}}" rel="stylesheet" />
		<!-- <link href="{{asset('vendor/sweetalert/sweetalert.css')}}" rel="stylesheet" /> -->
		<link href="{{asset('css/custom.css')}}" rel="stylesheet" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('css')
	</head>
	<body class="" >
		<div id="global-loader" ></div>
		<div class="page">
			<div class="page-main">
                <!-- header -->
                @include('Layout::header')

				<div class="wrapper">
					<!-- Sidebar Holder -->
                    @include('Layout::sidebar')
					<div class=" content-area">
                        @yield('content')
					</div>
				</div>
			</div>

			<!--footer-->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-lg-12 col-sm-12 mt-3 mt-lg-0 text-center">
							© 2020
						</div>
					</div>
				</div>
			</footer>
			<!-- End Footer-->
		</div>

		<div id="modal" class="modal fade"></div>
		<div id="modal1" class="modal fade"></div>

		<!-- Dashboard js -->
		<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('js/sidemenu.js')}}"></script>
		<script src="{{asset('vendor/sweetalert/sweetalert.min.js')}}"></script>

		<!-- Custom Js-->
		<script src="{{asset('js/custom.js')}}"></script>

		<script>
			$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });

		</script>
        @yield('js')
	</body>

</html>
