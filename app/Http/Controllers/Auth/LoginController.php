<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Trait\AuthTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
    {
    // use AuthenticatesUsers;
    use AuthTrait;

    protected $redirectTo = '/';
    public function __construct ()
    {
        $this->middleware ('guest')->except ('logout');
        // $this->middleware('auth')->only('logout');
    }

    public function loginForm ($type)
        {

        return view ('auth.login', compact ('type'));
        }

    public function login (Request $request)
        {
           

        if (Auth::guard ($this->chekGuard ($request))->attempt (['email' => $request->email, 'password' => $request->password]))
            {
               return $this->redirect ($request);
            }
        else
            {
                return back ()->withInput ()->withErrors (['email' => 'These credentials do not match our records.']);

        }
        }

    public function logout (Request $request, $type)
        {
            // return $type;
        Auth::guard ($type)->logout ();

        $request->session ()->invalidate ();

        $request->session ()->regenerateToken ();

        return redirect ('/');
        }

    
    }
