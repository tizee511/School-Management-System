@extends('layouts.master')
@section('css')
@section('title')
 {{ trans('Teacher_trans.Add_Teacher') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
 {{ trans('Teacher_trans.Add_Teacher') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <!--first table -->
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('teacher.store')}}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans('Teacher_trans.Email')}}</label>
                                        <input type="email" name="Email" class="form-control" value="{{ old('Email') }}">

                                        @error('Email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="title">{{trans('Teacher_trans.Password')}}</label>
                                        <input type="password" name="Password" class="form-control" value="{{ old('Password') }}">

                                        @error('Password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans('Teacher_trans.Name_ar')}}</label>
                                        <input type="text" name="Name_ar" class="form-control" value="{{ old('Name_ar') }}">
                                        @error('Name_ar')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="title">{{trans('Teacher_trans.Name_en')}}</label>
                                        <input type="text" name="Name_en" class="form-control" value="{{ old('Name_en') }}">

                                        @error('Name_en')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="inputCity">{{trans('Teacher_trans.specialization')}}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="Specialization_id">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($Specialization as $specialization)
                                                <option value="{{$specialization->id}}"@selected(old('Specialization_id') ==$specialization->id)>
                                                {{$specialization->Name_spec}}</option>
                                            @endforeach
                                        </select>
                                        @error('Specialization_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="inputState">{{trans('Teacher_trans.Gender')}}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="Gender_id">

                                            <option selected disabled >{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($Gender as $gender)
                                                <option value="{{$gender->id}}" @selected(old('Gender_id')== $gender->id )>{{$gender->Name_gend}}</option>
                                            @endforeach
                                        </select>
                                        @error('Gender_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="inputState">{{trans('Teacher_trans.Sections_id_required')}}</label>
                                        <select multiple class="custom-select my-1 mr-sm-2" name="section_id[]" id="exampleFormControlSelect2">



                                            <option selected disabled >{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($sections as $section)

                                                <option value="{{$section->id}}" @selected(old('section_id') == $section->id )>{{ $section->Name_Section }}</option>

                                            @endforeach
                                        </select>
                                        @error('section_id')

                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans('Teacher_trans.Joining_Date')}}</label>
                                        <div class='input-group date'>
                                            <input class="form-control" type="text" id="datepicker-action"
                                                name="Joining_Date" data-date-format="yyyy-mm-dd" required value="{{ old('Joining_Date') }}">
                                        </div>
                                        @error('Joining_Date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">
                                    {{trans('Teacher_trans.Address')}}</label>
                                    <textarea class="form-control" name="Address" value="{{ old('Address') }}" id="exampleFormControlTextarea1"

                                        rows="4"></textarea>
                                    @error('Address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                    type="submit">{{trans('Parent_trans.Next')}}</button>
                            </form>
                        </div>
                    <!-- End Table-->
                    </div>
                    <!-- End card-body -->
                </div>
                <!-- End card card-statistics h-100 -->
            </div>
            <!-- End col-md-12 mb-30 -->
        </div>
        <!-- End row -->
    </div>
    <!-- row closed -->
@endsection
@section('js')
@endsection