<?php
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::group (
  [
    'prefix'     => LaravelLocalization::setLocale (),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher'],
  ],
  function ()
    {

    //==============================dashboard============================
    Route::get ('/teacher/dashboard', function ()
      {
      // Route::get ('/student', [StudentController::class, 'index'])->name ('student.index');
      $ids                    = Teacher::findorFail (auth ()->user ()->id)->Sections ()->pluck ('teacher_section');
      return $ids;
      $data['count_sections'] = $ids->count ();
      $data['count_students'] = Student::whereIn ('section_id', $ids)->count ();

      //        $ids = DB::table('teacher_section')->where('teacher_id',auth()->user()->id)->pluck('section_id');
//        $count_sections =  $ids->count();
//        $count_students = DB::table('students')->whereIn('section_id',$ids)->count();
      // return view ('Pages.Teachers.dashboard.dashboard', $data);
  
      // Route::group (['namespace' => 'Teachers\dashboard'], function ()
      //   {
      //   //==============================students============================
       

      //   });
      // }); 
      // 
      });

    //==============================dashboard============================
    // Route::get ('/teacher/dashboard', function ()
    //   {
    //   return view ('pages.Teachers.dashboard.dashboard');
    //   });
    }
  );