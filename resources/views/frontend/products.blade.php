@extends('layouts.theme')
@section('content')  
<!-- shop-page-wrapper start -->
<div class="shop-page-wrapper">
    <div class="shop-category-area shop-category-bg">
        <!-- shop-category-titel start-->
        <div class="shop-category-titel" style="background: rgba(0, 0, 0, 0) url('storage/images/banners/{{$productpage->banner ?? ''}}') repeat scroll 0 0 / cover;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>{{$productpage->page_title ?? 'Shop'}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop-category-titel end -->
    </div>
    <!-- breadcrumb-area start  -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end  -->
    <!-- shop-page-main-content start -->
    <div class="shop-page-main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!-- archive-border-area start -->
                    <div class="archive-border-area">
                        <!-- shop-item-filter start -->
                        <div class="shop-item-filter">
                            <!-- shop-item-filter-list start -->
                            <ul role="tablist" class="nav shop-item-filter-list">
                                <li role="presentation" class="active"><a href="#grid-view" aria-controls="grid-view" role="tab" data-toggle="tab" class="active show" aria-selected="true"><i class="fa fa-list-ul"></i></a></li>
                                <li role="presentation"><a href="#list-view" aria-controls="list-view" role="tab" data-toggle="tab"><i class="fa fa-bars"></i></a></li>
                            </ul>
                            <!-- shop-item-filter-list end -->
                            <p>There is 1 product.</p>
                            <!-- filter-form start -->
                            <form class="filter-form" action="#">
                                <div class="orderby-wrapper">
                                    <label>Sort By : </label>
                                    <span class="orderby-select">
                                        <select class="orderby nice-select right">
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option value="date">Sort by newness</option>
                                            <!-- <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option> -->
                                        </select>
                                    </span>
                                </div>
                            </form>
                            <!-- filter-form end -->
                        </div>
                        <!-- shop-item-filter start -->
                        <!-- shop-products-wrapper start -->
                        <div class="shop-products-wrapper">
                            <div class="tab-content">
                                <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                    <div class="shop-product-area">
                                        <div class="row">
                                            @foreach($products as $key => $product)
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <!-- single-product start -->
                                                <div class="single-product">
                                                    <div class="product-image">
                                                        <a href="{{  $product->path() }}">
                                                            <img src="/storage/products/thumbnail/{{ $product->img }}" alt="">
                                                        </a>
                                                        <span class="sale-sticker">New</span>
                                                        <div class="product-action">
                                                            <a href="{{  $product->path() }}" class="quick-view">
                                                                <i class="fa fa-search"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="single-product-info">
                                                        <h3><a href="{{ $product->path() }}">{{ $product->name ?? ''}}</a></h3>
                                                   
                                                        <div class="product-price-box">
                                                            @if($product->price)
                                                            <span class="old-price">$ {{ $product->price ?? ''}}</span>
                                                            @endif
                                                            @if($product->discount_price)
                                                            <span class="new-price">$ {{ $product->discount_price ?? ''}}</span>
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
                                <div id="list-view" class="tab-pane fade" role="tabpanel">
                                    <!-- list-view-areat start -->
                                    @foreach($products as $key => $product)
                                    <div class="list-view-area mt-30">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="product-list">
                                                    <div class="product-image">
                                                        <a href="{{ $product->path() }}">
                                                            <img src="/storage/products/thumbnail/{{ $product->img }}" alt="">
                                                        </a>
                                                        <span class="sale-sticker">New</span>
                                                        <div class="product-action">
                                                            <a href="{{ $product->path() }}" class="quick-view" >
                                                                <i class="fa fa-search"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-6">
                                                <div class="single-product-info">
                                                    <h3><a href="single-product.html">{{ $product->name ?? ''}} </a></h3>
                                                    <div class="rating-box">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price-box">
                                                        @if($product->price)
                                                        <span class="old-price">$ {{ $product->price ?? ''}}</span>
                                                        @endif
                                                        @if($product->discount_price)
                                                        <span class="new-price">$ {{ $product->discount_price ?? ''}}</span>
                                                        @endif
                                                    </div>
                                                    {!! $product->description ?? ''!!}
                                                    <button class="button btn-cart">Add to Cart</button>
                                                </div>
                                            </div>    
                                        </div>
                                        </div>
                                    <!-- list-view-area end -->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- shop-products-wrapper end -->
                        <!-- pagination-area start -->
                        <div class="pagination-area">
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <p>Showing 10-13 of 13 item(s) </p>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                    {{ $products->links('vendor.pagination.theme_paginator') }}
                                        <!-- <ul class="pagination-box">
                                            <li><a class="Previous"  href="#"><i class="zmdi zmdi-chevron-left"></i> Previous</a>
                                            </li>
                                            <li class="active"><a  href="#">1</a></li>
                                            <li><a  href="#">2</a></li>
                                            <li><a  href="#">3</a></li>
                                            <li>
                                                <a class="Next" href="#"> Next <i class="zmdi zmdi-chevron-right"></i></a>
                                            </li>
                                        </ul> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- pagination-area end -->
                    </div>
                    <!-- archive-border-area end -->
                </div>
            </div>
        </div>
    </div>
    <!-- shop-page-main-content end -->
</div>
<!-- shop-page-wrapper end -->

@endsection