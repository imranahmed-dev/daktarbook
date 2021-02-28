@extends('frontend.dashboard.dashboard-master')
@section('title','Edit Profile')
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
                            <h5>Edit Profile</h5>
                        </div>
                        <hr>
                        @if(Auth::user()->usertype == 2)
                        <form action="{{route('user.update.profile',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-bordered table-striped table-sm">
                                <tr>
                                    <th width="20%">Profile Picture</th>
                                    <td>
                                        <input id="noImage" name="image" type="file" class="form-control">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('image'))?($errors->first('image')):''}}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="20%">Name</th>
                                    <td>
                                        <input name="name" type="text" class="form-control" placeholder="Enter name" value="{{Auth::user()->name}}">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('name'))?($errors->first('name')):''}}</div>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Email</th>
                                    <td>
                                        <input name="email" type="text" class="form-control" placeholder="Enter email" value="{{Auth::user()->email}}">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Mobile Number</th>
                                    <td>
                                        <input name="mobile" type="text" class="form-control" placeholder="Enter mobile" value="{{Auth::user()->mobile}}">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('mobile'))?($errors->first('mobile')):''}}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>
                                        <select name="gender" class="form-control">
                                            <option value="">Select Gender</option>
                                            <option value="Male" @if(Auth::user()->gender == "Male" ) selected @endif>Male</option>
                                            <option value="Female" @if(Auth::user()->gender == "Female" ) selected @endif>Female</option>
                                            <option value="Others" @if(Auth::user()->gender == "Others" ) selected @endif>Others</option>
                                        </select>
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('gender'))?($errors->first('gender')):''}}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>
                                        <input name="address" type="text" class="form-control" placeholder="Enter address" value="{{Auth::user()->address}}">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('address'))?($errors->first('address')):''}}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input class="btn btn-primary btn-sm" type="submit" value="Save Changes"></td>
                                </tr>
                            </table>
                        </form>
                        @endif

                        @if(Auth::user()->usertype == 3)
                        <div class="pro-title mb-3">
                            <h5 style="font-size: 18px;" class="text-primary">Change email</h5>
                        </div>
                        <form action="{{route('doctor.change.email',Auth::user()->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter email" value="{{Auth::user()->email}}">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Save Changes" class="btn btn-success">
                            </div>
                        </form>
                        <div class="pro-title mb-6 mt-10">
                            <h5 style="font-size: 18px;" class="text-primary">Update profile</h5>
                        </div>
                        <form action="{{route('doctor.update.profile',$doctor->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Doctor Name</label>
                                            <input type="text" class="form-control" placeholder="Doctor name" name="doctor_name" value="{{$doctor->doctor_name}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('doctor_name'))?($errors->first('doctor_name')):''}}</div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Gender</label>
                                            <select class="form-control myselect2" name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male" @if($doctor->gender == 'Male' ) selected @endif >Male</option>
                                                <option value="Female" @if($doctor->gender == 'Female' ) selected @endif >Female</option>
                                                <option value="Others" @if($doctor->gender == 'Others' ) selected @endif >Others</option>
                                            </select>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('gender'))?($errors->first('gender')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Division</label>
                                            <select class="form-control myselect2" name="division_id" id="division_id">
                                                <option value="">Select Division</option>
                                                @foreach($divisions as $division)
                                                <option value="{{$division->id}}" @if( $doctor->division_id == $division->id ) selected @endif >{{$division->division_name}}</option>
                                                @endforeach
                                            </select>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('division_id'))?($errors->first('division_id')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">District</label>
                                            <select class="form-control myselect2" name="district_id" id="district_id">
                                                <option value="">Select District</option>
                                                @foreach($districts as $district)
                                                <option value="{{$district->id}}" @if( $doctor->district_id == $district->id ) selected @endif >{{$district->district_name}}</option>
                                                @endforeach
                                            </select>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('district_id'))?($errors->first('district_id')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Specialist On</label>
                                            <select class="form-control myselect2" name="specialist_id">
                                                <option value="">Select Specialist</option>
                                                @foreach($specialists as $specialist)
                                                <option value="{{$specialist->id}}" @if( $doctor->specialist_id == $specialist->id ) selected @endif >{{$specialist->specialist_name}}</option>
                                                @endforeach
                                            </select>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('specialist_id'))?($errors->first('specialist_id')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Professional Degree</label>
                                            <input type="text" class="form-control" placeholder="Degree" name="degree" value="{{$doctor->degree}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('degree'))?($errors->first('degree')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Designation</label>
                                            <input type="text" class="form-control" placeholder="Designation" name="designation" value="{{$doctor->designation}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('designation'))?($errors->first('designation')):''}}</div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Hospital Name</label>
                                            <input type="text" class="form-control" placeholder="Hospital name" name="hospital_name" value="{{$doctor->hospital_name}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('hospital_name'))?($errors->first('hospital_name')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">BMDC No</label>
                                            <input type="text" class="form-control" placeholder="bmdc_no" name="bmdc_no" value="{{$doctor->bmdc_no}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('bmdc_no'))?($errors->first('bmdc_no')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Mobile No One</label>
                                            <input type="text" name="mobile_one" placeholder="Mobile no one" class="form-control" value="{{$doctor->mobile_one}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('mobile_one'))?($errors->first('mobile_one')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Mobile No Two</label>
                                            <input type="text" name="mobile_two" placeholder="Mobile no two (Optional)" class="form-control" value="{{$doctor->mobile_two}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('mobile_two'))?($errors->first('mobile_two')):''}}</div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Chamer Details</label>
                                            <textarea class="form-control" name="chamber_details">{{$doctor->chamber_details}}</textarea>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('chamber_details'))?($errors->first('chamber_details')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea class="form-control" name="description">{{$doctor->description}}</textarea>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('description'))?($errors->first('description')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Doctor Image</label>
                                            <input id="noImage" type="file" name="image" class="form-control">
                                            <img style="padding:4px;border:1px solid gray; margin: 10px 0; width:100px;" id="showNoImage" src="@if(!empty($doctor->image)) {{asset( $doctor->image ) }} @else {{asset('defaults/avatar/avatar.png')}} @endif" alt="image">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('image'))?($errors->first('image')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="submit" value="Update" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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