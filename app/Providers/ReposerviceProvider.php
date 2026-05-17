<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ReposerviceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Teachers
        $this->app->bind(
            'App\Repository\Teachers\TeacherRepositoryInterface',
            'App\Repository\Teachers\TeacherRepository',
        );
        // Students
        $this->app->bind(
            'App\Repository\Students\StudentRepositoryInterface',
            'App\Repository\Students\StudentRepository',
        );
        // Sections
        $this->app->bind(
            'App\Repository\Students\promotions\StudentPromotionRepositoryInterface',
            'App\Repository\Students\promotions\StudentPromotionRepository',
        );
        // Graduated
        $this->app->bind(
            'App\Repository\Students\Graduated\StudentGraduatedRepositoryInterface',
            'App\Repository\Students\Graduated\StudentGraduatedRepository',
        );
        // Fees
        $this->app->bind(
            'App\Repository\Students\Fees\FeesRepositoryInterface',
            'App\Repository\Students\Fees\FeesRepository',
        );
        // Fee Invoices
        $this->app->bind(
            'App\Repository\Students\Fee_invoices\FeesInvoicesRepositoryInterface',
            'App\Repository\Students\Fee_invoices\FeesInvoicesRepository',
        );
        // Receipts
        $this->app->bind(
            'App\Repository\Students\Receipts\ReceiptStudentsRepositoryInterface',
            'App\Repository\Students\Receipts\ReceiptStudentsRepository',
        );
        // Processing Fees
        $this->app->bind(
            'App\Repository\Students\Processing_Fees\ProcessingFeeRepositoryInterface',
            'App\Repository\Students\Processing_Fees\ProcessingFeeRepository',
        );
        // Payments
        $this->app->bind(
            'App\Repository\Students\PaymentStudents\PaymentRepositoryInterface',
            'App\Repository\Students\PaymentStudents\PaymentRepository',
        );
        // Attendances
        $this->app->bind(
            'App\Repository\Students\Attendances\AttendanceRepositoryInterface',
            'App\Repository\Students\Attendances\AttendanceRepository',
        );
        // Subjects
        $this->app->bind(
            'App\Repository\Subjects\SubjectRepositoryInterface',
            'App\Repository\Subjects\SubjectRepository',
        );


    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
