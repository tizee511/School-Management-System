<style>
li{
    font-weight: bold;
}
</style>
<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start -->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="">
                <ul class="nav navbar-nav side-menu" data-widget="treeview" id="sidebarnav" >
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ url('/') }}">
                            <div class="pull-left"><i class="fa fa-home"></i><span class="right-nav-text">{{
                                    trans('main_trans.Dashboard') }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('main_trans.Programname') }}
                    </li>

                    <!-- Grades-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                            <div class="pull-left"><i class="fa fa-university"></i><span class="right-nav-text">{{
                                    trans('main_trans.Grades') }}</span></div>
                            <div class="pull-right"><i class="fas fa-angle-left right bx-5"></i></div>

                            <div class="clearfix"></div>
                        </a>
                        <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('Grades.index') }}">{{ trans('main_trans.Grades_list') }}</a></li>
                        </ul>
                    </li>

                    <!-- classes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                            <div class="pull-left"><i class="fas fa-building"></i><span class="right-nav-text">{{
                                    trans('main_trans.classes') }}</span></div>
                            <div class="pull-right"><i class="fa fa-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('Classrooms.index') }}">{{ trans('main_trans.List_classes') }}</a>
                            </li>
                        </ul>
                    </li>


                    <!-- sections-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                            <div class="pull-left"><i class="fas fa-book"></i></i><span class="right-nav-text">{{
                                    trans('main_trans.sections') }}</span></div>
                            <div class="pull-right"><i class="fa fa-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('Sections.index') }}">{{ trans('main_trans.List_sections') }}</a>
                            </li>
                        </ul>
                    </li>


                    <!-- students-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu">
                        <i class="fas fa-user-graduate"></i>
                        {{trans('main_trans.students')}}
                            <div class="pull-right"><i class="fa fa-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students-menu" class="collapse">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_information">
                                {{trans('main_trans.Student_information')}}<div class="pull-right"><i class="fa fa-plus"></i></div>
                                <div class="clearfix"></div></a>
                                <ul id="Student_information" class="collapse">
                                    <li> <a href="{{route('students.create')}}">{{trans('main_trans.add_student')}}</a></li>
                                    <li> <a href="{{route('students.index')}}">{{trans('main_trans.list_students')}}</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students_upgrade">
                                {{trans('main_trans.Students_Promotions')}}<div class="pull-right"><i class="fa fa-plus"></i></div>
                                <div class="clearfix"></div></a>
                                <ul id="Students_upgrade" class="collapse">
                                    <li> <a href="{{route('promotions.index')}}">{{trans('main_trans.add_Promotion')}}</a></li>
                                    <li> <a href="{{route('promotions.create')}}">{{trans('main_trans.list_Promotions')}}</a> </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Graduate students">
                                {{trans('main_trans.Graduate_students')}}
                                <div class="pull-right"><i class="fa fa-plus"></i></div><div class="clearfix"></div></a>
                                <ul id="Graduate students" class="collapse">
                                    <li> <a href="{{route('Graduate.create')}}">{{trans('main_trans.add_Graduate')}}</a> </li>
                                    <li> <a href="{{route('Graduate.index')}}">{{trans('main_trans.list_Graduate')}}</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>


                    <!-- Teachers-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                            <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i></i><span class="right-nav-text">{{

                                    trans('main_trans.Teachers') }}</span></div>
                            <div class="pull-right"><i class="fa fa-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="{{ route('teacher.index') }}">{{ trans('main_trans.List_Teachers') }}</a>
                            </li>
                        </ul>
                    </li>


                    <!-- Parents-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                            <div class="pull-left"><i class="fa fa-user-circle"></i><span
                                    class="right-nav-text">{{trans('main_trans.Parents') }}</span></div>
                            <div class="pull-right"><i class="fa fa-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="{{ url('Add_Parent') }}">{{ trans('main_trans.List_Parents') }}</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Accounts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                            <div class="pull-left"><i class="fas fa-money"></i><span class="right-nav-text">{{
                                    trans('main_trans.Accounts') }}</span></div>
                            <div class="pull-right"><i class="fa fa-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('fees.create') }}">{{ trans('main_trans.Add_Fee') }}</a> </li>
                            <li> <a href="{{ route('Fees_Invoices.index') }}">{{ trans('main_trans.List_Fess') }}</a> </li>
                            <li> <a href="{{ route('receipt_students.index') }}">{{ trans('main_trans.List_Receipts') }}</a> </li>
                            <li> <a href="{{ route('processing_fees.index') }}">{{ trans('main_trans.List_Processing_Fees') }}</a> </li>
                            <li> <a href="{{ route('Payment_students.index') }}">{{ trans('main_trans.List_Payments') }}</a> </li>
                        </ul>
                    </li>

                    <!-- Attendance-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
                            <div class="pull-left"><i class="fa fa-calendar"></i><span class="right-nav-text">{{
                                    trans('main_trans.Attendance') }}</span></div>
                            <div class="pull-right"><i class="fa fa-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('Attendance_students.index') }}">{{ trans('main_trans.List_Attendance') }}</a> </li>
                        </ul>
                    </li>

                    <!-- Subjects-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Subjects-icon">
                            <div class="pull-left"><i class="fas fa-book"></i><span class="right-nav-text">{{
                                    trans('main_trans.Subjects') }}</span></div>
                            <div class="pull-right"><i class="fas fa-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Subjects-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('subjects.index') }}">{{ trans('main_trans.List_Subjects') }}</a> </li>
                        </ul>
                    </li>

                    <!-- Quizzes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Quizzes-icon">
                            <div class="pull-left"><i class="fas fa-book"></i><span class="right-nav-text">{{trans('main_trans.Quizzes')}}</span>
                            
                                    </div>
                            <div class="pull-right"><i class="fas fa-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Quizzes-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('quizzes.index') }}">{{ trans('main_trans.List_Quizzes') }}</a> </li>
                            <li> <a href="{{ route('Questions.index') }}"> قائمة الاسئلة </a></li>
                        </ul>
                    </li>

                    <!-- library-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                            <div class="pull-left"><i class="fas fa-book"></i><span class="right-nav-text">{{
                                    trans('main_trans.library') }}</span></div>
                            <div class="pull-right"><i class="fas fa-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('library.index') }}">{{ trans('main_trans.List_Books') }}</a> </li>

                            <li> <a href="{{ route('library.create') }}">{{ trans('main_trans.Add_Book') }}</a> </li>
                        </ul>9
                    </li>


                    <!-- Onlinec lasses-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                            <div class="pull-left"><i class="fa fa-video-camera"></i><span class="right-nav-text">{{
                                    trans('main_trans.Onlineclasses') }}</span></div>
                            <div class="pull-right"><i class="fa fa-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                        <li> <a href="{{ route('online_classes.index') }}">حصص اونلاين مع زوم</a> </li>  
                        </ul>
                    </li>


                    <!-- Settings-->
                    <li>
                            <a href="{{route('settings.index')}}"><i class="fas fa-cogs"></i><span class="right-nav-text">{{trans('main_trans.Settings')}} </span></a>

                    </li>



                    <!-- Users-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-icon">
                            <div class="pull-left"><i class="fa fa-users"></i><span class="right-nav-text">{{
                                    trans('main_trans.Users') }}</span></div>
                            <div class="pull-right"><i class="fa fa-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Users-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Left Sidebar End-->
        <!--=================================?>
