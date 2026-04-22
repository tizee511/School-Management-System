<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Section\SectionController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {
    return Auth::check()
        ? redirect(LaravelLocalization::localizeUrl('/dashboard'))
        : redirect(LaravelLocalization::localizeUrl('/login'));
});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::get('/', function () {
        return Auth::check()
            ? redirect()->route('dashboard')
            : redirect()->route('login');
    });

    require __DIR__ . '/auth.php';
    //*========================={Dashboard}========================
    Route::get('/dashboard', [HomeController::class, 'index'])
        ->middleware(['auth'])
        ->name('dashboard');
    //*========================={Auth}========================
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        //*========================={Grades}========================
        Route::resource('Grades', GradeController::class);
        //*========================={Classrooms}========================
        Route::resource('Classrooms', ClassroomController::class);
        Route::post('delete_all', [ClassroomController::class, 'delete_all'])->name('delete_all');
        Route::post('Filter_Classes', [ClassroomController::class, 'Filter_Classes'])->name('Filter_Classes');
        //*========================={Sections}========================
        Route::resource('Sections', controller: SectionController::class);
        //*========================={Parents}========================
        Route::view('/Parents', 'livewire.show_form')
            ->middleware('auth');
        //*========================={Classes}========================
        Route::get('/classes/{id}', [SectionController::class, 'getclasses'])->name('classes.get');
    });
    //*========================={Sutdentes}========================

    //*========================={Sutdentes}========================

});
