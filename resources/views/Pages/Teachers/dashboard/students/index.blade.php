@extends('layouts.master')
@section('title')
قائمة الحضور والغياب للطلاب
@stop

@section('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset ('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ URL::asset ('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset ('assets/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

@endsection
<!-- breadcrumb -->
@section('PageTitle')
قائمة الحضور والغياب للطلاب
@stop
@section('PageTitle')
{{trans('main_trans.list_students')}}
@stop

@section('content')
    <!-- row -->
    @if ($errors->any ())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all () as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session ('status'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ session ('status') }}</li>
            </ul>
        </div>
    @endif
    <h5 style="font-family: 'Cairo', sans-serif;color: red"> تاريخ اليوم : {{ date ('Y-m-d') }}</h5>
    <form method="post" action="{{ route ('attendance') }}" autocomplete="off">
        @csrf
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
            style="text-align: center">
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
                {{-- @dd($students) --}}
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{$student->Name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->Gender->Name_gend}}</td>
                        <td>{{$student->Grades->Name}}</td>
                        <td>{{$student->Classrooms->Name_class}}</td>
                        <td>{{$student->Sections->Name_Section}}</td>
                        <td>
                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="attendences[{{ $student->id }}]"
                                    @foreach($student->Attendance()->where ('attendance_date', date ('Y-m-d'))->get() as $attendance) {{ $attendance->attendance_status == 1 ? 'checked' : '' }} @endforeach
                                    class="leading-tight" type="radio" value="presence">
                                <span class="text-success">حضور</span>
                            </label>

                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="attendences[{{ $student->id }}]"
                                    @foreach($student->Attendance()->where ('attendance_date', date ('Y-m-d'))->get() as $attendance) {{ $attendance->attendance_status == 0 ? 'checked' : '' }} @endforeach
                                    class="leading-tight" type="radio" value="absent">
                                <span class="text-danger">غياب</span>
                            </label>

                            <input type="hidden" name="Grade_id" value="{{ $student->grade_id }}">
                            <input type="hidden" name="Classroom_id" value="{{ $student->Classroom_id }}">
                            <input type="hidden" name="Section_id" value="{{ $student->section_id }}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <P>
            <button class="btn btn-success" type="submit">{{ trans ('Students_trans.submit') }}</button>
        </P>
    </form><br>
    <!-- row closed -->
@endsection

@section('js')
    <!-- jQuery -->
    <script src="{{ URL::asset ('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ URL::asset ('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ URL::asset ('assets/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset ('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset ('assets/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::asset ('assets/dist/js/demo.js') }}"></script>
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