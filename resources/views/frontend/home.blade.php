@extends('frontend.layouts.master')
@section('title','Daktarbook')
@section('content')
<!-- Hero Area -->
<div class="bg-gradient-1 pt-14 pt-md-32 pt-lg-33 pt-xl-27 position-relative  overflow-hidden">
    <!-- .Hero pattern -->
    <div class="pos-abs-tr w-50 z-index-n2">
        <img src="{{ asset('frontend/image/patterns/hero-pattern.png')}}" alt="" class="gr-opacity-1">
    </div>
    <!-- ./Hero pattern -->
    <div class="container">
        <div class="row position-relative align-items-center">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 pt-lg-13 pb-lg-33 pb-xl-34 pb-md-33 pb-10" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
                <h1 class="font-size-9 mb-8 pr-md-30 pr-lg-0 ddddd">দেশের যেকোনো ডাক্তার খুঁজুন</h1>
                <div class="">
                    <!-- .search-form -->
                    <form action="{{route('search.doctor')}}" method="get" class="search-form shadow-6">
                        <div class="filter-search-form-1 bg-white rounded-sm shadow-4">
                            <div class="filter-inputs">
                                <!-- .select-Country starts -->
                                <div class="form-group position-relative">
                                    <select name="division_id" id="division_id" class="nice-select pl-13 h-100 arrow-3 font-size-4">
                                        <option value="">বিভাগ</option>
                                        @foreach($divisions as $division)
                                        <option value="{{$division->id}}">{{$division->division_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="h-100 w-px-50 pos-abs-tl d-flex align-items-center justify-content-center font-size-6"><i class="icon icon-pin-3 text-primary font-weight-bold"></i></span>
                                </div>
                                <!-- ./select-city ends -->
                                <!-- .select-city starts -->
                                <div class="form-group position-relative">
                                    <select name="district_id" id="district_id" class="nice-select pl-13 h-100 arrow-3 font-size-4">
                                        <option value="">জেলা</option>
                                    </select>
                                    <span class="h-100 w-px-50 pos-abs-tl d-flex align-items-center justify-content-center font-size-6"><i class="icon icon-pin-3 text-primary font-weight-bold"></i></span>
                                </div>
                                <!-- ./select-city ends -->
                                <!-- .select-city starts -->
                                <div class="form-group position-relative">
                                    <select name="specialist_id" id="specialist_id" class="nice-select pl-13 h-100 arrow-3 font-size-4">
                                        <option value="">ডাক্তারের ধরণ</option>
                                        @foreach($specialistss as $specialist)
                                        <option value="{{$specialist->id}}">{{$specialist->specialist_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="h-100 w-px-50 pos-abs-tl d-flex align-items-center justify-content-center font-size-6"><i class="icon icon-pin-3 text-primary font-weight-bold"></i></span>
                                </div>
                                <!-- ./select-city ends -->
                            </div>
                            <!-- .Hero Button -->
                            <div class="button-block">
                                <button type="submit" class="btn btn-primary line-height-reset h-100 btn-submit w-100 text-uppercase">Search</button>
                            </div>
                            <!-- ./Hero Button -->
                        </div>
                    </form>
                    <!-- ./search-form -->
                </div>
            </div>
            <!-- Hero Right Image -->
            <div class="col-lg-6 col-md-4 col-sm-6 col-xs-6 col-8 pos-abs-br z-index-n1 position-static position-md-absolute mx-auto ml-md-auto" data-aos="fade-left" data-aos-duration="800" data-aos-once="true">
                <div class=" ml-xxl-23 ml-xl-12 ml-md-7">
                    <img src="{{ asset('frontend/image/hero.png')}}" alt="" class="w-100">
                </div>
            </div>
            <!-- ./Hero Right Image -->
        </div>
    </div>
</div>
<!-- Hero Area -->
<section class="food-zone-section pt-15 pb-15 bg-white">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-title">
                    <h2>ডাক্তার ক্যাটাগরি সমূহ</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($specialists as $specialist)
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="brands-box">
                    <a href="{{route('specialist.doctor',$specialist->id)}}">
                        <img src="{{asset('frontend/myimage/doctor2.png')}}" class="img-fluid" alt="">
                        <span>{{$specialist->specialist_name}}</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center my-3">
                    {!! $specialists->links() !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center mt-5">
                <a href="{{route('all.specialist')}}" class="btn btn-primary btn-sm">সকল ডাক্তার ক্যাটাগরি সমুহ </a>
            </div>
        </div>
    </div>
</section>
<!-- End Category Area -->

<div class="doctor-and-category  py-15">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
            <div class="row">
                    <div class="col">
                        <h5 class="bbd"><i class="fa fa-map-marker"></i> বিভাগ ও জেলা </h5>
                    </div>
                </div>
                <div class="product-category mb-10">
                    <div class="accordion" id="accordionExample2">
                        @foreach($divisions as $division)
                        @php
                         $div_districts = App\Models\District::where('division_id', $division->id)->get();
                        @endphp

                        <div class="cat-box">
                            <div class="cat-item" id="h1">
                                <a style="border: 0;" type="button" data-toggle="collapse" data-target="#d_{{$division->id}}">{{$division->division_name}}<i class="fa fa-plus"></i></a>
                            </div>
                            <div id="d_{{$division->id}}" class="collapse cat-body" aria-labelledby="h1" data-parent="#accordionExample2">
                                <div class="card-body">
                                    <ul>
                                    @foreach($div_districts as $div_district)
                                        <li><a href="{{route('district.doctor',$div_district->id)}}"><i class="fa fa-angle-double-right"></i> {{$div_district->district_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
            <div class="col-md-9">
            <div class="row">
                    <div class="col">
                        <h5 class="bbd">ডাক্তার সমুহ</h5>
                    </div>
                </div>
                <div class="row">
                    @foreach($doctors as $doctor)
                    <div class="col-sm-6">
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
                </div>
                <div class="row">
                    <div class="col pt-10">
                        <div class="d-flex justify-content-center my-3">
                            {!! $doctors->links() !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center mt-5">
                        <a href="{{route('all.doctor')}}" class="btn btn-primary btn-sm">সকল ডাক্তার সমুহ </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<section class="blogs-section clearfix pt-10 pb-15 bg-white">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-title">
                    <h2>পোস্ট সমূহ</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="blogs-box mb-3  wow animate__ animate__fadeInUp  animated">
                    <div class="card">
                        <img style="height: 170px;" src="{{asset($blog->image)}}" class="img-fluid" alt="image">
                        <div class="card-body">
                            <ul>
                                <li><a href="#"><small><i class="fa fa-circle"></i> {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y')}}</small></a></li>
                            </ul>
                            <h5><a href="{{route('blog.details',$blog->id)}}">{{$blog->title}}</a></h5>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center my-3">
                    {!! $blogs->links() !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center mt-10">
                <a href="{{route('all.blog')}}" class="btn btn-primary btn-sm">সকল পোস্ট সমুহ </a>
            </div>
        </div>
    </div>
</section>
@section('customjs')
<script>
    $(function() {
        $(document).on('change', '#division_id', function() {
            var division_id = $(this).val();
            $.ajax({
                type: "Get",
                url: "{{url('/get/division/')}}/" + division_id,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">জেলা</option>';
                    $.each(data, function(key, val) {
                        html += '<option value="' + val.id + '">' + val.district_name + '</option>';
                    });
                    $('#district_id').html(html);
                },

            });
        });
    });
</script>
@endsection
@endsection