@extends('layouts.master')
@section('css')
@section('title')
    {{ trans ('Teacher_trans.Edit_Teacher') }}
    @stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans ('Teacher_trans.Edit_Teacher') }}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @if(session ()->has ('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session ()->get ('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route ('teacher.update', 'test')}}" method="post">
                                {{method_field ('patch')}}
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans ('Teacher_trans.email')}}</label>
                                        <input type="hidden" value="{{$Teachers->id}}" name="id">
                                        
                                        <input type="email" name="email" value="{{$Teachers->email}}" class="form-control">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="title">{{trans ('Teacher_trans.password')}}</label>
                                        <input type="password" name="password" value="{{!empty($Teachers->password)? '' : $Teachers->password}}"
                                            class="form-control">
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans ('Teacher_trans.Name_ar')}}</label>
                                        <input type="text" name="Name_ar"
                                            value="{{old('Name_ar',$Teachers->getTranslation ('Name', 'ar')) }}" class="form-control">
                                        @error('Name_ar')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="title">{{trans ('Teacher_trans.Name_en')}}</label>
                                        <input type="text" name="Name_en"
                                            value="{{ old('Name_en',$Teachers->getTranslation('Name', 'en'))}}" class="form-control">

                                        @error('Name_en')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="inputCity">{{trans ('Teacher_trans.specialization')}}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="Specialization_id">
                                            <option value="{{$Teachers->Specialization_id}}">
                                                {{$Teachers->specializations->Name_spec}}</option>
                                            @foreach($specializations as $specialization)
                                                <option value="{{$specialization->id}}" @selected(old('Specialization_id')==$specialization->id)> {{$specialization->Name_spec}}</option>

                                            @endforeach
                                        </select>
                                        @error('Specialization_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label for="inputState">{{trans ('Teacher_trans.Gender')}}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="Gender_id">
                                            <option value="{{$Teachers->Gender_id}}">
                                                {{$Teachers->genders->Name_gend}}
                                            </option>
                                            @foreach($genders as $gender)
                                                <option value="{{$gender->id}}" @selected(old ('Gender_id') == $gender->id)>
                                                    {{$gender->Name_gend}}</option>

                                            @endforeach
                                        </select>
                                        @error('Gender_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputName" class="control-label">{{trans('Teacher_trans.Sections_id_required') }}</label>
                                    <select multiple name="section_id[]" class="form-control" id="exampleFormControlSelect2">
                                        {{-- تحدد لي الاقسام التي تم اختيارهم سابقا --}}
                                        @foreach($Teachers->Sections as $section)
                                        <option selected value="{{$section['id']}}">{{$section['Name_Section']}}</option>

                                        @endforeach
                                        {{-- تجيب جميع الافسام التي تم تخزينها    --}}
                                        @foreach($sections as $section)
                                        <option value="{{$section->id}}">{{$section->Name_Section}}</option>
                                        @endforeach
                                    </select>
                                        @error('section_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="title">{{trans ('Teacher_trans.Joining_Date')}}</label>
                                        <div class='input-group date'>
                                            <input class="form-control" type="text" id="datepicker-action"
                                                value="{{$Teachers->Joining_Date}}" name="Joining_Date"
                                                data-date-format="yyyy/mm/dd" required>
                                        </div>
                                        @error('Joining_Date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">{{trans ('Teacher_trans.Address')}}</label>
                                    <textarea class="form-control" name="Address" id="exampleFormControlTextarea1" rows="4">
                                    {{ old('Address',$Teachers->Address)}}</textarea>
                                    @error('Address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                    type="submit">{{trans ('Parent_trans.Next')}}</button>
                            </form>
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