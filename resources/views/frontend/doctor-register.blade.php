@extends('frontend.layouts.master')
@section('title','Doctor Registration')
@section('content')


<section class="user-login-section pt-15 pb-15">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="login-modal-main bg-white rounded-8 overflow-hidden" style="border: 1px solid #ddd;">
                    <div class="row no-gutters">
                        <div class="col-lg-4 col-md-6">
                            <div class="pt-10 pb-6 pl-11 pr-12 bg-black-2 h-100 d-flex flex-column dark-mode-texts">
                                <div class="pb-9">
                                    <h3 class="font-size-8 text-white line-height-reset pb-4 line-height-1p4">
                                        Register as a doctor
                                    </h3>
                                    <p class="mb-0 font-size-4 text-white">Create your account to continue
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6">
                            <div class="bg-white-2 h-100 px-11 pt-11 pb-7">

                                <form action="{{route('doctor.register.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Doctor Name</label>
                                                <input type="text" class="form-control" placeholder="Doctor name" name="doctor_name" value="{{old('doctor_name')}}">
                                                <div style='color:red; padding: 0 5px;'>{{($errors->has('doctor_name'))?($errors->first('doctor_name')):''}}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                                <option value="Others" {{ old('gender') == 'Others' ? 'selected' : '' }}>Others</option>
                                            </select>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('gender'))?($errors->first('gender')):''}}</div>
                                        </div>
                                    </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Division</label>
                                                <select class="form-control myselect2" name="division_id" id="division_id">
                                                    <option value="">Select Division</option>
                                                    @foreach($divisions as $division)
                                                    <option value="{{$division->id}}" {{ old('division_id') == $division->id ? 'selected' : '' }}>{{$division->division_name}}</option>
                                                    @endforeach
                                                </select>
                                                <div style='color:red; padding: 0 5px;'>{{($errors->has('division_id'))?($errors->first('division_id')):''}}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">District</label>
                                                <select class="form-control myselect2" name="district_id" id="district_id">
                                                    <option value="">Select District</option>
                                                </select>
                                                <div style='color:red; padding: 0 5px;'>{{($errors->has('district_id'))?($errors->first('district_id')):''}}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Specialist On</label>
                                                <select class="form-control myselect2" name="specialist_id">
                                                    <option value="">Select Specialist</option>
                                                    @foreach($specialists as $specialist)
                                                    <option value="{{$specialist->id}}" {{ old('specialist_id') == $specialist->id ? 'selected' : '' }}>{{$specialist->specialist_name}}</option>
                                                    @endforeach
                                                </select>
                                                <div style='color:red; padding: 0 5px;'>{{($errors->has('specialist_id'))?($errors->first('specialist_id')):''}}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Professional Degree</label>
                                                <input type="text" class="form-control" placeholder="Degree" name="degree" value="{{old('degree')}}">
                                                <div style='color:red; padding: 0 5px;'>{{($errors->has('degree'))?($errors->first('degree')):''}}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Designation</label>
                                                <input type="text" class="form-control" placeholder="Designation" name="designation" value="{{old('designation')}}">
                                                <div style='color:red; padding: 0 5px;'>{{($errors->has('designation'))?($errors->first('designation')):''}}</div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Hospital Name</label>
                                                <input type="text" class="form-control" placeholder="Hospital name" name="hospital_name" value="{{old('hospital_name')}}">
                                                <div style='color:red; padding: 0 5px;'>{{($errors->has('hospital_name'))?($errors->first('hospital_name')):''}}</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">BMDC No</label>
                                                <input type="text" class="form-control" placeholder="BMDC No" name="bmdc_no" value="{{old('bmdc_no')}}">
                                                <div style='color:red; padding: 0 5px;'>{{($errors->has('bmdc_no'))?($errors->first('bmdc_no')):''}}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Mobile No One</label>
                                                <input type="text" name="mobile_one" placeholder="Mobile no one" class="form-control" value="{{old('mobile_one')}}">
                                                <div style='color:red; padding: 0 5px;'>{{($errors->has('mobile_one'))?($errors->first('mobile_one')):''}}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Mobile No Two</label>
                                                <input type="text" name="mobile_two" placeholder="Mobile no two (Optional)" class="form-control" value="{{old('mobile_two')}}">
                                                <div style='color:red; padding: 0 5px;'>{{($errors->has('mobile_two'))?($errors->first('mobile_two')):''}}</div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Chamer Details</label>
                                                <textarea class="form-control" rows="4" name="chamber_details">{{old('chamber_details')}}</textarea>
                                                <div style='color:red; padding: 0 5px;'>{{($errors->has('chamber_details'))?($errors->first('chamber_details')):''}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Doctor Description</label>
                                                <textarea class="form-control" rows="4" name="description">{{old('description')}}</textarea>
                                                <div style='color:red; padding: 0 5px;'>{{($errors->has('description'))?($errors->first('description')):''}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" name="email" placeholder="Enter email" class="form-control" value="{{old('email')}}">
                                                <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <div class="position-relative">
                                                    <input id="password" placeholder="Enter password" type="password" class="form-control " name="password">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('password'))?($errors->first('password')):''}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <div class="position-relative">
                                                    <input id="password2" placeholder="Confirm password" type="password" class="form-control" name="password_confirmation">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('password_confirmation'))?($errors->first('password_confirmation')):''}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Doctor Image</label>
                                                <input id="noImage" type="file" name="image" class="form-control">
                                                <img style="padding:4px;border:1px solid #ddd; margin: 10px 0; width:100px;" id="showNoImage" src="{{asset('defaults/noimage/no_img.jpg')}}" alt="image">
                                                <div style='color:red; padding: 0 5px;'>{{($errors->has('image'))?($errors->first('image')):''}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="submit" value="Submit" class="btn btn-success">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

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
                    var html = '<option value="">Select District</option>';
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