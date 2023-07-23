<x-guest-layout>
    
    <x-slot name='title'>
        Register
    </x-slot>    
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../images/logo.svg" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" value="{{ old('name') }}" placeholder="Full Name" name="name" required autofocus>
                  <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" id="exampleInputEmail1" placeholder="Email" >
                 <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />

                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" value="{{ old('password') }}" id="exampleInputPassword1" placeholder="Password" >
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />

                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" name="agree" value="1" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
            <x-input-error messages="Please agree to the terms to create an account" class="mt-2 text-danger" />

                  </div>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="{{ url('login') }}" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</x-guest-layout>


{{-- <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="fname" :value="__('First Name')" />
            <x-text-input id="fname" class="block mt-1 w-full" type="text" name="fname" :value="old('fname')"  autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('fname')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="lname" :value="__('Last Name')" />
            <x-text-input id="lname" class="block mt-1 w-full" type="text" name="lname" :value="old('lname')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('lname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}