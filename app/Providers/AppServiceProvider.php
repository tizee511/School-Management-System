<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
   

    public const HOME    = '/';
    public const STUDENT = '/student/dashboard';
    public const TEACHER = 'dashboard';
    public const PARENT  = '/dashboard';
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
