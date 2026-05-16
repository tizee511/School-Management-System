@extends('layouts.master')
@section('css')
@section('title')
    {{trans('main_trans.list_students')}} 

@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.list_students')}}
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
                                <a href="{{route('students.create')}}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">{{trans('main_trans.add_student')}}</a>
                                <br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                        style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Students_trans.name')}}</th>
                                            <th>{{trans('Students_trans.email')}}</th>
                                            <th>{{trans('Students_trans.gender')}}</th>
                                            <th>{{trans('Students_trans.Grade')}}</th>
                                            <th>{{trans('Students_trans.classrooms')}}</th>
                                            <th>{{trans('Students_trans.section')}}</th>
                                            <th>{{trans('Students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{$student->Name}}</td>
                                            <td>{{$student->Email_stud}}</td>
                                            <td>{{$student->Gender->Name_gend}}</td>
                                            <td>{{$student->Grades->Name}}</td>
                                            <td>{{$student->Classrooms->Name_class}}</td> 
                                            <td>{{$student->Sections->Name_Section}}</td>
                                            <td>
                                            <div class="dropdown show">
                                                    <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{trans('Students_trans.Processes')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            {{--  Student Show Date--}}
                                                            <a class="dropdown-item" href="{{route('students.show',$student->id)}}">
                                                            <i style="color: #ffc107" class="far fa-eye "></i>&nbsp;  عرض بيانات الطالب</a>
                                                            {{--  Student Edit Date--}}
                                                            <a class="dropdown-item" href="{{route('students.edit',$student->id)}}">
                                                            <i style="color:green" class="fa fa-edit"></i>&nbsp;  تعديل بيانات الطالب</a>
                                                            {{--  Fees Invoices Show --}}
                                                            <a class="dropdown-item" href="{{route('Fees_Invoices.show',$student->id)}}">
                                                            <i style="color: #0000cc" class="fa fa-edit"></i>&nbsp;اضافة فاتورة رسوم&nbsp;</a>

                                                            <a class="dropdown-item" href="{{route('receipt_students.show',$student->id)}}">
                                                            <i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;سند قبض</a>

                                                            <a class="dropdown-item" href="{{route('processing_fees.show',$student->id)}}">
                                                            <i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp; استبعاد رسوم</a>

                                                            <a class="dropdown-item" href="{{route('Payment_students.show',$student->id)}}">
                                                            <i style="color:goldenrod" class="fas fa-donate"></i>&nbsp; &nbsp;سند صرف</a>

                                                            <a class="dropdown-item" data-target="#Delete_Student{{ $student->id }}" data-toggle="modal" href="##Delete_Student{{ $student->id }}">
                                                            <i style="color: red" class="fas fa-trash-alt"></i>&nbsp;  حذف بيانات الطالب</a>

                                                        </div>
                                                    </div> 
                                            </td></tr>
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
@endsection
