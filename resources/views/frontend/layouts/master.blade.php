<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Daktarbook in Bangladesh </title>
    <link rel="shortcut icon" href="{{ asset('frontend/favicon/favicon.jpg') }}" type="image/x-icon">

    <!-- uikit -->
    <!-- <link rel="stylesheet" href="{{ asset('defaults/uikit/uikit.min.css') }}"> -->
    <!-- Bootstrap , fonts & icons  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/icon-font/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/typography-font/typo.css') }}">
    <link href="{{asset('defaults')}}/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Plugin'stylesheets  -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/aos/aos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/fancybox/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/nice-select/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/ui-range-slider/jquery-ui.css') }}">


    <!-- Vendor stylesheets  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/custom/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/custom/custom-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/custom/custom-responsive.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('defaults/dataTable')}}//datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('defaults/dataTable')}}//datatables-responsive/css/responsive.bootstrap4.min.css">


    <!-- Toastr -->
    <link href="{{asset('defaults/toastr/toastr.min.css')}}" rel="stylesheet" />

    <!-- Custom stylesheet -->
</head>

<body>
    <div class="site-wrapper overflow-hidden ">
        <!-- Header Area -->
        <header class="site-header site-header--menu-right dynamic-sticky-bg py-5 py-lg-0" uk-sticky="top: 100; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up">
            <div class="container">
                <nav class="navbar site-navbar offcanvas-active navbar-expand-lg  px-0 py-0">
                    <!-- Brand Logo-->
                    <div class="brand-logo">
                        <a href="{{url('/')}}" class="google-drive-opener">
                            <!-- light version logo (logo must be black)-->
                            <img src="{{asset($setting->logo)}}" alt="" class="light-version-logo default-logo logologo">
                        </a>
                    </div>

                    <div class="advance-search-m">
                        <form action="{{route('advance.search')}}" method="get">
                            <div class="input-group">
                                <input name="keyword" type="text" placeholder="অনুসন্ধান করুন">
                                <div class="input-group-prepend">
                                    <button type="submit" class=""><i class="fa fa-search"></i></button>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="collapse navbar-collapse" id="mobile-menu">
                        <div class="navbar-nav-wrapper">
                            <div class="mobile-logo" style="position:absolute; top:12px; left:12px;">
                                <img src="{{asset($setting->logo)}}" alt="" class="light-version-logo default-logo logologo">
                            </div>
                            <ul class="navbar-nav main-menu">
                                <li class="nav-item">
                                    <a class="nav-link google-drive-opener" href="{{url('/')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link google-drive-opener" href="{{route('about.us')}}">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link google-drive-opener" href="{{route('contact.us')}}">Contact</a>
                                </li>
                                <div class="mob-sign">
                                    <li class="nav-item">
                                        <a class="nav-link google-drive-opener" href="{{route('user.login')}}">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="modal" data-target="#register" class="nav-link " href="#">Sign Up</a>
                                    </li>
                                </div>
                            </ul>
                        </div>
                        <button class="d-block d-lg-none offcanvas-btn-close focus-reset" type="button" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="true" aria-label="Toggle navigation">
                            <i class="gr-cross-icon"></i>
                        </button>
                    </div>
                    

                    <div class="header-btns header-btn-devider ml-auto pr-2 ml-lg-6 d-xs-flex">
                    
                        
                        @if(Auth::check() && Auth::user()->role != 1)

                        @php

                        $dd = App\Models\Doctor::where('doctor_id',Auth::user()->id)->first();

                        @endphp

                        <li style="list-style: none;" class="dropdown"><span data-toggle="dropdown">
                                @if(Auth::user()->usertype == 2)
                                <img class="dd-img ml-8" src="@if(!empty(Auth::user()->image)) {{asset(Auth::user()->image)}} @else {{asset('defaults/avatar/avatar.png')}} @endif" alt="">
                                @endif

                                @if(Auth::user()->usertype == 3)
                                <img class="dd-img ml-8" src="@if(!empty($dd->image)) {{asset($dd->image)}} @else {{asset('defaults/avatar/avatar.png')}} @endif" alt="">
                                @endif

                                <span style="cursor: pointer; font-size: 15px" class="auth-user-name">
                                    @if(Auth::user()->usertype == 2)
                                    {{Auth::user()->name}}
                                    @endif

                                    @if(Auth::user()->usertype == 3)
                                    {{$dd->doctor_name}}
                                    @endif

                                </span>

                                <i class="fa fa-angle-down"></i> </span>
                            <div class="dropdown-menu dropdown-menu-right mt-3 profile-drop pt-3 pb-2">
                                <a href="{{route('user.profile')}}"><i class="fa fa-user-circle"></i> Profile</a>
                                <a href="{{route('user.edit.profile')}}"><i class="fa fa-edit"></i> Edit Profile</a>

                                @if(Auth::user()->usertype == 2)
                                <a href="{{route('user.favourite.doctor')}}"><i class="fa fa-star"></i> Favourite Doctor</a>
                                @endif

                                <a href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @else
                        <span class="desk-sign">
                            <a class="btn btn-transparent text-uppercase font-size-3 heading-default-color focus-reset google-drive-opener" href="{{route('user.login')}}">
                                Log in
                            </a>
                            <a data-toggle="modal" data-target="#register" class="btn btn-primary text-uppercase font-size-3 google-drive-opener" href="javascript:;">
                                Sign up
                            </a>
                        </span>


                        @endif
                    </div>
                    <i id="search-mob" style="cursor: pointer;" class="fa fa-search"></i>
                    <!-- Mobile Menu Hamburger-->
                    <button class="navbar-toggler btn-close-off-canvas  hamburger-icon border-0" type="button" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <!-- <i class="icon icon-simple-remove icon-close"></i> -->
                        <span class="hamburger hamburger--squeeze js-hamburger">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </span>
                    </button>
                    <!--/.Mobile Menu Hamburger Ends-->
                    <div class="advance-search-m advance-search-m-res">
                        <form action="{{route('advance.search')}}" method="get">
                            <div class="input-group">
                                <input name="keyword" type="text" placeholder="অনুসন্ধান করুন">
                                <div class="input-group-prepend">
                                    <button type="submit" class=""><i class="fa fa-search"></i></button>
                                </div>

                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </header>
        <!-- navbar- -->

        @yield('content')


        <!-- cta section -->
        <footer class="footer bg-ebony-clay dark-mode-texts">

            <div class="container  pt-12 pb-4">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-lg-0 mb-9">
                        <!-- footer logo start -->
                        <img src="{{asset($setting->logo)}}" alt="" class="footer-logo mb-7">
                        <!-- footer logo End -->
                        <p class="text-light mr-5" style="font-size: 15px;">{{$setting->short_about}}</p>
                        <p class="text-light mb-1" style="font-size: 14px;">Design & Developed by:</p>
                        <p style="font-size: 13px;" class="text-light"> Full Stack Web Developer <a href="https://facebook.com/imran.emonn" target="_blank">Imran Ahmed</a></p>

                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-3 col-xs-6">
                                <div class="footer-widget widget2 mb-md-0 mb-13">
                                    <!-- footer widget title start -->
                                    <p class="widget-title font-size-4 mb-md-8 mb-7 text-light">User Reading</p>
                                    <!-- footer widget title end -->
                                    <!-- widget social menu start -->
                                    <ul class="widget-links pl-0 list-unstyled list-hover-primary">
                                        <li class="mb-4"><a class="heading-default-color font-size-3 font-weight-normal" href="{{route('terms.condition')}}">Terms & Condition</a></li>
                                        <li class="mb-4"><a class="heading-default-color font-size-3 font-weight-normal" href="{{route('privacy.policy')}}">Privacy Policy</a></li>
                                    </ul>
                                    <!-- widget social menu end -->
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-3 col-xs-6">
                                <div class="footer-widget widget3 mb-sm-0 mb-13">
                                    <!-- footer widget title start -->
                                    <p class="widget-title font-size-4 text-light mb-md-8 mb-7">Join Now</p>
                                    <!-- footer widget title end -->
                                    <!-- widget social menu start -->
                                    <ul class="widget-links pl-0 list-unstyled list-hover-primary">
                                        <li class="mb-4"><a class="heading-default-color font-size-3 font-weight-normal" href="{{route('user.login')}}">Login</a></li>
                                        <li class="mb-4"><a data-toggle="modal" data-target="#register" class="heading-default-color font-size-3 font-weight-normal" href="javascript:;">Signup</a></li>

                                    </ul>
                                    <!-- widget social menu end -->
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-3 col-xs-6">
                                <div class="footer-widget widget4 mb-sm-0 mb-13">
                                    <!-- footer widget title start -->
                                    <p class="widget-title font-size-4 text-light mb-md-8 mb-7">Contact Us</p>
                                    <!-- footer widget title end -->
                                    <!-- widget social menu start -->
                                    <ul class="widget-links pl-0 list-unstyled list-hover-primary">

                                        <li class="mb-4"><a class="heading-default-color font-size-3 font-weight-normal" href="javascript:;"><i class="fa fa-envelope"></i> Email : {{$setting->email_one}}</a></li>
                                        @if($setting->email_two)
                                        <li class="mb-4"><a class="heading-default-color font-size-3 font-weight-normal" href="javascript:;"><i class="fa fa-envelope"></i> Email : {{$setting->email_two}}</a></li>
                                        @endif

                                        <li class="mb-4"><a class="heading-default-color font-size-3 font-weight-normal" href="javascript:;"><i class="fa fa-phone"></i> Phone : {{$setting->mobile_one}}</a></li>
                                        @if($setting->mobile_two)
                                        <li class="mb-4"><a class="heading-default-color font-size-3 font-weight-normal" href="javascript:;"><i class="fa fa-phone"></i> Phone 2 : {{$setting->mobile_one}}</a></li>
                                        @endif

                                        <li class="text-light font-size-3 ">Follow Us:</li>
                                        <li>
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
                                        </li>
                                    </ul>
                                    <!-- widget social menu end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center pt-4 pb-4 text-light" style="font-size: 13px;color:#ddd;">
                        <span>Copyright © 2021 Daktarbook. All Rights Reserved</span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer area function end -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header p-5 bg-primary">
                    <h5 id="exampleModalLabel" style="font-size: 16px;" class="mb-0  text-light">Choose Option</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class=" text-light">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="p-10">
                        <a href="{{route('doctor.register')}}" class="btn btn-primary btn-block btn-sm"><i class="fa fa-medkit mr-3"></i> As a Doctor</a>
                        <a href="{{route('user.register')}}" class="btn btn-info btn-block btn-sm"><i class="fa fa-user mr-3"></i> As a User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f5cf1b44ba04a55"></script>


    <!-- Vendor Scripts -->
    <script src="{{ asset('frontend/js/vendor.min.js') }}"></script>
    <!-- Plugin's Scripts -->
    <script src="{{ asset('frontend/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/aos/aos.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/ui-range-slider/jquery-ui.js') }}"></script>
    <!-- Activation Script -->
    <!-- <script src="js/drag-n-drop.js"></script> -->
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('defaults/uikit/uikit.min.js') }}"></script>
    <script src="{{ asset('defaults/uikit/uikit-icons.js') }}"></script>


    <!-- DataTables -->
    <script src="{{asset('defaults/dataTable')}}//datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('defaults/dataTable')}}//datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('defaults/dataTable')}}//datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('defaults/dataTable')}}//datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $('#dataTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>

    @yield('customjs')
    <!-- Sweetalert -->
    <script src="{{asset('defaults/sweetalert/sweetalert2@9.js')}}"></script>
    <script src="{{asset('defaults/sweetalert/sweetalertjs.js')}}"></script>
    <!-- No image -->
    <script src="{{asset('defaults/noimage/no-image.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('defaults/toastr/toastr.min.js')}}"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{Session::get('alert-type','info')}}"

        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>

    <script>
        $(document).ready(function() {
            // Add minus icon for collapse element which is open by default
            $(".collapse.show").each(function() {
                $(this).prev(".cat-item").find(".fa").addClass("fa-minus").removeClass("fa-plus");
            });

            // Toggle plus minus icon on show hide of collapse element
            $(".collapse").on('show.bs.collapse', function() {
                $(this).prev(".cat-item").find(".fa").removeClass("fa-plus").addClass("fa-minus");
            }).on('hide.bs.collapse', function() {
                $(this).prev(".cat-item").find(".fa").removeClass("fa-minus").addClass("fa-plus");
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#search-mob').on('click', function() {
                $('.advance-search-m-res').slideToggle();
            });
        });
    </script>
</body>


</html>