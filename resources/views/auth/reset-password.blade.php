<x-guest-layout>
 <form method="POST" action="{{ route('password.store') }}">
  @csrf

  <!-- password Reset Token -->
  <input type="hidden" name="token" value="{{ $request->route('token') }}">

  <!-- email Address -->
  <div>
   <x-input-label for="email" :value="trans('auth_trans.email')" />
   <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" placeholder="{{ trans('auth_trans.email_placeholder') }}" />
   <x-input-error :messages="$errors->get('email')" class="mt-2" />
  </div>

  <!-- password -->
  <div class="mt-4">
   <x-input-label for="password" :value="trans('auth_trans.password')" />
   <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="{{ trans('auth_trans.password_placeholder') }}" />
   <x-input-error :messages="$errors->get('password')" class="mt-2" />
  </div>

  <!-- Confirm password -->
  <div class="mt-4">
   <x-input-label for="password_confirmation" :value="trans('auth_trans.Confirm_password')" />

   <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ trans('auth_trans.password_placeholder') }}" />

   <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
  </div>

  <div class="flex items-center justify-end mt-4">
   <x-primary-button>
    {{ trans('auth_trans.Reset_password') }}
   </x-primary-button>
  </div>
 </form>
</x-guest-layout>
