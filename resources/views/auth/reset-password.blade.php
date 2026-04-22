<x-guest-layout>
 <form method="POST" action="{{ route('password.store') }}">
  @csrf

  <!-- Password Reset Token -->
  <input type="hidden" name="token" value="{{ $request->route('token') }}">

  <!-- Email Address -->
  <div>
   <x-input-label for="email" :value="trans('auth_trans.Email')" />
   <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" placeholder="{{ trans('auth_trans.Email_placeholder') }}" />
   <x-input-error :messages="$errors->get('email')" class="mt-2" />
  </div>

  <!-- Password -->
  <div class="mt-4">
   <x-input-label for="password" :value="trans('auth_trans.Password')" />
   <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="{{ trans('auth_trans.Password_placeholder') }}" />
   <x-input-error :messages="$errors->get('password')" class="mt-2" />
  </div>

  <!-- Confirm Password -->
  <div class="mt-4">
   <x-input-label for="password_confirmation" :value="trans('auth_trans.Confirm_Password')" />

   <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ trans('auth_trans.Password_placeholder') }}" />

   <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
  </div>

  <div class="flex items-center justify-end mt-4">
   <x-primary-button>
    {{ trans('auth_trans.Reset_Password') }}
   </x-primary-button>
  </div>
 </form>
</x-guest-layout>
