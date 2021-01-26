@extends('layouts.theme')
@section('content')

 <!-- contact-page-wrapper start -->
 <div class="contact-page-wrapper">
    <!-- breadcrumb-area start  -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end  -->
    
    <!-- contact-content start -->
    <div class="contact-content mt-100 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-sm-12">
                    <div class="contact-form">
                        <div class="contact-title">
                            <h3>TELL US YOUR PROJECT</h3>
                        </div>
                        @if(count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $error)
                            <li style="color: red;">-> {{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                        @if($message = Session::get('success'))
                        <h1 style="font-size: 22px;color:seagreen;">*** {{ $message }} ***</h1>
                        @endif
                        <!-- <form id="contact-form" action="email.php" method="POST"> -->
                        <form  action="{{ url('contact-us/send') }}" method="post">
                            {{ csrf_field() }}
                            <div class="contact-page-form">
                                <div class="contact-input">
                                    <div class="contact-inner">
                                        <input name="fname" type="text" placeholder="First Name *" id="fname">
                                    </div>
                                    <div class="contact-inner">
                                        <input name="lname" type="text" placeholder="Last Name *" id="lname">
                                    </div>
                                    <div class="contact-inner">
                                        <input type="text" placeholder="Email *" id="email" name="email">
                                    </div>
                                    <div class="contact-inner">
                                        <input name="phone" type="text" placeholder="+12345678932 *" id="phone">
                                    </div>
                                    <div class="contact-inner contact-message">
                                        <textarea name="message" type="text" placeholder="Message *"></textarea>
                                    </div>
                                </div>
                                <div class="contact-submit-btn">
                                    <button class="submit-btn" type="submit">Send Email</button>
                                    <p class="form-messege"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12">
                    <div class="contact-infor">
                        <div class="contact-title">
                            <h3>{{ $contactus->title ?? ''}}</h3>
                        </div>
                        <div class="contact-dec">
                        {{ $contactus->description ?? ''}}
                        </div>
                        <div class="contact-address">
                            <ul>
                                <li><i class="fa fa-fax"> </i> Address : {{ $contactus->address ?? ''}}</li>
                                <li><i class="fa fa-envelope-o">&nbsp;</i> {{ $contactus->email ?? ''}}</li>
                                <li><i class="fa fa-mobile">&nbsp;</i> {{ $contactus->phone ?? ''}}</li>
                                @if ( isset($contactus->mobile) )
                                <li><i class="fa fa-phone">&nbsp;</i> {{ $contactus->mobile }}</li>
                                @endif
                            </ul>
                        </div>
                        <div class="work-hours">
                            <h3>{!! $contactus->working_hours ?? '' !!}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop-page-main-content end -->
</div>
@endsection