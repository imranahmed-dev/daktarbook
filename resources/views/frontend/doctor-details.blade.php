@extends('frontend.layouts.master')
@section('title',''.$doctor->doctor_name.'')
@section('content')

<style>
    .doctor-details p {
        font-size: 15px;
        margin-bottom: 8px;
        color: #1d292e;
    }

    .doctor-details p strong {
        color: #00b074;
        font-weight: 800;
        margin-right: 10px;
    }

    .doctor-details {
        border: 1px solid #ddd;
        padding: 30px;
        margin-bottom: 15px;
    }
</style>

<section class="doctor-details-section py-10">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="doctor-details">
                    <h4 class="mb-8">Profile of {{$doctor->doctor_name}}</h4>
                    <img style="width: 50%;" src="@if(!empty($doctor->image)) {{asset($doctor->image)}} @else {{asset('defaults/avatar/avatar.png')}} @endif" alt="image" class="img-fluid mb-8">
                    <p style="font-size: 20px;" class="mb-5"><strong class="text-danger">{{$doctor->doctor_name}}</strong></p>
                    <p><strong>Professional Degree : </strong>{{$doctor->degree}}</p>
                    <p><strong>Designation : </strong>{{$doctor->designation}}</p>
                    <p><strong>Specialist : </strong>{{$doctor->specialist->specialist_name}}</p>
                    <p><strong>Hospital Name : </strong>{{$doctor->hospital_name}}</p>
                    <p><strong>BMDC No : </strong>{{$doctor->bmdc_no}}</p>
                    <p><strong>Division : </strong>{{$doctor->division->division_name}}</p>
                    <p><strong>District : </strong>{{$doctor->district->district_name}}</p>
                    <p class="mb-2 mt-8" style="font-size: 17px;"><strong class="text-danger">Chamber Details : </strong></p>
                    <div>
                        {!! $doctor->chamber_details !!}
                    </div>
                    <p class="mb-2 mt-8" style="font-size: 17px;"><strong class="text-danger">Doctor Details : </strong></p>
                    <div>
                        {!! $doctor->description !!}
                    </div>
                    <p class="mb-2 mt-10" style="font-size: 17px;"><strong class="text-danger">For Serial : </strong></p>
                    <p class="mb-2"><strong><i class="fa fa-phone text-info"></i> Mobile Number : </strong>{{$doctor->mobile_one}}</p>

                    @if($doctor->mobile_two)
                    <p class="mb-2"><strong><i class="fa fa-phone text-info"></i> Secondary Mobile Number : </strong>{{$doctor->mobile_two}}</p>
                    @endif

                    <p class="mt-8"><a style="background: green; font-size:15px;" href="tel:{{$doctor->mobile_one}}" class="custom-btn"><i class="fa fa-phone"></i> Call Now</a> @if($doctor->mobile_two)<a style="background: green; font-size:15px;" href="tel:{{$doctor->mobile_two}}" class="custom-btn ml-1"><i class="fa fa-phone"></i> Call Now 2</a>@endif</p>

                    <p class="mt-8"></p>
                    
                    <p class="mt-8"><a style="background: #22b2c3; font-size:15px;" href="{{route('favourite.store',$doctor->id)}}" class="custom-btn"><i class="fa fa-star"></i> Click here for add to favorite</a></p>

                    <p class="mb-1 mt-8" style="font-size: 14px;"><strong class="text-dark">Share Now : </strong></p>
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <div class="addthis_inline_share_toolbox_aaw7"></div>


                </div>
            </div>
            <div class="col-md-4 latest-post-border">
                <div class="latest-blog pl-2">
                    <h5 class="mb-4">পোস্ট সমূহ</h5>
                    @foreach($recentblogs as $blog)
                    <div class="latest-blog-box">
                        <div class="media">
                            <img class="mr-2" src="{{asset($blog->image)}}" alt="image">
                            <div class="media-body">
                                <a href="{{route('blog.details',$blog->id)}}">{{($blog->title)}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <hr>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection