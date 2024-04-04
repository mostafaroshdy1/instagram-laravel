@extends('landingPage.landing-page')
@section('title', 'Sign up • Instagram')
@section('content')

    <div class="sign_up">
        <div class="content">
            <div class="log-on border_insc">
                <div class="logo">
                    <img src="./images/logo.png" alt="Instagram logo">
                    <p>Sign up to see photos and videos from your friends.</p>
                    <button class="btn log_fac">
                        <a href="#" style="text-decoration: none">
                            <img src="./images/facebook_white.png" alt="facebook icon">
                            Log in with Facebook
                        </a>
                    </button>
                    <div class="seperator">
                        <span class="ligne"></span>
                        <span class="ou">OR</span>
                        <span class="ligne"></span>
                    </div>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Full Name -->
                    <div class="mt-1">
                        <x-text-input id="full_name" class="block mt-1 w-full" placeholder="Full Name" type="text"
                            name="full_name" :value="old('full_name')" required autofocus autocomplete="Full Name" />
                        <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-1">
                        <x-text-input id="email" class="block mt-1 w-full" placeholder="Email" type="email"
                            name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Username -->
                    <div class="mt-1">
                        <x-text-input id="username" class="block mt-1 w-full" placeholder="Username" type="text"
                            name="username" :value="old('username')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-1">
                        <x-text-input id="password" class="block mt-1 w-full" placeholder="Password" type="password"
                            name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-1">
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" placeholder="Confirm Password"
                            type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="info">
                        <p>
                            People who use our service may have uploaded your contact information to Instagram.
                            <a href="#">Learn more</a>
                        </p>
                        <p>
                            By signing up, you agree to our
                            <a href="#">Terms, Privacy Policy and Cookies Policy.</a>
                        </p>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <button type="submit" class="log_btn">
                            {{ __('Sign Up') }}
                        </button>
                    </div>
                </form>
            </div>

            <div class="sing-in border_insc">
                <p>
                    Have an account?
                    <a href="{{ route('login') }}">Log in</a>
                </p>
            </div>
            @include('landingPage.phone-app-icons')
        </div>
    </div>

@endsection
