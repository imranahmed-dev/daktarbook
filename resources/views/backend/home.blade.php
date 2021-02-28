@extends('backend.layouts.master')
@section('title','Home')
@section('content')
@php
    $all_doctor = App\Models\Doctor::count();
    $approved_doctor = App\Models\Doctor::where('status',2)->count();
    $pending_doctor = App\Models\Doctor::where('status',1)->count();
    $trashed_doctor = App\Models\Doctor::onlyTrashed()->count();
@endphp

<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <h1 class="page-header">Dashboard</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-medkit"></i></div>
                <div class="stats-info">
                    <h4>All Doctor</h4>
                    <p>{{$all_doctor}}</p>
                </div>
                <div class="stats-link">
                    <a href="{{route('doctor.index')}}">View Detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-info">
                <div class="stats-icon"><i class="fa fa-check"></i></div>
                <div class="stats-info">
                    <h4>Approved Doctor</h4>
                    <p>{{$approved_doctor}}</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-orange">
                <div class="stats-icon"><i class="fa fa-spinner"></i></div>
                <div class="stats-info">
                    <h4>Pending Doctor</h4>
                    <p>{{$pending_doctor}}</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-trash"></i></div>
                <div class="stats-info">
                    <h4>Trashed Doctor</h4>
                    <p>{{$trashed_doctor}}</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection