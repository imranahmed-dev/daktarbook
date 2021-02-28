@extends('frontend.dashboard.dashboard-master')
@section('title','Favourite Doctor')
@section('dashboard')
<div class="col-md-10">
    <div class="customer-dashboard-body">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 hff">Favourite Doctor</h5>
            </div>
            <div class="card-body table-responsive text-nowrap">
                <table id="dataTable" class="table table-bordered  tbl-custom">
                    <thead class="">

                        <tr>
                            <th>SN</th>
                            <th>Doctor Name</th>
                            <th>Specialist</th>
                            <th>Division</th>
                            <th>District</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($doctors as $doctor)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$doctor->doctor->doctor_name}}</td>
                            <td>{{$doctor->doctor->specialist->specialist_name}}</td>
                            <td>{{$doctor->doctor->division->division_name}}</td>
                            <td>{{$doctor->doctor->district->district_name}}</td>
                            <td>
                                <a href="#" class="mybtn-sm btn-success"><i class="fa fa-eye"></i> Details</a>
                                <a id="delete" href="{{route('favourite.destroy',$doctor->id)}}" class="mybtn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection