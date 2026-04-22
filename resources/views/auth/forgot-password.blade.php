<x-guest-layout>
 <div class="mb-4 text-sm text-gray-600">
  {{ trans('auth_trans.Forgot_password') }} {{ trans('auth_trans.Reset_Password_Message') }}
 </div>

 <!-- Session Status -->
 <x-auth-session-status class="mb-4" :status="session('status')" />

 <form method="POST" action="{{ route('password.email') }}">
  @csrf

  <!-- Email Address -->
  <div>
   <x-input-label for="email" :value="trans('auth_trans.Email')" />
   <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="{{ trans('auth_trans.Email_placeholder') }}" />
   <x-input-error :messages="$errors->get('email')" class="mt-2" />
  </div>

  <div class="flex items-center justify-end mt-4">
   <x-primary-button>
    {{ trans('auth_trans.Email_Password_Reset_Link') }}
   </x-primary-button>
  </div>
 </form>
</x-guest-layout>
