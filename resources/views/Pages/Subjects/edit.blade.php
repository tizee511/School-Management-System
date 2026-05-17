@extends('layouts.master')
@section('css')
@section('title')
    تعديل المادة الدراسية
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    تعديل المادة الدراسية
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('subjects.update','test')}}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">الاسم باللغة العربية</label>
                                <input type="text" value="{{$Subjects->getTranslation('Name','ar')}}" name="Name_ar" class="form-control">
                                <input type="hidden" value="{{$Subjects->id}}" name="id" class="form-control">
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">الاسم باللغة الانجليزية</label>
                                <input type="text" value="{{$Subjects->getTranslation('Name','en')}}" name="Name_en" class="form-control">
                            </div>
                            
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">المرحلة الدراسية</label>
                                <select class="custom-select mr-sm-2" name="Grade_id">
                                    @foreach($Grades as $Grade)
                                        <option value="{{ $Grade->id }}" {{$Grade->id == $Subjects->Grade_id ? 'selected' : ""}}>{{ $Grade->Name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputState">الصف الدراسي</label>
                                <select name="Class_id" class="custom-select">
                                 <option value="{{ $subject->Classrooms->id }}">{{ $subject->Classrooms->Name_class }}
                                 </option>
                                    </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputZip">المعلمين</label>
                                <select class="custom-select mr-sm-2" name="Teacher_id">
                                    @foreach($Teachers as $Teacher)
                                        <option value="{{ $Teacher->id }}" {{$Teacher->id == $Subjects->Teacher_id ? 'selected' : ""}}>{{ $Teacher->Name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">تاكيد</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
<script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Class_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
