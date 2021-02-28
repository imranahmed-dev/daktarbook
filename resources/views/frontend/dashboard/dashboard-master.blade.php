@extends('frontend.layouts.master')
@section('content')
@php
$route = Route::current()->getName();
@endphp

<!--start profile section -->
<section class="customer-dashboard clearfix pb-12 pt-12">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 pr-0">
                <div class="card customer-dashboard-menu mb-3 mb-md-0">
                    <div class="card-header bg-dark text-light customer-menu-header">
                        <h4 class="m-0 text-light">My account</h4>
                    </div>
                    <ul>

                        <li><a class="@if($route == 'user.profile')  customer-menu-active  @endif" href="{{route('user.profile')}}"><i class="fa fa-user-circle text-primary"></i> My Profile</a></li>

                        <li><a class="@if($route == 'user.edit.profile')  customer-menu-active  @endif" href="{{route('user.edit.profile')}}"><i class="fa fa-edit text-primary"></i> Edit Profile</a></li>

                        @if(Auth::user()->usertype == 2)
                        <li><a class="@if($route == 'user.favourite.doctor')  customer-menu-active  @endif" href="{{route('user.favourite.doctor')}}"><i class="fa fa-star text-primary"></i> Favourite Doctor</a></li>
                        @endif
                        <li><a class="text-primary" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>
            </div>

            @yield('dashboard')

        </div>
    </div>
</section>
<!--end profile section -->

@endsection