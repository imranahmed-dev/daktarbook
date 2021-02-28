@extends('frontend.dashboard.dashboard-master')
@section('title','Profile')
@section('dashboard')

<style>
    .customer-ppn img {
        background: #fff;
        height: 120px;
        width: 120px;
        border-radius: 50%;
        padding: 3px;
        border: 1px solid #ddd;
    }

    .table th,
    .table td {
        padding-left: 15px;
    }
</style>
<div class="col-md-10">
    <div class="customer-dashboard-body card">
        <div class="card-header">
            <h5 class="m-0 hff">My Profile</h5>
        </div>
        <!--customer profile area-->
        <div class="row">
            <div class="col">
                <div class="customer-ppn" style="background: linear-gradient(rgba(0, 0, 0, 0.45),rgba(0, 0, 0, 0.45)), url({{asset('frontend/dashboard/image/profilebg.jpg')}});">
                    <div class="customer-pp pt-4 ml-5">
                        @if(Auth::user()->usertype == 2)
                        <img src="{{(!empty(Auth::user()->image))?url(Auth::user()->image):url('frontend/dashboard/image/avatar.jpg')}}" alt="">
                        @endif
                        @if(Auth::user()->usertype == 3)
                        <img src="{{(!empty($doctor->image))?url($doctor->image):url('frontend/dashboard/image/avatar.jpg')}}" alt="">
                        @endif
                    </div>
                    @if(Auth::user()->usertype == 2)
                    <h4 class=" mt-1 pb-4" style="margin-left:36px;color:#fff;">{{Auth::user()->name}}</h4>
                    @endif
                    @if(Auth::user()->usertype == 3)
                    <h4 class=" mt-1 pb-4" style="margin-left:36px;color:#fff;">{{$doctor->doctor_name}}</h4>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="customer-p-details">
                    <div class="card-body table-responsive pt-1">
                        <div class="p-about mb-3">
                            <a href="{{route('user.profile')}}" class="mybtn-md btn-success btn-sm"><i class="fa fa-info-circle"></i> About</a>
                            <a href="{{route('user.edit.profile')}}" class="mybtn-md btn-primary btn-sm"><i class="fa fa-edit"></i> Edit Profile</a>
                            <a href="{{route('user.change.password')}}" class="mybtn-md btn-info btn-sm"><i class="fa fa-key"></i> Change Password</a>
                        </div>
                        <div class="pro-title mb-3">
                            <h5>About</h5>
                        </div>
                        @if(Auth::user()->usertype == 2)
                        <table class="table table-bordered table-striped table-sm">
                            <tr>
                                <th width="20%">Name</th>
                                <td>{{Auth::user()->name}}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>{{Auth::user()->email}}</td>
                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td>{{Auth::user()->mobile}}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{Auth::user()->gender}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{Auth::user()->address}}</td>
                            </tr>
                        </table>
                        @endif

                        @if(Auth::user()->usertype == 3)
                        <table class="table table-striped table-bordered table-td-valign-middle">
                            <tr>
                                <th width="20%">Doctor Name</th>
                                <td>{{$doctor->doctor_name}}</td>
                            </tr>
                            <tr>
                                <th width="20%">Gender</th>
                                <td>{{$doctor->gender}}</td>
                            </tr>
                            <tr>
                                <th>Doctor Image</th>
                                <td><img width="50" src="@if(!empty($doctor->image)) {{asset( $doctor->image ) }} @else {{asset('defaults/avatar/avatar.png')}} @endif" alt=""></td>
                            </tr>
                            <tr>
                                <th>Specialist</th>
                                <td>{{$doctor->specialist->specialist_name}}</td>
                            </tr>
                            <tr>
                                <th>Division</th>
                                <td>{{$doctor->division->division_name}}</td>
                            </tr>
                            <tr>
                                <th>District</th>
                                <td>{{$doctor->district->district_name}}</td>
                            </tr>
                            <tr>
                                <th>Professional Degree</th>
                                <td>{{$doctor->degree}}</td>
                            </tr>
                            <tr>
                                <th>Designation</th>
                                <td>{{$doctor->designation}}</td>
                            </tr>
                            <tr>
                                <th>Hospital Name</th>
                                <td>{{$doctor->specialist->specialist_name}}</td>
                            </tr>
                            <tr>
                                <th>BMDC No</th>
                                <td>{{$doctor->bmdc_no}}</td>
                            </tr>
                            <tr>
                                <th>Mobile No One</th>
                                <td>{{$doctor->mobile_one}}</td>
                            </tr>
                            <tr>
                                <th>Mobile No Two</th>
                                <td>@if($doctor->mobile_two != null) {{$doctor->mobile_two}} @else N/A @endif</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{Auth::user()->email}}</td>
                            </tr>

                            <tr>
                                <th>Chamber Details</th>
                                <td>{!!$doctor->chamber_details!!}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{!!$doctor->description!!}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if($doctor->status == 1)
                                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-spinner"></i> Pending</a>
                                    @elseif($doctor->status == 2)
                                    <a href="#" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Approved</a>
                                    @endif
                                </td>
                            </tr>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection