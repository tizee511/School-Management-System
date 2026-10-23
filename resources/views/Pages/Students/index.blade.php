@extends('layouts.master')
@section('title')
{{trans ('main_trans.list_students')}}
@stop

@section('css')
<!-- Font Awesome -->
<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection
<!-- breadcrumb -->
@section('PageTitle')
{{trans ('main_trans.list_students')}}
@stop

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                {{-- <a href="{{route ('student.create')}}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">{{trans ('main_trans.add_student')}}</a> --}}
                                <br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                        data-page-length="50" style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{trans ('Students_trans.name')}}</th>
                                                <th>{{trans ('Students_trans.email')}}</th>
                                                <th>{{trans ('Students_trans.gender')}}</th>
                                                <th>{{trans ('Students_trans.Grade')}}</th>
                                                <th>{{trans ('Students_trans.classrooms')}}</th>
                                                <th>{{trans ('Students_trans.section')}}</th>
                                                <th>{{trans ('Students_trans.Processes')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($students as $student)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{$student->Name}}</td>
                                                    <td>{{$student->email}}</td>
                                                    <td>{{$student->Gender->Name_gend}}</td>
                                                    <td>{{$student->Grades->Name}}</td>
                                                    <td>{{$student->Classrooms->Name_class}}</td>
                                                    <td>{{$student->Sections->Name_Section}}</td>
                                                    <td>
                                                        <div class="dropdown show">
                                                            <a class="btn btn-success btn-sm dropdown-toggle" href="#"
                                                                role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                {{trans ('Students_trans.Processes')}}
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                {{-- Student Show Date--}}
                                                                <a class="dropdown-item"
                                                                    href="{{route ('students.show', $student->id)}}">
                                                                    <i style="color: #ffc107" class="far fa-eye "></i>&nbsp; عرض
                                                                    بيانات الطالب</a>
                                                                {{-- Student Edit Date--}}
                                                                <a class="dropdown-item"
                                                                    href="{{route ('students.edit', $student->id)}}">
                                                                    <i style="color:green" class="fa fa-edit"></i>&nbsp; تعديل
                                                                    بيانات الطالب</a>
                                                                {{-- Fees Invoices Show --}}
                                                                <a class="dropdown-item"
                                                                    href="{{route ('Fees_Invoices.show', $student->id)}}">
                                                                    <i style="color: #0000cc" class="fa fa-edit"></i>&nbsp;اضافة
                                                                    فاتورة رسوم&nbsp;</a>

                                                                <a class="dropdown-item"
                                                                    href="{{route ('receipt_students.show', $student->id)}}">
                                                                    <i style="color: #9dc8e2"
                                                                        class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;سند
                                                                    قبض</a>

                                                                <a class="dropdown-item"
                                                                    href="{{route ('processing_fees.show', $student->id)}}">
                                                                    <i style="color: #9dc8e2"
                                                                        class="fas fa-money-bill-alt"></i>&nbsp; &nbsp; استبعاد
                                                                    رسوم</a>

                                                                <a class="dropdown-item"
                                                                    href="{{route ('Payment_students.show', $student->id)}}">
                                                                    <i style="color:goldenrod" class="fas fa-donate"></i>&nbsp;
                                                                    &nbsp;سند صرف</a>

                                                                <a class="dropdown-item"
                                                                    data-target="#Delete_Student{{ $student->id }}"
                                                                    data-toggle="modal"
                                                                    href="##Delete_Student{{ $student->id }}">
                                                                    <i style="color: red" class="fas fa-trash-alt"></i>&nbsp;
                                                                    حذف بيانات الطالب</a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @include('Pages.Students.Delete')
                                                @include('Pages.Students.graduate')
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
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="../../plugins/datatables/jquery.dataTables.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true
                , "lengthChange": false
                , "searching": false
                , "ordering": true
                , "info": true
                , "autoWidth": false
                ,
            });
        });

    </script>

@endsection