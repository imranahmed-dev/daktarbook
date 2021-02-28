@extends('frontend.layouts.master')
@section('title','All Specialist')
@section('content')

<!-- Hero Area -->
<section class="food-zone-section pt-15 pb-15 bg-white">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-title">
                    <h2>সকল ডাক্তার ক্যাটাগরি সমূহ</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($specialists as $specialist)
            <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                <div class="brands-box">
                    <a href="{{route('specialist.doctor',$specialist->id)}}">
                        <img src="{{asset('frontend/myimage/doctor2.png')}}" class="img-fluid" alt="">
                        <span>{{$specialist->specialist_name}}</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Category Area -->

@endsection