@extends('layouts.theme')
@section('content')
<div class="page-wrap">
    @if (isset($aboutus->banner))
    <section class="section-subscribe subscribe-wrap-promo" style="background-image:url('/storage/images/banners/{{ $aboutus->banner }}')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="subscribe-form d-flex flex-column justify-content-center align-items-center">
                        <div class="section-title section-title-w-text text-center">
                            <h2 class="h3 section-title__heading">{{ $aboutus->banner_title }}</h2>
                            <div class="section-title__text">{!! $aboutus->banner_desc !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb" class="page-breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <main class="main-content">
            <section class="section-about">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <h3 class="section-title mb-40">{{ $aboutus->sec_one_title ?? ''}}</h3>

                            <p>{!! $aboutus->sec_one_text ?? '' !!}</p>
                        </div>
                        <div class="col-lg-7">
                            @if(isset($aboutus->sec_one_img))
                            <img alt="" src="/storage/images/banners/{{ $aboutus->sec_one_img }}">
                            @endif
                        </div>
                    </div>
                </div>
            </section>

            <div class="aboutus">
                <h3 class="section-title text-center">{{ $aboutus->sec_two_title ?? ''}}</h3>
                <div class="aboutus02" id="aboutus02">
                    <ul>
                        <li class="aboutus02_1 aboutus02_bg"><span>{{ $aboutus->sec_two_t1 ?? ''}}</span>{!! $aboutus->sec_two_desc1 ?? '' !!}</li>
                        <li class="aboutus02_2"><span>{{ $aboutus->sec_two_t2 ?? ''}}</span>{!! $aboutus->sec_two_desc2 ?? '' !!}</li>
                        <li class="aboutus02_3"><span>{{ $aboutus->sec_two_t3 ?? ''}}</span>{!! $aboutus->sec_two_desc3 ?? '' !!}</li>
                        <li class="aboutus02_4 aboutus02_bg"><span>{{ $aboutus->sec_two_t4 ?? ''}}</span>{!! $aboutus->sec_two_desc4 ?? '' !!}</li>
                        <li class="aboutus02_5"><span>{{ $aboutus->sec_two_t5 ?? ''}}</span>{!! $aboutus->sec_two_desc5 ?? '' !!}</li>
                        <li class="aboutus02_6"><span>{{ $aboutus->sec_two_t6 ?? ''}}</span>{!! $aboutus->sec_two_desc6 ?? '' !!}</li>
                        <li class="aboutus02_7 aboutus02_bg"><span>{{ $aboutus->sec_two_t7 ?? ''}}</span>{!! $aboutus->sec_two_desc7 ?? ''!!}</li>
                    </ul>
                </div>
            </div>

            <section class="sec2-mb">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-sm-12">
                            <div class="aboutus-content-dark">
                                <span>{{ $aboutus->sec_two_t1 ?? ''}}</span>{!! $aboutus->sec_two_desc1 ?? '' !!}
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="aboutus-content-grey">
                                <span>{{ $aboutus->sec_two_t2 ?? ''}}</span>{!! $aboutus->sec_two_desc2 ?? '' !!}
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="aboutus-content-dark">
                                <span>{{ $aboutus->sec_two_t3 ?? ''}}</span>{!! $aboutus->sec_two_desc3 ?? '' !!}
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="aboutus-content-grey">
                                <span>{{ $aboutus->sec_two_t4 ?? ''}}</span>{!! $aboutus->sec_two_desc4 ?? '' !!}
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="aboutus-content-dark">
                                <span>{{ $aboutus->sec_two_t5 ?? ''}}</span>{!! $aboutus->sec_two_desc5 ?? '' !!}
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="aboutus-content-grey">
                                <span>{{ $aboutus->sec_two_t6 ?? ''}}</span>{!! $aboutus->sec_two_desc6 ?? '' !!}
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="aboutus-content-dark">
                                <span>{{ $aboutus->sec_two_t7 ?? ''}}</span>{!! $aboutus->sec_two_desc7 ?? '' !!}
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <br>
            <br>
            @if ($galleries)
            <section class="section-team">
                <div class="container">
                    <h3 class="section-title text-center">Our Gallery</h3>
                    <!-- Gallery -Photo -->
                    <div class="gallery gallery-lightbox gallery-photos gallery-filled hover-zoom">

                        <ul class="photos-list col-x4">
                            @foreach($galleries as $key => $gallery)
                            <li>
                                <a href="../storage/gallery/{{ $gallery->picture }}">
                                    <div class="photo">
                                        <img src="../storage/gallery/thumbnail/{{ $gallery->picture }}" alt="Photo Title">
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Gallery #end -->
                </div>
            </section>
            @endif


            <!-- Call Action -->
            @include('frontend.components.newsletter')
            <!-- End Section -->
        </main> <!-- end of main -->
    </div>
</div>

@endsection