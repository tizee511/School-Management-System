@extends('layouts.master')
@section('css')
@section('title')
    قائمة الاسئلة
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    قائمة الاسئلة
@stop
<!-- breadcrumb -->
@endsection
@section('content')
 <style>
  #add {
   padding: 1.25rem 1.5rem;
   font-size: 0.875rem;
   line-height: 0.5;
   border-radius: 1.2rem;
   font-weight: bold;
  }
  </style>
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a id="add" href="{{route('Questions.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">اضافة سؤال جديد</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style=" text-align: center;">
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
                                                    <a href="{{route('Questions.edit',$question->id)}}"
                                                    class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fas fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#delete_question{{ $question->id }}" title="حذف"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                        @include('pages.Questions.destroy')
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
