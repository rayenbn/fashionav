<?php

use App\Http\Controllers\Controller;

$global_settings = Controller::global_settings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ $global_settings->meta_title ?? "" }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">	
        <!-- Place favicon.ico in the root directory -->
	    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('theme/img/favicon.ico')}}">	
		<!-- all CSS hear -->		
        <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('theme/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ asset('theme/css/material-design-iconic-font.min.css')}}">
        <link rel="stylesheet" href="{{ asset('theme/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{ asset('theme/css/slick.min.css')}}">
        <link rel="stylesheet" href="{{ asset('theme/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{ asset('theme/css/mainmenu.css')}}">
        <link rel="stylesheet" href="{{ asset('theme/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('theme/css/responsive.css')}}">	
        <script src="{{ asset('themejs/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>

<body>
	@if (\Request::is('/')) 
	<div class="wrapper home-2">
	@elseif ((\Request::is('/our-products')) )
	<div class="wrapper shop-fullwidth">
	@else
	<div class="wrapper">
	@endif
	
		@include('partials.themeHeader')
		
				@yield('content')
		
		@include('partials.footer')
	</div>
	
	<!-- jquery -->		
	<script src="{{ asset('theme/js/vendor/jquery-1.12.4.min.js')}}"></script>
	<!-- all plugins JS hear -->		
	<script src="{{ asset('theme/js/popper.min.js')}}"></script>	
	<script src="{{ asset('theme/js/bootstrap.min.js')}}"></script>	
	<script src="{{ asset('theme/js/slick.min.js')}}"></script>
	<script src="{{ asset('theme/js/owl.carousel.min.js')}}"></script>
	<script src="{{ asset('theme/js/jquery.mainmenu.js')}}"></script>	
	<script src="{{ asset('theme/js/ajax-email.js')}}"></script>
	<script src="{{ asset('theme/js/plugins.js')}}"></script>
	<!-- main JS -->		
	<script src="{{ asset('theme/js/main.js')}}"></script>
	@yield('scripts')
</body>

</html>