@extends('frontend.layouts.master')
@section('title','Privacy Policy')
@section('content')


<section class="teachers-list pt-15 pb-15 aos-init aos-animate" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-title">
                    <h2>Privacy Policy</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container teachers-profile-box pt-10 pb-10" data-aos="fade-up">
        <div class="row">
            <div class="col">
                {!!$setting->privacy_policy!!}
            </div>
        </div>

    </div>
</section>

@endsection