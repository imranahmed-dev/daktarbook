@extends('backend.layouts.master')
@section('title','Division')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Division</li>
    </ol>
    <h1 class="page-header">Division</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4 class="panel-title">Division List</h4>
                    <div class="panel-heading-btn">
                        <a href="#" class="btn btn-info btn-sm mr-2" data-toggle="modal" data-target="#addmodal"><i class="fa fa-plus-circle"></i> Add New</a>
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
                                <th class="text-nowrap">Division Name</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            @php
                            $dataCountDistrict = App\Models\District::where('division_id',$row->id)->count();
                            $dataCountDoctor = App\Models\Doctor::where('division_id',$row->id)->count();
                            @endphp
                            <tr class="odd gradeX">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->division_name}}</td>
                                <td>
                                    <a href="{{route('division.edit',$row->id)}}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    @if($dataCountDistrict < 1 || $dataCountDoctor < 1)
                                    <a id="delete" href="{{route('division.destroy',$row->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                                    @endif
               
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Division Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('division.store')}}" method="post">
            @csrf
                <div class="modal-body">
                    <label for="">Division Name</label>
                    <input type="text" name="division_name" placeholder="Division name" class="form-control">
                    <div style='color:red; padding: 0 5px;'>{{($errors->has('division_name'))?($errors->first('division_name')):''}}</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection