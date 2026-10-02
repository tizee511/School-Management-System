<?php
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::group (
  [
    'prefix'     => LaravelLocalization::setLocale (),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student'],
  ],
  function ()
    {

    //==============================dashboard============================
    Route::get ('/student/dashboard', function ()
    {
      return view ('Pages.Students.dashboard');

    });

      
      // Route::resource ('student_exams', 'ExamsController');
      // Route::resource ('profile-student', 'ProfileController');

    }
);

?>