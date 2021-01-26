<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
$categories = Controller::categories();
$contact = Controller::contact();
$global_settings = Controller::global_settings();
?>

<header>
	<!-- header-top start -->
	<!-- <div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-md-10">
					<div class="support-area">
						<div class="single-support">
							<div class="support-icon">
								<i class="fa fa-truck"></i>
							</div>
							<div class="support-description">
								<p>Free delivery guarantee</p>
							</div>
						</div>
						<div class="single-support">
							<div class="support-description">
								<p>CUSTOMER SERVIE: (+1)3134064889</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5 col-md-2">
					<div class="top-right-wrapper">
						<div class="top-dropdown">
							<ul>
								<li class="drodown-show"><a href="#">English <i class="fa fa-angle-down"></i></a>
									<ul class="open-dropdown">
									  <li><a href="{{ route(Route::currentRouteName(),array_merge(Route::current()->parameters(), ['locale' => 'en'])) }}">English</a></li>
									 	<li><a href="{{ route(Route::currentRouteName(),array_merge(Route::current()->parameters(), ['locale' => 'es'])) }}">Spanish</a></li> 
										
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- header-top end -->
	<!-- header-mid-area start -->
	<div class="header-mid-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<!-- logo start -->
					<div class="logo">
						<a href="/"><img src="/storage/logo/{{ $global_settings->logo ?? ''}}" alt="fashion avenue"></a>
					</div>
					<!-- logo end -->
				</div>
				<div class="col-xs-12 col-md-8 col-lg-8">
					<div class="mid-right-wrapper">
						<!-- <div class="user-info-top">
							<ul>
								<li><a href="#">Welcome, Guest</a></li>
								<li><a href="login-register.html">Sign in</a></li>
								<li><a href="checkout.html" class="checkout">Checkout</a></li>
							</ul>
						</div> -->
						<? 
						// {{ route('search', app()->getLocale()) }} 
						?>
						<div class="search-area">
							<form action="{{ route('search', app()->getLocale()) }}" method="POST" enctype="multipart/form-data">
							<!-- <form> -->
								{{ csrf_field() }}
								<input type="text" name="product_name" placeholder="Search our products">
								<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- header-mid-area end -->
	<!-- menu-arae start -->
	<div id="stickymenu" class="main-menu-area solidblockmenu">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-menu display-none">
						<nav>
							<ul>
								<li class="active"><a href="{{ url('/', app()->getLocale()) }}">Home</a></li>
								@foreach( $categories as $parentCategory)
								<li><a href="{{ $parentCategory->path() }}" >{{ $parentCategory->category_name ?? '' }} <span>
									@if ($parentCategory->children)
									<i class="fa fa-angle-down"></i>
									@endif
									</span></a>
									<ul class="mega-menu mega-menu-two" style="display: none; height: 178px; padding-top: 30px; margin-top: 0px; padding-bottom: 30px; margin-bottom: 0px;">
										@foreach($parentCategory->children as $key => $child_cat)
											<li><a href="{{ $child_cat->path() }}">{{ $child_cat->category_name }}</a>
												<ul>
													@foreach($child_cat->child as $key => $child)
													<li><a href="{{ $child->path() }}">{{ $child->category_name }}</a></li>
													@endforeach
												</ul>
											</li>
										@endforeach
									</ul>
								</li>
								@endforeach
										
						
								<!-- <li><a href="{{ route('aboutus',app()->getLocale()) }}">About us</a></li> -->
								<li><a href="{{ route('contactus',app()->getLocale()) }}">Contact Us</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!-- Mobile Menu Area Start -->
					<div class="mobile-menu-area hidden-md hidden-lg">
						<div class="mobile-menu">
							<nav id="mobile-menu-active">
								<ul>
									<li class="active"><a href="{{ url('/', app()->getLocale()) }}">Home</a></li>
									@foreach( $categories as $parentCategory)
									<li><a href="{{ $parentCategory->path() }}"> {{ $parentCategory->category_name ?? '' }}</a>
										<ul>
										@foreach($parentCategory->children as $key => $child_cat)
											<li><a href="{{ $child_cat->path() }}">{{ $child_cat->category_name }}</a>
												<ul>
													@foreach($child_cat->child as $key => $child)
													<li><a href="{{ $child->path() }}">{{ $child->category_name }}</a></li>
													@endforeach
												</ul>
											</li>
										@endforeach
										</ul>
									</li>
									@endforeach
									<li><a href="{{ route('aboutus',app()->getLocale()) }}">About us</a></li>
									<li><a href="{{ route('contactus',app()->getLocale()) }}">Contact Us</a></li>
								</ul>
							</nav>							
						</div>
					</div>
					<!-- Mobile Menu Area End -->
				</div>
			</div>
		</div>
	</div>
	<!-- menu-arae end -->
</header>