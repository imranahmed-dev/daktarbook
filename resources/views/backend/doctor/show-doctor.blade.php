@extends('backend.layouts.master')
@section('title','Doctor Details')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Doctor Details</li>
    </ol>
    <h1 class="page-header">Doctor</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4 class="panel-title">Doctor Details</h4>
                    <div class="panel-heading-btn">
                        <a href="{{ route('doctor.index') }}" class="btn btn-info btn-xs mr-2"><i class="fa fa-plus-circle"></i> All Doctor</a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-bordered table-td-valign-middle">
                        <tr>
                            <th width="20%">Doctor Name</th>
                            <td>{{$doctor->doctor_name}}</td>
                        </tr>
                        <tr>
                            <th width="20%">Doctor Image</th>
                            <td><img width="80" src="{{asset($doctor->image)}}" alt=""></td>
                        </tr>
                        
                        <tr>
                            <th>Gender</th>
                            <td>{{$doctor->gender}}</td>
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
                            <td>{{$doctor->hospital_name}}</td>
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
                            <td>@if($doctor->email != null) {{$doctor->email}} @else N/A @endif</td>
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
                                <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#doctor_status_{{$doctor->id}}"><i class="fa fa-spinner"></i> Pending</a>
                                @elseif($doctor->status == 2)
                                <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#doctor_status_{{$doctor->id}}"><i class="fa fa-check"></i> Approved</a>
                                @endif
                            </td>
                        </tr>

                        <!--Doctor Status -->
                        <div class="modal fade" id="doctor_status_{{$doctor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Doctor Status</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('doctor.status', $doctor->id)}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="1" @if( $doctor->status == 1 ) selected @endif >Pending</option>
                                                    <option value="2" @if( $doctor->status == 2 ) selected @endif >Approved</option>
                                                </select>

                                                <div style='color:red; padding: 0 5px;'>{{($errors->has('status'))?($errors->first('status')):''}}</div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection