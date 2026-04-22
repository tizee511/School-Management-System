@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-8">
   <div class="card">
    <div class="card-header">{{ trans('auth_trans.Verify_Your_Email_Address') }}</div>

    <div class="card-body">
     @if (session('resent'))
     <div class="alert alert-success" role="alert">
      {{ trans('auth_trans.Verification_link_sent') }}
     </div>
     @endif

     {{ trans('auth_trans.Before_proceeding') }}
     {{ trans('auth_trans.If_you_did_not_receive_the_email') }},
     <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
      @csrf
      <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ trans('auth_trans.click_here_to_request_another') }}</button>.
     </form>
    </div>
   </div>
  </div>
 </div>
</div>
@endsection
