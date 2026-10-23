<?php
use App\Http\Controllers\Students\dashboard\ExamsController;
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
      // return 'ok student';
      return view ('Pages.Students.dashboard');

    });

      
      Route::resource ('student_exams', ExamsController::class);
      // Route::resource ('profile-student', 'ProfileController');
  });

?>