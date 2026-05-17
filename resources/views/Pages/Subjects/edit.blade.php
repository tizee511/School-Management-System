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
                                <label for="inputZip">الصف الدراسي</label>
                                <select class="custom-select mr-sm-2" name="Classroom_id">
                                    <option value="{{$Subjects->Classroom_id}}">{{$Subjects->classrooms->Name_class}}</option>
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
@endsection
