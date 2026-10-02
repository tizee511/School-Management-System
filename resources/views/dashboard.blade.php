<!DOCTYPE html>
<html lang="en">
<head>
    {{-- @livewireStyles --}}
</head>
<body>
@extends('layouts.master')
@section('page-header')
    <div class="page-title d-flex justify-content-between align-items-center mt-5">
        <div>
            <h4 class="mt-3">{{ trans ('dashboard_trans.Dashboard_page') }}</h4>
            <span class="font-medium">{{ trans ('dashboard_trans.Welcome_message', ['name' => auth ()->user ()->name ?? ''])}}</span>
        </div>
    </div>
@endsection

@section('content')
    <!-- main-content -->
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">لوحة تحكم الادمن</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
            </ol>
        </div>
    </div>

    <!-- widgets -->
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <span class="text-success">
                                <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">عدد الطلاب</p>
                            <h4>{{\App\Models\Student::count ()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                    {{-- route('student.index')  --}}
                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="#"


                            target="_blank"><span class="text-danger">عرض البيانات</span></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <span class="text-warning">
                                <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">عدد المعلمين</p>
                            <h4>{{\App\Models\Teacher::count ()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route ('teacher.index')}}"
                            target="_blank"><span class="text-danger">عرض البيانات</span></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <span class="text-success">
                                <i class="fas fa-user-tie highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">عدد اولياء الامور</p>
                            <h4>{{\App\Models\MyParent::count ()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{url ('Add_Parent')}}"
                            target="_blank"><span class="text-danger">عرض البيانات</span></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <span class="text-primary">
                                <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">عدد الفصول الدراسية</p>
                            <h4>{{\App\Models\Section::count ()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route ('Sections.index')}}"
                            target="_blank"><span class="text-danger">عرض البيانات</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Orders Status widgets-->

    <div class="row">
        <div style="height: 400px;" class="col-xl-12 mb-30">
            <div class="card-body">
                <div class="tab nav-border" style="position: relative;">
                    <div class="d-block d-md-flex justify-content-between">
                        <div class="d-block w-100">
                            <h5 style="font-family: 'Cairo', sans-serif" class="card-title">اخر العمليات علي النظام</h5>
                        </div>
                        <div class="d-block d-md-flex nav-tabs-custom">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active show" id="students-tab" data-toggle="tab" href="#students"
                                        role="tab" aria-controls="students" aria-selected="true"> الطلاب</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers" role="tab"
                                        aria-controls="teachers" aria-selected="false">المعلمين
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents" role="tab"
                                        aria-controls="parents" aria-selected="false">اولياء الامور
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="fee_invoices-tab" data-toggle="tab" href="#fee_invoices"
                                        role="tab" aria-controls="fee_invoices" aria-selected="false">الفواتير
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- ----------------------- --}}
                    <div class="tab-content" id="myTabContent">
                        {{--students Table--}}
                        <div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
                            <div class="table-responsive mt-15">
                                <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                    <thead>
                                        <tr class="table-info text-danger">
                                            <th>#</th>
                                            <th>اسم الطالب</th>
                                            <th>البريد الالكتروني</th>
                                            <th>النوع</th>
                                            <th>المرحلة الدراسية</th>
                                            <th>الصف الدراسي</th>
                                            <th>القسم</th>
                                            <th>تاريخ الاضافة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse(\App\Models\Student::latest ()->take (5)->get () as $student)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$student->Name}}</td>

                                                <td>{{$student->email}}</td>
                                                <td>{{$student->Gender->Name_gend}}</td>


                                                <td>{{$student->Grades->Name}}</td>


                                                <td>{{$student->Classrooms->Name_class}}</td>

                                                <td>{{$student->Sections->Name_Section}}</td>

                                                <td class="text-success">{{$student->created_at}}</td>
                                        @empty
                                                    <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                                </tr>
                                            @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{--teachers Table--}}
                        <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                            <div class="table-responsive mt-15">
                                <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                    <thead>
                                        <tr class="table-info text-danger">
                                            <th>#</th>
                                            <th>اسم المعلم</th>
                                            <th>النوع</th>
                                            <th>تاريخ التعين</th>
                                            <th>التخصص</th>
                                            <th>تاريخ الاضافة</th>
                                        </tr>
                                    </thead>

                                    @forelse(\App\Models\Teacher::latest ()->take (5)->get () as $teacher)
                                        <tbody>
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$teacher->Name}}</td>
                                                <td>{{$teacher->genders->Name}}</td>
                                                <td>{{$teacher->Joining_Date}}</td>
                                                <td>{{$teacher->specializations->Name}}</td>
                                                <td class="text-success">{{$teacher->created_at}}</td>
                                    @empty
                                                        <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                                    </tr>
                                                </tbody>
                                            @endforelse
                                </table>
                            </div>
                        </div>
                        {{--parents Table--}}
                        <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                            <div class="table-responsive mt-15">
                                <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                    <thead>
                                        <tr class="table-info text-danger">
                                            <th>#</th>
                                            <th>اسم ولي الامر</th>
                                            <th>البريد الالكتروني</th>
                                            <th>رقم الهوية</th>
                                            <th>رقم الهاتف</th>
                                            <th>تاريخ الاضافة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse(\App\Models\MyParent::latest ()->take (5)->get () as $parent)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$parent->Name_Father}}</td>
                                                <td>{{$parent->email}}</td>
                                                <td>{{$parent->National_ID_Father}}</td>
                                                <td>{{$parent->Phone_Father}}</td>
                                                <td class="text-success">{{$parent->created_at}}</td>
                                        @empty
                                                    <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                                </tr>
                                            @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{--sections Table--}}
                        <div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
                            <div class="table-responsive mt-15">
                                <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                    <thead>
                                        <tr class="table-info text-danger">
                                            <th>#</th>
                                            <th>تاريخ الفاتورة</th>
                                            <th>اسم الطالب</th>
                                            <th>المرحلة الدراسية</th>
                                            <th>الصف الدراسي</th>
                                            <th>القسم</th>
                                            <th>نوع الرسوم</th>
                                            <th>المبلغ</th>
                                            <th>تاريخ الاضافة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse(\App\Models\Fees_Invoice::latest ()->take (10)->get () as $section)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$section->Invoice_date}}</td>

                                                <td>{{$section->classroom->Name_Class}}</td>

                                                <td class="text-success">{{$section->created_at}}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="alert-danger" colspan="9">لاتوجد بيانات</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- ---------------- --}}
                    </div>
                    {{-- ----------------- --}}
                </div>
            </div>
        </div>
    </div>
    <BR>

    <!-- Site Visits Growth & Best Selling Items -->


    <div class="row">
        <div class="col-xl-4 mb-30">
            <div class="card card-statistics h-100">
                <!-- action group -->
                <div class="btn-group info-drop">
                    <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><i class="text-primary ti-reload"></i>Refresh</a>
                        <a class="dropdown-item" href="#"><i class="text-secondary ti-eye"></i>View
                            all</a>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Market summary</h5>
                    <h4>$50,500 </h4>
                    <div class="row mt-20">
                        <div class="col-4">
                            <h6>Apple</h6>
                            <b class="text-info">+ 82.24 % </b>
                        </div>
                        <div class="col-4">
                            <h6>Instagram</h6>
                            <b class="text-danger">- 12.06 % </b>
                        </div>
                        <div class="col-4">
                            <h6>Google</h6>
                            <b class="text-warning">+ 24.86 % </b>
                        </div>
                    </div>
                </div>
                <div id="sparkline2" class="scrollbar-x text-center"></div>
            </div>
        </div>
        <div class="col-xl-8 mb-30">
            <div class="card h-100">
                <div class="btn-group info-drop">
                    <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><i class="text-primary ti-reload"></i>Refresh</a>
                        <a class="dropdown-item" href="#"><i class="text-secondary ti-eye"></i>View
                            all</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-block d-md-flexx justify-content-between">
                        <div class="d-block">
                            <h5 class="card-title">Site Visits Growth </h5>
                        </div>
                        <div class="d-flex">
                            <div class="clearfix mr-30">
                                <h6 class="text-success">Income</h6>
                                <p>+584</p>
                            </div>
                            <div class="clearfix  mr-50">
                                <h6 class="text-danger"> Outcome</h6>
                                <p>-255</p>
                            </div>
                        </div>
                    </div>
                    <div id="morris-area" style="height: 320px;"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Customer Feedback & Best Sellers -->
@livewire('calendar')
    <br>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-3">{{ trans ('dashboard_trans.Overview_title') }}</h5>
                    <p class="text-muted">{{ trans ('dashboard_trans.Overview_text') }}</p>
                </div>
            </div>
        </div>
    </div>
{{-- @include('layouts.footer-scripts') --}}
@endsection
</body>
</html>

