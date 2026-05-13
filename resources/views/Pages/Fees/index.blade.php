@extends('layouts.master')
@section('css')
@section('title')
    الفواتير الدراسية
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
   الفواتير الدراسية
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
                            <a href="{{route('fees.create')}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">            {{trans('main_trans.Add_Fee')}}</a>

                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>نوع الروسوم</th>
                                            <th>المبلغ</th>
                                            <th>المرحلة الدراسية</th>
                                            <th>الصف الدراسي</th>
                                            <th>البيان</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($fees as $fee)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            {{-- <td>{{$Fee_invoice->student->name}}</td> --}}
                                            <td>{{$fee->title}}</td>
                                            <td>{{ $fee->Fee_type }}</td>
                                            <td>{{ number_format($fee->amount, 2) }}</td>
                                            <td>{{$fee->grade->Name}}</td>
                                            <td>{{$fee->classroom->Name_class}}</td>
                                            <td>{{$fee->description}}</td>
                                                <td>
                                                    <a href="{{route('fees.edit',$fee->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee_invoice{{$fee->id}}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('Pages.Fees.Delete')
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
