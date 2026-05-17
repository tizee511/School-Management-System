@extends('layouts.master')
@section('css')
@section('title')
    الواد الدراسية
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    المواد الدراسية
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('subjects.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">اضافة مادة دراسية جديدة</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>المرحلة الدراسية</th>
                                            <th>الصف الدراسي</th>
                                            <th>المعلم</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Subjects as $Subject)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$Subject->Name}}</td>
                                            <td>{{$Subject->Grades->Name}}</td>
                                            <td>{{$Subject->Classrooms->Name_class}}</td>
                                            <td>{{$Subject->Teachers->Name}}</td>
                                            <td>
                                                <a href="{{route('subjects.edit',$Subject->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true">

                                                <i class="fas fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_subject_invoice{{ $Subject->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}">
                                                <i class="fas fa-trash-alt"></i></button>
                                            </td>
                                            </tr>
                                        @include('Pages.Subjects.Delete')
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