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
        elseif ($request->type == 'teacher')
            {
            $guardName = 'teacher';
            }
        elseif ($request->type == 'parent')
            {
            $guardName = 'parent';
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
        elseif ($request->type == 'teacher')
            {
            return redirect ()->intended (AppServiceProvider::TEACHER);
            }
        elseif ($request->type == 'parent')
            {
            return redirect ()->intended (AppServiceProvider::PARENT);
            }
        
        else
            {
            return redirect ()->intended (AppServiceProvider::HOME);
            }
        }
}
