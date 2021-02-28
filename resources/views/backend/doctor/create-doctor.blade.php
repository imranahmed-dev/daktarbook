@extends('backend.layouts.master')
@section('title','Create Doctor')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('doctor.index')}}">Doctor</a></li>
        <li class="breadcrumb-item active">Create Doctor</li>
    </ol>
    <h1 class="page-header">Doctor</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4 class="panel-title">Create Doctor</h4>
                    <div class="panel-heading-btn">
                        <a href="{{ route('doctor.index') }}" class="btn btn-info btn-xs mr-2"><i class="fa fa-list"></i> Doctor list</a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('doctor.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Doctor Name</label>
                                            <input type="text" class="form-control" placeholder="Doctor name" name="doctor_name" value="{{old('doctor_name')}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('doctor_name'))?($errors->first('doctor_name')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Gender</label>
                                            <select class="form-control myselect2" name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                                <option value="Others" {{ old('gender') == 'Others' ? 'selected' : '' }}>Others</option>
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
                                                <option value="{{$division->id}}" {{ old('division_id') == $division->id ? 'selected' : '' }}>{{$division->division_name}}</option>
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
                                                <option value="{{$specialist->id}}" {{ old('specialist_id') == $specialist->id ? 'selected' : '' }}>{{$specialist->specialist_name}}</option>
                                                @endforeach
                                            </select>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('specialist_id'))?($errors->first('specialist_id')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Professional Degree</label>
                                            <input type="text" class="form-control" placeholder="Degree" name="degree" value="{{old('degree')}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('degree'))?($errors->first('degree')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Designation</label>
                                            <input type="text" class="form-control" placeholder="Designation" name="designation" value="{{old('designation')}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('designation'))?($errors->first('designation')):''}}</div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Hospital Name</label>
                                            <input type="text" class="form-control" placeholder="Hospital name" name="hospital_name" value="{{old('hospital_name')}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('hospital_name'))?($errors->first('hospital_name')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="">BMDC No</label>
                                                <input type="text" class="form-control" placeholder="BMDC No" name="bmdc_no" value="{{old('bmdc_no')}}">
                                                <div style='color:red; padding: 0 5px;'>{{($errors->has('bmdc_no'))?($errors->first('bmdc_no')):''}}</div>
                                            </div>
                                        </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Mobile No One</label>
                                            <input type="text" name="mobile_one" placeholder="Mobile no one" class="form-control" value="{{old('mobile_one')}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('mobile_one'))?($errors->first('mobile_one')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
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
                                            <label for="">Email</label>
                                            <input type="email" name="email" placeholder="Enter email" class="form-control" value="{{old('email')}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Chamer Details</label>
                                            <textarea class="summernote" name="chamber_details">{{old('chamber_details')}}</textarea>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('chamber_details'))?($errors->first('chamber_details')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea class="summernote" name="description">{{old('description')}}</textarea>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('description'))?($errors->first('description')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Doctor Image</label>
                                            <input id="noImage" type="file" name="image" class="form-control">
                                            <img style="padding:4px;border:1px solid gray; margin: 10px 0; width:100px;" id="showNoImage" src="{{asset('defaults/noimage/no_img.jpg')}}" alt="image">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('image'))?($errors->first('image')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="2">Active</option>
                                                <option value="1">In Active</option>
                                            </select>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('status'))?($errors->first('status')):''}}</div>
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