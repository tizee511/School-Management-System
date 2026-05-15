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
        $this->app->bind(
            'App\Repository\Teachers\TeacherRepositoryInterface',
            'App\Repository\Teachers\TeacherRepository',
        );
        $this->app->bind(
            'App\Repository\Students\StudentRepositoryInterface',
            'App\Repository\Students\StudentRepository',
        );
        $this->app->bind(
            'App\Repository\Students\promotions\StudentPromotionRepositoryInterface',
            'App\Repository\Students\promotions\StudentPromotionRepository',
        );
        $this->app->bind(
            'App\Repository\Students\Graduated\StudentGraduatedRepositoryInterface',
            'App\Repository\Students\Graduated\StudentGraduatedRepository',
        );
        $this->app->bind(
            'App\Repository\Students\Fees\FeesRepositoryInterface',
            'App\Repository\Students\Fees\FeesRepository',
        );
        $this->app->bind(
            'App\Repository\Students\Fee_invoices\FeesInvoicesRepositoryInterface',
            'App\Repository\Students\Fee_invoices\FeesInvoicesRepository',
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
