@extends('layouts.master')
@section('title')
    إجراء اختبار
@stop
@section('css')
    @toastr_css
    @livewireStyles
@endsection
    <!-- breadcrumb -->
    @section('PageTitle')
        إجراء اختبار
    @stop
    <!-- breadcrumb -->
@section('content')
    @livewire('show-question', ['quizze_id' => $quizze_id, 'student_id' => $student_id])
@endsection
@section('js')
    @livewireScripts
@endsection

