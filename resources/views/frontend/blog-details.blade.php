@extends('frontend.layouts.master')
@section('title', ''.$blog->title.'')
@section('content')

<section class="blog-details py-10">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row mb-5">
                    <div class="col-md-4">
                        <div class="blog-det-img">
                            <img src="{{asset($blog->image)}}" class="img-fluid rounded mb-8" alt="">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="section-title">
                            <a href="#" class="text-muted text-13 mb-4">বিষয় : {{$blog->subject}}</a>
                            <h2 style="color: #555;">{{$blog->title}}</h2>
                            <p style="font-size: 14px !important;">POSTED ON {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y')}}</p>
                        </div>
                    </div>
                </div>
                <div class="blog-desc">
                    {!! $blog->description !!}
                </div>
                <div class="share-div mb-10">
                <p class="mb-1  mt-5" style="font-size: 14px;"><strong class="text-dark">Share Now : </strong></p>
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <div class="addthis_inline_share_toolbox_aaw7"></div>
                </div>
            </div>
            <div class="col-md-3 latest-post-border">
                <div class="latest-blog pl-2">
                    <h5 class="mb-4">Latest Post</h5>
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