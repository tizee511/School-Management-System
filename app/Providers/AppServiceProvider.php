<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider as  ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    protected $namespace = 'App\Http\Controllers';

    public const HOME    = '/dashboard';
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
