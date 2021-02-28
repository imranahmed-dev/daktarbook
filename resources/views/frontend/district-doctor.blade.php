@extends('frontend.layouts.master')
@section('title',''.$district_name.' জেলার সকল ডাক্তার')
@section('content')


<section class="teachers-list pt-15 pb-15 aos-init aos-animate" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-title">
                    <h2>{{$district_name}} জেলার সকল ডাক্তার</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container teachers-profile-box py-4" data-aos="fade-up">
        <div class="row">
           @if($doctors->count() != null)
           @foreach($doctors as $doctor)
            <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="teachers-profile">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="@if(!empty($doctor->image)) {{asset($doctor->image)}} @else {{asset('defaults/avatar/avatar.png')}} @endif" alt="" class="teachers-profile-img img-fluid">
                        </div>
                        <div class="col-md-8 pl-6 pl-md-0">
                            <div class="teachers-profile-text">
                                <a style="font-size: 15px;" class="mb-2" href="{{route('doctor.details',$doctor->id)}}"><strong>{{$doctor->doctor_name}}</strong></a>
                                <p style="font-size: 13px;"><strong>Degree:</strong> {!! Str::limit($doctor->degree, 30) !!}</p>
                                <p class="mb-4" style="font-size: 13px;"><strong>Specialist:</strong> {{$doctor->specialist->specialist_name}}</p>
                                <p class="mb-4" style="font-size: 13px; font-weight:bold;"><i class="fa fa-map-marker"></i> {{$doctor->district->district_name}}, {{$doctor->division->division_name}}</p>

                                <p class="mt-4"> <a href="{{route('doctor.details',$doctor->id)}}" class="custom-btn">Read More <i class="fa fa-angle-double-right"></i></a></p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            @endforeach
            @else
            <div class="col text-center">
            <span class="text-danger">দুঃখিত কোনো ডাক্তার খুঁজে পাওয়া যায়নি !</span>
            </div>
            @endif
        </div>

    </div>
</section>

@endsection