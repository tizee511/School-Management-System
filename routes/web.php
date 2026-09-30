<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Library\LibraryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Section\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Students\Attendance\AttendanceController;
use App\Http\Controllers\Students\Fees\FeeController;
use App\Http\Controllers\Students\FeesInvoices\FeesInvoicesController;
use App\Http\Controllers\Students\Graduated\GraduatedController;
use App\Http\Controllers\Students\Payment\PaymentController;
use App\Http\Controllers\Students\Processing\ProcessingFeeController;
use App\Http\Controllers\Students\promotions\PromotionController;
use App\Http\Controllers\Students\Question\QuestionController;
use App\Http\Controllers\Students\Quizzes\QuizzeController;
use App\Http\Controllers\Students\Receipts\ReceiptStudentsController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\ZoomMeetingController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// require __DIR__ . '/auth.php';
Route::get ('/', [HomeController::class, 'index'])->name ('selection');

// Route::group( 'Auth',function () {
//     Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
//     Route::post('/register', [RegisteredUserController::class, 'store']);
//     // Route::get('/login/{type}', [LoginController::class, 'loginForm'])->name('login.show');
//     // Route::post('/login', [LoginController::class, 'login'])->name('login');
    
//     });
    // Route::get ('/register', [RegisteredUserController::class, 'create'])->name ('register');
    // Route::get ('/register', [RegisteredUserController::class, 'store']);
    Route::group(['Auth'],function () {
        
        Route::get ('/login/{type}', [LoginController::class, 'loginForm'])->middleware ('guest')->name ('login.show');
        
        Route::post ('/login', [LoginController::class, 'login'])->name('logIN');
        
        Route::get('/logout/{type}', [LoginController::class, 'logout'])->name('logout');
        });
        
               
        

// Route::group(
//     ['middleware' => ['guest']],
//     function () {
//         Route::get('/', function () {
//             return view('auth.login');
//         });
//     }
// );
// Route::get('/dashboard', function () {
    
//     return Auth::check()
//         ? redirect(LaravelLocalization::localizeUrl('/dashboard'))
//         : redirect(LaravelLocalization::localizeUrl('/login'));
// });
//* ==============================Translate all pages============================
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
], function () {
    // Route::get('/', function () {
    //     return Auth::check()
    //         ? redirect()->route('dashboard')
    //         : redirect()->route('login');
    // });
    //*========================={Dashboard}========================
    Route::get('/dashboard', [HomeController::class, 'dashboard'])
        ->name('dashboard');
    //*========================={Profile}========================
    Route::middleware(['auth'])->group(function () {
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
        Route::get('/classes/{id}', [SectionController::class, 'getclasses'])->name('classes.get');
        //*========================={Parents}========================
        Route::view('Add_Parent', 'livewire.show_form');
        //*========================={Teachers}========================
        Route::resource('teacher',TeacherController::class);
        //*========================={Sutdentes}========================
        Route::resource('/students',StudentController::class);
        Route::get('/Get_classrooms/{id}',[StudentController::class,'Get_classrooms']);
        Route::get('/Get_Sections/{id}',[StudentController::class,'Get_Sections']);
        Route::get('Graduated_student_one/{id}',[StudentController::class,'Graduated_student_one'])->name('Graduated_student_one');
        Route::post('/Upload_attachment',[StudentController::class,'Upload_attachment'])->name('Upload_attachment');
        Route::get('Download_attachment/{studentsname}/{filename}',[StudentController::class,'Download_attachment'])->name('Download_attachment');
        Route::post('/Delete_attachment',[StudentController::class,'Delete_attachment'])->name('Delete_attachment');
        //*========================={Students}========================
        // *----------------(Promotions Students)----------------
        Route::resource('promotions',PromotionController::class);  
        // *----------------(Graduated Students)----------------
        Route::resource('Graduate',GraduatedController::class);        
        // *----------------(Fees Students)----------------
        Route::resource ('fees', FeeController::class);
        // *----------------(Fees_Invoice Students)----------------
        Route::resource ('Fees_Invoices', FeesInvoicesController::class);
        // *----------------(Receipts_Students)----------------
        Route::resource ('receipt_students', ReceiptStudentsController::class);
        // *----------------(Processing_Fees_Students)-------------------------
        Route::resource('processing_fees', ProcessingFeeController::class);
        // *----------------(Payment_Students)-------------------------
        Route::resource('Payment_students', PaymentController::class);
        // *----------------(Attendance_Students)-------------------------
        Route::resource('Attendance_students', AttendanceController::class);
        //*========================={Subjects}========================
        Route::resource('subjects',SubjectController::class);
        //*========================={Quizzes}==============
        Route::resource('quizzes',QuizzeController::class);
        // *----------------------(Questions)-------------------
        Route::resource('Questions',QuestionController::class);
        //*========================={Library}==============
        Route::get ('download_file/{filename}', 'LibraryController@downloadAttachment')->name ('downloadAttachment');
        // *----------------------(Questions)-------------------
        Route::resource('library',LibraryController::class);
        //*========================={Setting}==============
        Route::resource('settings', SettingController::class);

        Route::get('online_classes', [ZoomMeetingController::class, 'index'])->name('online_classes.index');
        Route::get('online_classes/create', [ZoomMeetingController::class, 'create'])->name('online_classes.create');
        Route::get('online_classes/indirectCreate', [ZoomMeetingController::class, 'indirectCreate'])->name('indirect.create');
        Route::post('online_classes/store', [ZoomMeetingController::class, 'store'])->name('online_classes.store');
        Route::post('online_classes/destroy', [ZoomMeetingController::class, 'destroy'])->name('online_classes.destroy');

        });
        

});
