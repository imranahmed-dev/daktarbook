@extends('backend.layouts.master')
@section('title','All Doctor')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">All Doctor</li>
    </ol>
    <h1 class="page-header">Doctor</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4 class="panel-title">All Doctor List</h4>
                    <div class="panel-heading-btn">
                        <a href="{{ route('doctor.create') }}" class="btn btn-info btn-xs mr-2"><i class="fa fa-plus-circle"></i> Add New</a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                    </div>
                </div>

                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th class="text-nowrap">Doctor Image</th>
                                <th class="text-nowrap">Doctor Name</th>
                                <th class="text-nowrap">Specialist</th>
                                <th class="text-nowrap">Division</th>
                                <th class="text-nowrap">District</th>
                                <th class="text-nowrap">Status</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($doctors as $doctor)
                            <tr class="odd gradeX">
                                <td>{{$loop->iteration}}</td>
                                <td><img width="50" src="{{asset($doctor->image)}}" alt=""></td>
                                <td>{{$doctor->doctor_name}}</td>
                                <td>{{$doctor->specialist->specialist_name}}</td>
                                <td>{{$doctor->division->division_name}}</td>
                                <td>{{$doctor->district->district_name}}</td>
                                <td>
                                    @if($doctor->status == 1)
                                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#doctor_status_{{$doctor->id}}"><i class="fa fa-spinner"></i> Pending</a>
                                    @elseif($doctor->status == 2)
                                    <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#doctor_status_{{$doctor->id}}"><i class="fa fa-check"></i> Approved</a>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{route('doctor.show',$doctor->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> View</a>
                                    <a href="{{route('doctor.edit',$doctor->id)}}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <a id="trash" href="{{route('doctor.trash',$doctor->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Trash</a>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection