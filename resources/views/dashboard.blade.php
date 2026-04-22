@extends('layouts.master')

@section('page-header')

<div class="page-title d-flex justify-content-between align-items-center">

    <div>
        <h4 class="mb-1">{{ trans('dashboard_trans.Dashboard_page') }}</h4>
        <span class="text-muted">{{ trans('dashboard_trans.Welcome_message', ['name' => auth()->user()->name ?? ''])
            }}</span>
    </div>
    <div>
        <a href="{{ route('logout') }}" class="btn btn-outline-danger"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ trans('dashboard_trans.Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ trans('dashboard_trans.Grades_title') }}</h5>
                <p class="card-text">{{ trans('dashboard_trans.Grades_text') }}</p>
                <a href="{{ route('Grades.index') }}" class="btn btn-light btn-sm">{{
                    trans('dashboard_trans.Grades_button') }}</a>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ trans('dashboard_trans.Classrooms_title') }}</h5>
                <p class="card-text">{{ trans('dashboard_trans.Classrooms_text') }}</p>
                <a href="{{ route('Classrooms.index') }}" class="btn btn-light btn-sm">{{
                    trans('dashboard_trans.Classrooms_button') }}</a>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ trans('dashboard_trans.Sections_title') }}</h5>
                <p class="card-text">{{ trans('dashboard_trans.Sections_text') }}</p>
                <a href="{{ route('Sections.index') }}" class="btn btn-light btn-sm">{{
                    trans('dashboard_trans.Sections_button') }}</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mb-3">{{ trans('dashboard_trans.Overview_title') }}</h5>
                <p class="text-muted">{{ trans('dashboard_trans.Overview_text') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
