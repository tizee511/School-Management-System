@extends('layouts.master')
@section('title')
    قائمة الاسئلة
@stop
@section('css')
@endsection
@section('PageTitle')
قائمة الاسئلة : <span class="text-danger">{{$quizz->Name}}</span>
@stop
<!-- breadcrumb -->
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                            {{-- <!-- {{route('questions.show',$quizz->id)}} --> --}}
                                <a href="{{route('questions.show',$quizz->id)}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">اضافة سؤال جديد</a><br><br>

                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">السؤال</th>
                                            <th scope="col">الاجابات</th>
                                            <th scope="col">الاجابة الصحيحة</th>
                                            <th scope="col">الدرجة</th>
                                            <th scope="col">اسم الاختبار</th>
                                            <th scope="col">العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($questions as $question)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$question->Title}}</td>
                                                <td>{{$question->Answers}}</td>
                                                <td>{{$question->Right_answer}}</td>
                                                <td>{{$question->Score}}</td>
                                                <td>{{$question->Quizzes->Name}}</td>

                                                <td>
                                                    <a href="{{route('questions.edit',$question->id)}}"

                                                       class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="far fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#delete_exam{{ $question->id }}" title="حذف"><i
                                                            class="fas fa-trash-alt"></i></button>

                                                </td>
                                            </tr>

                                        @include('pages.Teachers.dashboard.Questions.destroy')
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
