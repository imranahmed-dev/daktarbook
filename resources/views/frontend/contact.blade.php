@extends('frontend.layouts.master')
@section('title','Contact Us')
@section('content')
<section class="contact-us pt-10 pb-10">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-title mb-4">
                    <h2>যে কোন প্রয়োজনে যোগাযোগ করুন</h2>
                </div>
            </div>
        </div>
        <div class="contact-us-box bg-white p-sm-5">
            <style>
                .contact-us-form form .form-control {
                    padding: 1.3rem .75rem;
                    border-radius: 2px;
                    background: #f1f1f1;
                    border: none;
                }

                .contact-us .section-title2 h2::after {
                    width: 100%;
                }

                .contact-us-details {

                    padding: 15px;
                }

                .ad-icons {
                    height: 35px;
                    width: 35px;
                    line-height: 35px;
                    font-size: 15px;
                    text-align: center;
                    border-radius: 50%;
                    color: #fff;
                }

                .office-address .ad-hotline {

                    background: #42b6ff;
                }

                .office-address .ad-phone {
                    background: #0a0;
                }

                .office-address .ad-email {
                    background: #f95732;
                }

                .office-address {
                    font-size: 15px;
                }
                .office-address p{
                    margin-bottom: 5px;
                }
            </style>
            <div class="row">
                <!-- <div class="col-md-6">
                    <div class="contact-us-form">
                        <div class="contact-form">
                            <h5 class="mb-3 font-weight-bold">GET IN TOUCH</h5>
                            <form id="contactUs" method="post">


                                <input class="form-control mb-3" type="text" name="name" placeholder="Name">

                                <input class="form-control mb-3" type="text" name="phone" placeholder="Phone">

                                <input class="form-control mb-3" type="text" name="email" placeholder="Email">

                                <input class="form-control mb-3" type="text" name="subject" placeholder="Subject">

                                <textarea class="form-control mb-3" name="message" placeholder="Your message" rows="5"></textarea>

                                <button class=" btn btn-primary mt-2" style="font-size: 14px;"><i class="fa fa-paper-plane mr-1"></i>SEND MESSAGE</button>
                            </form>
                        </div>
                    </div>
                </div> -->
                <div class="col">
                    <div class="contact-us-details mt-4 mt-md-0">
                        <div class="office-address mb-5 text-center">

                            <p><i class="fa fa-phone text-custom ad-icons ad-hotline mr-1"></i> Phone - {{$setting->mobile_one}}</p>
                            @if($setting->mobile_two)
                            <p><i class="fa fa-phone text-custom ad-icons ad-phone mr-1"></i> Phone - {$setting->mobile_one}}</p>
                            @endif

                            <p><i class="fa fa-envelope text-custom ad-icons ad-email mr-1"></i> Email - {{$setting->email_one}}</p>
                            @if($setting->email_two)
                            <p><i class="fa fa-envelope text-custom ad-icons ad-email mr-1"></i> Email - {{$setting->email_one}}</p>
                            @endif
                            <p>Follow Us:</p>
                            <style>
                                .contact-ss a {
                                    background: #00b074;
                                    height: 30px;
                                    width: 30px;
                                    color: #fff;
                                    text-align: center;
                                    line-height: 30px;
                                    border-radius: 5px;
                                }
                            </style>

                            <p class="contact-ss">
                                @if($setting->facebook_link)
                                <a href="{{$setting->facebook_link}}" style="margin: 0 6px;" target="_blank"><i class="fa fa-facebook"></i></a>
                                @endif
                                @if($setting->twitter_link)
                                <a href="{{$setting->twitter_link}}" style="margin: 0 6px;" target="_blank"><i class="fa fa-twitter"></i></a>
                                @endif
                                @if($setting->instagram_link)
                                <a href="{{$setting->instagram_link}}" style="margin: 0 6px;" target="_blank"><i class="fa fa-instagram"></i></a>
                                @endif
                                @if($setting->linkedin_link)
                                <a href="{{$setting->linkedin_link}}" style="margin: 0 6px;" target="_blank"><i class="fa fa-linkedin"></i></a>
                                @endif
                                @if($setting->youtube_link)
                                <a href="{{$setting->youtube_link}}" style="margin: 0 6px;" target="_blank"><i class="fa fa-youtube"></i></a>
                                @endif
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection