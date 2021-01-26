<?php

use App\Http\Controllers\Controller;

$footer = Controller::footer();
$global_settings =Controller::global_settings();
$categories =Controller::footer_categories();

?>
  <!-- footer-area start -->
<footer class="footer-area mt-30">
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<div class="col-lg-4 col-md-4 ">
							<div class="single-footer-content">
								<div class="footer-title">
									<h3>Store</h3>
								</div>
								<div class="footer-content-info">
									<ul>
										<li class="footer-contact"><i class="fa fa-map-marker"></i>Fashion avenue 16201 Ford Rd Suite 121, Dearborn, MI 48126</li>
										<li class="footer-contact"><i class="fa fa-phone"></i>3134064889</li>
										<!-- <li class="footer-contact"><i class="fa fa-fax"></i>9876543210</li> -->
										<li class="footer-contact"><i class="fa fa-envelope"></i>support@fashionavenue.com</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- <div class="col-lg-3 col-md-3">
							<div class="single-footer-content">
								<div class="footer-title">
									<h3>Products</h3>
								</div>
								<div class="footer-content-info">
									<ul>
										<li><a href="#">Prices drop</a></li>
										<li><a href="#">New products</a></li>
										<li><a href="#">Best sales</a></li>
										<li><a href="#">Contact us</a></li>
										<li><a href="#">Stores</a></li>
										<li><a href="#">Login</a></li>
									</ul>
								</div>
							</div>
						</div> -->
						<div class="col-lg-4 col-md-4 col-6">
							<div class="single-footer-content">
								<div class="footer-title">
									<h3>Categories</h3>
								</div>
								<div class="footer-content-info">
									<ul>
									@foreach ($categories as $category)
										<li><a href="{{ $category->path() }}">{{ $category->category_name }}</a></li>
									@endforeach
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-6">
							<div class="single-footer-content">
								<div class="footer-title">
									<h3>Helpfull Links</h3>
								</div>
								<div class="footer-content-info">
									<ul>
										<li><a href="{{ url('/', app()->getLocale()) }}">Home</a></li>
										<li><a href="{{ url('/our-products', app()->getLocale()) }}">Products</a></li>
										<li><a href="{{ route('aboutus',app()->getLocale()) }}">About us</a></li>
										<li><a href="{{ route('contactus',app()->getLocale()) }}">Contact</a></li>
										<li><a href="{{ route('warranty',app()->getLocale()) }}">Warranty</a></li>
										<li><a href="{{ route('security-check',app()->getLocale()) }}">Privicy Policy</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-12">
					<div class="single-footer-content">
						<div class="footer-title">
							<h3>Sign up & get 10% off </h3>
						</div>
						<div class="footer-content-info">
							<p>Register your email for news and special offers</p>
							<form action="#" class="newsletter-form">
								<div class="newsletter-input">
									<input class="input-inner" type="text" placeholder="Your email address">
								</div>
								<input type="submit" value="Submit" class="newsletter-btn">
							</form>
							<div class="social-wrapper">
								<h3>Follow us</h3>
								<ul class="footer-social-icon">
									@if (isset($footer->fb))
									<li><a href="{{ $footer->fb }}" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
									@endif
									@if (isset($footer->ig))
									<li><a href="{{ $footer->ig }}" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
									@endif
									@if (isset($footer->twitter))
									<li><a href="{{ $footer->twitter }}" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
									@endif
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="footer-store-info">
						<div class="footer-logo">
							<a href="#"><img src="../storage/logo/{{ $global_settings->footer_logo ?? ''}}" alt="fashionavenu"></a>
						</div>
						<!-- <p>in-store customer servie: <span class="store-phone">(+1)866-540-3229</span></p> -->
						<p>in-store customer servie: <span class="store-phone">(+1)3134064889</span></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-botton">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="payment-img">
						<img src="img/brand/payment.png" alt="">
					</div>
					<div class="copy-right">
						<p>Copyright &copy; <a href="http://digitafro.com">Digitafro </a> . All Rights Reserved.</p>
						<p>Any orders placed through this store will not be honored or fulfilled.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- footer-area end -->