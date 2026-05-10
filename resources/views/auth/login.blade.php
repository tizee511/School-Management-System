@extends('layouts.auth')

@section('title', trans('auth_trans.Login'))
@section('authBackground', 'assets/images/login-bg.jpg')
@section('authInnerBackground', 'assets/images/login-inner-bg.jpg')
@section('formTitle', trans('auth_trans.Welcome_Back'))
@section('formSubtitle', trans('auth_trans.Please_sign_in'))

@section('content')
@if (session('status'))
<div class="alert alert-success mb-4">{{ session('status') }}</div>
@endif

@if ($errors->any())
<div class="alert alert-danger mb-4">
 <ul class="mb-0">
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif

<form method="POST" action="{{ route('login') }}" onsubmit="document.getElementById('login-preloader').style.display='flex';">
 @csrf

 <div class="form-group mb-3">
  <label for="email" class="form-label">{{ trans('auth_trans.Email') }}</label>

  <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control form-control-lg" autocomplete="username" placeholder="{{ trans('auth_trans.Email_placeholder') }}">
  @error('email')
  <span class="text-danger">{{ $message }}</span>
  @enderror
 </div>

 <div class="form-group mb-3">
  <label for="password" class="form-label">{{ trans('auth_trans.Password') }}</label>
  <input id="password" type="password" name="password" required class="form-control form-control-lg" autocomplete="current-password" placeholder="{{ trans('auth_trans.Password_placeholder') }}">
  @error('password')
  <span class="text-danger">{{ $message }}</span>
  @enderror
 </div>

 <div class="row align-items-center mb-4">
  <div class="col-sm-6">
   <div class="form-check">
    <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
    <label class="form-check-label" for="remember_me">{{ trans('auth_trans.Remember_me') }}</label>
   </div>
  </div>
  <div class="col-sm-6 text-sm-end">
   @if (Route::has('password.request'))
   <a href="{{ route('password.request') }}" class="text-muted small">{{ trans('auth_trans.Forgot_password') }}</a>
   @endif
  </div>
 </div>

 <button type="submit" class="btn btn-primary btn-lg w-100 py-2">{{ trans('auth_trans.Login') }}</button>
</form>

<div class="text-center mt-4">
 <span class="text-muted">{{ trans('auth_trans.Dont_have_an_account') }}</span>
 <a href="{{ route('register') }}" class="text-primary">{{ trans('auth_trans.Register') }}</a>
</div>

<div id="login-preloader" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(255,255,255,0.9);z-index:99999;align-items:center;justify-content:center;">
    <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="Loading..." style="max-width:120px;" />
</div>
@endsection
