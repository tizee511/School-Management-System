<?php

use App\Http\Controllers\Teacher\dashboard\ProfileController;
use App\Http\Controllers\Teacher\dashboard\Question\QuestionController;
use App\Http\Controllers\Teacher\dashboard\Quizz\QuizzController;
use App\Http\Controllers\Teacher\dashboard\StudentController;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group (
  [
   'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:teacher']
  ],
function ()
    {

    //*==============================dashboard============================
    Route::get ('/teacher/dashboard', function ()
      {

        $ids                    = Teacher::findorFail (auth ()->user ()->id)->Sections ()->pluck ('section_id');
        $data['count_sections'] = $ids->count ();
        $data['count_students'] = Student::whereIn ('section_id', $ids)->count ();
        // return $data;
        
        //        $ids = DB::table('teacher_section')->where('teacher_id',auth()->user()->id)->pluck('section_id');
        //        $count_sections =  $ids->count();
        //        $count_students = DB::table('students')->whereIn('section_id',$ids)->count();
        return view ('Pages.Teachers.dashboard.dashboard',$data);
      });

      Route::resource ('teacherQuizzes', QuizzController::class);
        Route::get ('/student', [StudentController::class, 'index'])->name ('student.index');
        Route::get ('sections', [StudentController::class,'sections'])->name ('sections');
        Route::post ('attendance',[StudentController::class,'attendance'])->name ('attendance');
        Route::get ('attendance_report', [StudentController::class,'attendanceReport'])->name ('attendance.report');
        Route::post ('attendance_report', [StudentController::class,'attendanceSearch'])->name ('attendance.search');
        Route::get ('/Get_classrooms/{id}', [StudentController::class, 'Get_classrooms'])->name ('classesteacher.get');
        Route::get ('/Get_Sections/{id}', [StudentController::class, 'Get_Sections'])->name ('classes.gett');
        Route::resource ('questions', QuestionController::class);
    //*==============================ZOOM============================
      // Route::resource ('online_zoom_classes', 'OnlineZoomClassesController');
      // Route::get ('/indirect', 'OnlineZoomClassesController@indirectCreate')->name ('indirect.teacher.create');
      // Route::post ('/indirect', 'OnlineZoomClassesController@storeIndirect')->name ('indirect.teacher.store');
    //*==============================profile============================
      Route::get ('profile/teacher', [ProfileController::class,'index'])->name ('profile.show');
      Route::post ('profile/{id}',[ProfileController::class,'update'])->name ('profile.update');

      // Route::get ('student_quizze/{id}', 'QuizzController@student_quizze')->name ('student.quizze');
      // Route::post ('repeat_quizze', 'QuizzController@repeat_quizze')->name ('repeat.quizze');
     });     

    // });

// require __DIR__ . '/auth.php';


