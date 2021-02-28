@extends('frontend.layouts.master')
@section('title','All Blog')
@section('content')


<section class="blogs-section clearfix pt-10 pb-15 bg-white">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-title">
                    <h2>সকল ব্লগ সমুহ</h2>
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
    </div>
</section>

@endsection