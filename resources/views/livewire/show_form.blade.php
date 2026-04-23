@extends('layouts.master')
@section('css')
<style>
 .stepwizard-row.setup-panel {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 1rem;
 }

 .stepwizard-step {
  flex: 1;
 }

 .stepwizard-step .btn-circle {
  width: 48px;
  height: 48px;
  border-radius: 50%;
 }

 .displayNone {
  display: none !important;
 }
</style>
@endsection
@section('title')
{{trans('main_trans.Add_Parent')}}
@stop
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{trans('main_trans.Add_Parent')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
 <div class="col-md-12 mb-30">
  <div class="card card-statistics h-100">
   <div class="card-body">
    {{-- <livewire:add-parent/> --}}
    @livewire('add-parent')
   </div>
  </div>
 </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@livewireScripts
@endsection
