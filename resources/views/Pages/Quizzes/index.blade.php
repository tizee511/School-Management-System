@extends('layouts.master')
@section('css')

@section('title')
    قائمة الاختبارات
    @stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    قائمة الاختبارات
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <style>
        #add {
            padding: 1.25rem 1.5rem;
            font-size: 0.875rem;
            line-height: 0.5;
            border-radius: 1.2rem;
            font-weight: bold;
        }
    </style>
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a id="add" href="{{route ('quizzes.create')}}" class="btn btn-success btn-sm" role="button"
                                    aria-pressed="true">اضافة اختبار جديد</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                        data-page-length="50" style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>اسم الاختبار</th>
                                                <th>اسم المعلم</th>
                                                <th>المرحلة الدراسية</th>
                                                <th>الصف الدراسي</th>
                                                <th>القسم</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($quizzes as $quizze)
                                                <tr>
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{$quizze->Name}}</td>
                                                    <td>{{$quizze->teacher->Name}}</td>
                                                    <td>{{$quizze->grade->Name}}</td>
                                                    <td>{{$quizze->classroom->Name_class}}</td>
                                                    <td>{{$quizze->section->Name_Section}}</td>
                                                    <td>
                                                        <a href="{{route ('quizzes.edit', $quizze->id)}}"
                                                            class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                                class="fas fa-edit"></i></a>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                            data-target="#delete_quizze{{ $quizze->id }}" title="حذف"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </td>
                                                </tr>
                                                @include('Pages.Quizzes.Delete')
                                            @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
@endsection