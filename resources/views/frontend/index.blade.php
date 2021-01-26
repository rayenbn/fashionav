@extends('layouts.theme')
@section('content')
<div class="page-wrap">
    <div class="page-content">
        <main class="main-content">

            @include('partials.slider', $sliders)
            @include('frontend.components.shop-category', $categories)


            <!-- product-area start -->
			<div class="product-area pb-90">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section-titel">
								<h2>{{ $home_page->sec1_title }}</h2>
							</div>
						</div>
					</div>
					<div class="product-wrapper">
                        <div class="row">
                            <div class="product-style-2 owl-carousel">
                                @foreach($section_one as $key => $prodOne)
                                    @if ( $loop->iteration % 2 != 0)
                                    <div class="col-lg-3">
                                    @endif
                                    <!-- single-product start -->
                                    <div class="single-product">
                                        <div class="product-image">
                                            <a href="{{ $prodOne->path() }}">
                                                <img src="/storage/products/{{ $prodOne->img ?? ''}}" alt="{{ $prodOne->img ?? ''}}">
                                            </a>
                                            <?php
                                                $start_date = \Carbon\Carbon::parse($prodOne->created_at);
                                                $now_date = \Carbon\Carbon::now();
                                                $different_days = $start_date->diffInDays($now_date);
                                            ?>
                                            @if ($different_days < 31)
                                            <span class="sale-sticker">New</span>
                                            @endif
                                            <div class="product-action">
                                                <a href="{{ $prodOne->path() }}">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="single-product-info">
                                            <div class="modal-color" style="margin: 11px 0;">
                                                <div class="color-list" style="text-align: center;">
                                                    <ul>
                                                    @foreach ( $prodOne->colors as $color )
                                                        @if ( $loop->iteration == 5)
                                                            @break
                                                        @endif
                                                        <li><a href="#" style="background-color: {{ $color->color_code }}"></a></li>
                                                    @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <h3><a href="{{ $prodOne->path() }}">{{ $prodOne->name }}</a></h3>
                                            <div class="product-price-box">
                                                @if($prodOne->price)
                                                <span class="old-price">$ {{ $prodOne->price ?? ''}}</span>
                                                @endif
                                                @if($prodOne->discount_price)
                                                <span class="new-price">$ {{ $prodOne->discount_price ?? ''}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product end -->
                                    @if ( $loop->iteration  % 2 == 0)
                                    </div>
                                    @endif
                                @endforeach
                                @if ( $section_one->count() / 2 != 0)
                                </div>
                                @endif
                            </div>
                        </div>
					</div>
				</div>
			</div>
            <!-- product-area end -->
            
             <!-- single-benner-wrapper start -->
             <div class="single-benner-wrapper pb-90">
                <div class="single-bg-benner">
                    <a href="#"><img src="/storage/banners/{{ $home_page->banner ?? ''}}" alt=""></a>
                </div>
            </div>
            <!-- single-benner-wrapper end -->
             <!-- product-area start -->
			<div class="product-area pb-90">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section-titel">
								<h2>{{ $home_page->sec3_title }}</h2>
							</div>
						</div>
					</div>
					<div class="product-wrapper">
                        <div class="row">
                            <div class="product-style-2 owl-carousel">
                            @foreach($section_three as $key => $prodThree)
                                <div class="col-lg-3">
                                    <!-- single-product start -->
                                    <div class="single-product">
                                        <div class="product-image">
                                            <a href="{{ $prodThree->path() }}">
                                                <img src="/storage/products/{{ $prodThree->img ?? ''}}" alt="{{ $prodThree->img ?? ''}}">
                                            </a>
                                            <?php
                                                $start_date = \Carbon\Carbon::parse($prodThree->created_at);
                                                $now_date = \Carbon\Carbon::now();
                                                $different_days = $start_date->diffInDays($now_date);
                                            ?>
                                            @if ($different_days < 31)
                                            <span class="sale-sticker">New</span>
                                            @endif
                                            <div class="product-action">
                                                <a href="{{ $prodThree->path() }}" >
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="single-product-info">
                                            <h3><a href="{{ $prodThree->path() }}">{{ $prodThree->name }}</a></h3>
                                            <div class="product-price-box">
                                                @if($prodThree->price)
                                                <span class="old-price">$ {{ $prodThree->price ?? ''}}</span>
                                                @endif
                                                @if($prodThree->discount_price)
                                                <span class="new-price">$ {{ $prodThree->discount_price ?? ''}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product end -->
                                </div>
                            @endforeach
                            </div>
                        </div>
					</div>
				</div>
			</div>
            <!-- product-area end -->

             
            <div class="benner-area-two pb-90">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="single-benner">
								<a href="{{ 'en/products/' .  $home_page->sec2_cat_id1}}"><img src="/storage/products/{{ $home_page->sec2_image1 ?? ''}}" alt=""></a>
								<div class="single-benner-info">
                                    @if ($home_page->sec2_title1)
									<h3>{{ $home_page->sec2_title1 ?? ''}}</h3>
                                    @endif
                                    @if ($home_page->sec2_subtitle1)
									<h2>{{ $home_page->sec2_subtitle1 ?? ''}}</h2>
                                    @endif
									<!-- <a href="{{ 'en/products/' .  $home_page->sec2_cat_id1}}" class="btn-one">Shop now!</a> -->
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="single-benner">
								<a href="{{ 'en/products/' .  $home_page->sec2_cat_id1}}"><img src="/storage/products/{{ $home_page->sec2_image2 ?? ''}}" alt=""></a>
								<div class="single-benner-info">
                                    @if ($home_page->sec2_title2)
									<h3>{{ $home_page->sec2_title2 ?? ''}}</h3>
                                    @endif
                                    @if ($home_page->sec2_subtitle1)
									<h2>{{ $home_page->sec2_subtitle1 ?? ''}}</h2>
                                    @endif
									<!-- <a href="{{ 'en/products/' .  $home_page->sec2_cat_id1}}" class="btn-one">Shop now!</a> -->
								</div>
							</div>
						</div>
					</div>
				</div>
				
            </div>
            
        </main> <!-- end of main -->
    </div>
</div>
@endsection