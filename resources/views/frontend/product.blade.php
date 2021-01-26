<?php

use App\Http\Controllers\Controller;

$social_media = Controller::footer();

?>
@extends('layouts.theme')
@section('content')
<!-- single-product-page-wrapper start -->
<div class="single-product-page-wrapper">
    <!-- breadcrumb-area start  -->
    <div class="breadcrumb-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="breadcrumb-list">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active">{{ $our_product->name}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- breadcrumb-area end  -->
    <!-- single-product-content start -->
    <div class="single-product-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-xs-12">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="single-product-tab">
                                <div class="zoomWrapper">
                                    <div id="img-1" class="zoomWrapper single-zoom">
                                        <a href="#">
                                            <img id="zoom1" src="/storage/products/thumbnail/{{ $our_product->img }}" data-zoom-image="../storage/products/thumbnail/{{ $our_product->img }}" alt="big-1">
                                        </a>
                                    </div>
                                    <div class="single-zoom-thumb">
                                        <ul class="s-tab-zoom single-product-active owl-carousel" id="gallery_01">
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="../storage/products/thumbnail/{{ $our_product->img }}" data-zoom-image="../storage/products/thumbnail/{{ $our_product->img }}"><img src="/storage/products/thumbnail/{{ $our_product->img }}" alt="zo-th-1" /></a>
                                        </li>
                                        @foreach( $images as $image)
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="../storage/products/thumbnail/{{ $image->productImages }}" data-zoom-image="../storage/products/thumbnail/{{ $image->productImages }}"><img src="/storage/products/thumbnail/{{ $image->productImages }}" alt="zo-th-1" /></a>
                                        </li>
                                        @endforeach
                                        
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="single-product-info-area">
                                <h2 class="product-name">{{ $our_product->name }}</h2>
                                <div class="ratings">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product-desc">
                                {!! substr($our_product->description ?? '', 0, 190) !!}
                                </div>
                                <div class="product-price-box">
                                    @if($our_product->discount_price)
                                    <span class="old-price">$ {{ $our_product->price ?? ''}}</span>
                                    <span class="new-price">$ {{ $our_product->discount_price ?? ''}}</span>
                                    @elseif($our_product->price)
                                    <span class="new-price">$ {{ $our_product->price ?? ''}}</span>
                                    @endif
                                </div>
                                <!-- <div class="quick-add-to-cart">
                                    <form class="modal-cart">
                                        <div class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input type="text" value="0" class="cart-plus-minus-box">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </div>
                                        <button type="submit" class="add-to-cart">Add to cart</button>
                                    </form>
                                </div> -->
                                <div class="product-meta">
                                    <span class="posted-meta-inner">
                                    Availability:
                                        @if (isset($our_product))
                                        @if ($our_product->availability == 0)
                                        Available
                                        @endif

                                        @if ($our_product->availability == 1)
                                        Not Available
                                        @endif

                                        @if ($our_product->availability == 2)
                                        Pre Order
                                        @endif

                                        @endif
                                    </span>
                                </div>

                                <div class="modal-color">
                                    <h4>Color</h4>
                                    <div class="color-list">
                                        <ul>
                                        @foreach ( $our_product->colors as $color )
                                            <li><a href="#" style="background-color: {{ $color->color_code }}"></a></li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-meta">
                                    <span class="posted-meta-inner">
                                        Categories:
                                        @foreach ( $our_product->categories as $category )
                                        <a href="{{ $category->path() }}">{{ $category->category_name }}</a>
                                        @endforeach
                                    </span>
                                </div>
                                <div class="single-product-sharing">
                                    <ul>
                                        @if (isset($social_media->fb))
                                        <li><a href="{{ $social_media->fb }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        @endif
                                        @if (isset($social_media->ig))
                                        <li><a href="{{ $social_media->ig }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                        @endif
                                        @if (isset($social_media->twitter))
                                        <li><a href="{{ $social_media->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="discription-tab">
                                <!--discription-tab-menu start-->
                                <div class="discription-tab-menu">
                                    <ul class="nav" role="tablist">
                                        <li class="active"><a data-toggle="tab" href="#description">Description</a></li>
                                    </ul>
                                </div>
                                <!--discription-tab-menu end-->
                                <!--discription-tab-content start-->
                                <div class="discription-tab-content">
                                    <div class="tab-content">
                                        <div id="description" class="tab-pane fade in active">
                                            <div class="description-content">
                                            {!! $our_product->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--discription-tab-content end-->
                            </div>
                        </div>
                    </div>
                    @if ( !is_null($previous_record) || !is_null($next_record))
                    <div class="related-products-area mt-40">
                        <!-- product-area start -->
                        <div class="product-area pb-30">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-titel">
                                        <h2>You might also like</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrapper">
                                <div class="row">
                                    <div class="product-active owl-carousel">
                                        @foreach ( $previous_record as $prev_product)
                                        <div class="col-lg-3">
                                            <!-- single-product start -->
                                            <div class="single-product">
                                                <div class="product-image">
                                                    <a href="{{ $prev_product->path() }}">
                                                        <img src="/storage/products/thumbnail/{{ $prev_product->img }}" alt="{{ $prev_product->title ?? '' }}">
                                                    </a>
                                                    <span class="sale-sticker">New</span>
                                                    <div class="product-action">
                                                        <a href="{{ $prev_product->path() }}">
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="single-product-info">
                                                    <h3><a href="{{ $prev_product->path() }}">{{ $prev_product->name ?? ''}}</a></h3>
                                                    <div class="product-price-box">
                                                        @if($prev_product->discount_price)
                                                        <span class="old-price">$ {{ $prev_product->price ?? ''}}</span>
                                                        <span class="new-price">$ {{ $prev_product->discount_price ?? ''}}</span>
                                                        @elseif ($prev_product->price)
                                                        <span class="new-price">$ {{ $prev_product->price ?? ''}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product end -->
                                        </div>
                                        @endforeach
                                        @foreach ( $next_record as $next_product)
                                        <div class="col-lg-3">
                                            <!-- single-product start -->
                                            <div class="single-product">
                                                <div class="product-image">
                                                    <a href="{{ route('our-products.show',  [app()->getLocale(),$next_product->id]) }}">
                                                        <img src="/storage/products/thumbnail/{{ $next_product->img }}" alt="{{ $next_product->title ?? '' }}">
                                                    </a>
                                                    <?php
                                                        $start_date = \Carbon\Carbon::parse($next_product->created_at);
                                                        $now_date = \Carbon\Carbon::now();
                                                        $different_days = $start_date->diffInDays($now_date);
                                                    ?>
                                                    @if ($different_days < 31)
                                                    <span class="sale-sticker">New</span>
                                                    @endif
                                                    <div class="product-action">
                                                        <a href="{{ $next_product->path() }}" class="quick-view" >
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="single-product-info">
                                                    <h3><a href="{{ $next_product->path() }}">{{ $next_product->name ?? '' }}</a></h3>
                                                    <div class="product-price-box">
                                                        @if($next_product->discount_price)
                                                        <span class="old-price">$ {{ $next_product->price ?? ''}}</span>
                                                        <span class="new-price">$ {{ $next_product->discount_price ?? ''}}</span>
                                                        @elseif ($next_product->price)
                                                        <span class="new-price">$ {{ $next_product->price ?? ''}}</span>
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
                        <!-- product-area end -->
                    </div>
                    @endif
                </div>
                <div class="col-lg-3 col-md-4 col-xs-12">
                    <!-- one-sale-area start -->
                    <div class="one-sale-area">
                        <div class="secton-titel-three">
                            <h3> One sale</h3>
                        </div>
                        <div class="category-item-active owl-carousel">
                            <div class="category-item-inner">
                                <!-- category-item start -->
                                @foreach ($on_sale as $prod)
                                <div class="category-item">
                                    <div class="product-img">
                                        <a href="{{ $prod->path() }}"><img src="/storage/products/thumbnail/{{ $prod->img }}" style="max-width: 70px" alt=""></a>
                                    </div>
                                    <div class="single-product-info">
                                        <h3><a href="{{ $prod->path() }}">{{ $prod->name ?? ''}}</a></h3>
                                        <div class="product-price-box">
                                            @if($prod->price)
                                            <span class="old-price">$ {{ $prod->price ?? ''}}</span>
                                            @endif
                                            @if($prod->discount_price)
                                            <span class="new-price">$ {{ $prod->discount_price ?? ''}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- category-item end -->
                            </div>
                        </div>
                        <!-- one-sale-area end -->
                        <div class="single-categories-1 tag-area mt-30">
                            <div class="secton-titel-three">
                                <h3>Tags</h3>
                            </div>
                            <div class="tagcloud mt-30">
                                @foreach (array_slice($categories->toArray(), 0, 15) as $category)
                                <a href="{{ '/en/products/' . $category['id'] .'-'. $category['category_name'] }}">{{ $category['category_name']}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single-product-content end -->
    </div>
</div>

@include('frontend.components.Enquiry_modal')
@endsection