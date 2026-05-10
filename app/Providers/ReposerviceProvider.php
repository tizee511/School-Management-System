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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
