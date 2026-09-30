<?php

namespace App\Http\Middleware;

use App\Providers\AppServiceProvider;
use Closure;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    
    public function handle(Request $request, Closure $next): Response
    {
        if (auth ('web')->check ())
            {
            return redirect (AppServiceProvider::HOME);
            }

        if (auth ('student')->check ())
            {
            return redirect (AppServiceProvider::STUDENT);
            }

        if (auth ('teacher')->check ())
            {
            return redirect (AppServiceProvider::TEACHER);
            }

        if (auth ('parent')->check ())
            {
            return redirect (AppServiceProvider::PARENT);
            }

        return $next($request);
    }
}
