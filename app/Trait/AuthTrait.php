<?php

namespace App\Trait;

use App\Providers\AppServiceProvider;



trait AuthTrait
{
    public function chekGuard ($request)
        {

        if ($request->type == 'student')
            {
            $guardName = 'student';
            }
        elseif ($request->type == 'parent')
            {
            $guardName = 'parent';
            }
        elseif ($request->type == 'teacher')
            {
            $guardName = 'teacher';
            }
        else
            {
            $guardName = 'web';
            }
        return $guardName;
        }

    public function redirect ($request)
        {

        if ($request->type == 'student')
            {
            return redirect ()->intended (AppServiceProvider::STUDENT);
            }
        elseif ($request->type == 'parent')
            {
            return redirect ()->intended (AppServiceProvider::PARENT);
            }
        elseif ($request->type == 'teacher')
            {
            return redirect ()->intended (AppServiceProvider::TEACHER);
            }
        else
            {
            return redirect ()->intended (AppServiceProvider::HOME);
            }
        }
}
