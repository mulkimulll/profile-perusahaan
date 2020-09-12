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
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

    <!-- Title -->
    <title>GREEN ADMIN</title>
    <link rel="stylesheet" href="{{asset('fonts/fonts/font-awesome.min.css')}}">

    <!-- Font Family-->
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,700" rel="stylesheet">

    <!-- Dashboard Css -->
    <link href="{{asset('css/sidemenu.css')}}" rel="stylesheet" />
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet" />

  </head>
	<body class="">
		<div class="page">
			<div class="page-single">
				<div class="container">
					<div class="row">
						<div class="col mx-auto">
							<div class="text-center mb-6 d-flex justify-content-center">
                                <span class="my-auto ml-2">
									<!-- <img src="{{asset('img/logomybusiness.jpg')}}" height=50% width=60%> -->
                                    <h4 class="m-0">Green admin</h4>
                                </span>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-4">
									<div class="card-group mb-0">
										<div class="card p-4">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
    											<div class="card-body">
    												<h1 class="text-center">Log masuk</h1>
    												<div class="input-group mb-3">
    													<span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                        <input id="username" type="text" placeholder="nama pengguna" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
    												</div>
    												<div class="input-group mb-4">
    													<span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                        <input id="password" type="password" placeholder="kata sandi" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    												</div>
    												<div class="row">
    													<div class="col-12">
    														<button class="btn btn-success btn-block" type="submit">Masuk</button>
    													</div>
    												</div>
    											</div>
                                            </form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- Dashboard js -->
        <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

		<!-- Custom Js-->
	</body>

</html>
