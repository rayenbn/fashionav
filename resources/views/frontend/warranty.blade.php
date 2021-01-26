@extends('layouts.theme')
@section('content')
<div class="page-wrap">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb" class="page-breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Warranty</li>
            </ol>
        </div>
    </nav>
    <hr>
    <div class="page-content">
        <main class="main-content">
            <section class="section-team">
                <div class="container">
                    <h3 class="section-title text-center">{{ $warranty->title ?? ''}}</h3>
                    {!! $warranty->content ?? '' !!}
                  
                </div>
            </section>
            <!-- Call Action -->
            @include('frontend.components.newsletter')
            <!-- End Section -->
        </main> <!-- end of main -->
    </div>
</div>

@endsection