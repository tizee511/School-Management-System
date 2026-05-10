<!DOCTYPE html>
<html lang="ar">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="csrf-token" content="{{ csrf_token() }}">
 @include('layouts.head')
 @yield('css')
</head>
<body>
 <section class="height-100vh d-flex align-items-center page-section-ptb login" style="background-image: url('{{ asset(trim($__env->yieldContent('authBackground')) ?: 'assets/images/login-bg.jpg') }}');">
  <div class="container">
   <div class="row align-items-center justify-content-center">
    <div class="col-lg-5 col-md-7">
     <div class="login-fancy pb-40 clearfix shadow-lg rounded-4 overflow-hidden">
      <div class="login-fancy-bg bg" style="background-image: url('{{ asset(trim($__env->yieldContent('authInnerBackground')) ?: 'assets/images/login-inner-bg.jpg') }}');"></div>
      <div class="login-fancy-form p-5 bg-white">
       <div class="text-center mb-4">
        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="Logo" class="mb-3" style="max-width: 140px;">
        <h2 class="mb-2">@yield('formTitle', 'Welcome Back')</h2>
        <p class="text-muted mb-0">@yield('formSubtitle', 'Sign in to continue to your dashboard.')</p>
       </div>
       @yield('content')
      </div>
     </div>
    </div>
   </div>
  </div>
 </section>
 @include('layouts.footer-scripts')
</body>
</html>
