<x-guest-layout>
<x-slot name='title'>
    Login
</x-slot>    
<div class="content-wrapper d-flex align-items-center auth px-0">
    <div class="row w-100 mx-0">
      <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
          <div class="brand-logo">
            <img src="../../images/logo.svg" alt="logo">
          </div>
          <h4>Hello! let's get started</h4>
          <h6 class="font-weight-light">Sign in to continue.</h6>
          <form class="pt-3">
            <div class="form-group">
              <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="mt-3">
              <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN IN</a>
            </div>
            <div class="my-2 d-flex justify-content-between align-items-center">
              <div class="form-check">
                <label class="form-check-label text-muted">
                  <input type="checkbox" class="form-check-input">
                  Keep me signed in
                </label>
              </div>
              <a href="#" class="auth-link text-black">Forgot password?</a>
            </div>
            {{-- <div class="mb-2">
              <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                <i class="ti-facebook mr-2"></i>Connect using facebook
              </button>
            </div> --}}
            <div class="text-center mt-4 font-weight-light">
              Don't have an account? <a href="{{ url('/register') }}" class="text-primary">Create</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>
{{-- 
<x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}
