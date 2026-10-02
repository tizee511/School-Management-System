@extends('layouts.auth')

@section('title', trans('auth_trans.Register'))
@section('authBackground', 'assets/images/register-bg.jpg')
@section('authInnerBackground', 'assets/images/register-inner-bg.jpg')
@section('formTitle', trans('auth_trans.Create_Your_Account'))
@section('formSubtitle', trans('auth_trans.Register_subtitle'))

@section('content')
@if ($errors->any())
<div class="alert alert-danger mb-4">
 <ul class="mb-0">
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif

<form method="POST" action="{{ route('register') }}">
 @csrf

 <div class="form-group mb-3">
  <label for="name" class="form-label">{{ trans('auth_trans.Name') }}</label>
  <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="form-control form-control-lg" autocomplete="name" placeholder="{{ trans('auth_trans.Name_placeholder') }}">
  @error('name')
  <span class="text-danger">{{ $message }}</span>
  @enderror
 </div>

 <div class="form-group mb-3">
  <label for="email" class="form-label">{{ trans('auth_trans.email') }}</label>
  <input id="email" type="email" name="email" value="{{ old('email') }}" required class="form-control form-control-lg" autocomplete="username" placeholder="{{ trans('auth_trans.email_placeholder') }}">
  @error('email')
  <span class="text-danger">{{ $message }}</span>
  @enderror
 </div>

 <div class="form-group mb-3">
  <label for="password" class="form-label">{{ trans('auth_trans.password') }}</label>
  <input id="password" type="password" name="password" required class="form-control form-control-lg" autocomplete="new-password" placeholder="{{ trans('auth_trans.password_placeholder') }}">
  @error('password')
  <span class="text-danger">{{ $message }}</span>
  @enderror
 </div>

 <div class="form-group mb-4">
  <label for="password_confirmation" class="form-label">{{ trans('auth_trans.Confirm_password') }}</label>
  <input id="password_confirmation" type="password" name="password_confirmation" required class="form-control form-control-lg" autocomplete="new-password" placeholder="{{ trans('auth_trans.password_placeholder') }}">
  @error('password_confirmation')
  <span class="text-danger">{{ $message }}</span>
  @enderror
 </div>

 <button type="submit" class="btn btn-primary btn-lg w-100 py-2">{{ trans('auth_trans.Register') }}</button>

 <div class="text-center mt-4">
  <span class="text-muted">{{ trans('auth_trans.Already_registered') }}</span>
  <a href="#" class="text-primary">{{ trans('auth_trans.Login') }}</a>
 </div>
</form>
@endsection
