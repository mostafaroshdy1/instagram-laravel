@extends('landingPage.landing-page')
@section('title', 'Instagram')
@section('content')

    <div class="login">
        @include('landingPage.phone')
        <div class="content">
            <div class="log-on border_insc">
                <div class="logo">
                    <img src="./images/logo.png" alt="Instagram logo">
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <input type="email" name="email" id="email" placeholder="Email" required autofocus
                            autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        <input type="password" name="password" id="password" placeholder="password" required
                            autocomplete="current-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <div class="block mt-4" style="display: none;">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                    name="remember" checked>
                                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <button type="submit" class="log_btn">
                            {{ __('Log in') }}
                        </button>
                    </div>
                </form>

                <div class="other-ways">
                    <div class="seperator">
                        <span class="ligne"></span>
                        <span class="ou px-2">OR</span>
                        <span class="ligne"></span>
                    </div>
                    <div class="facebook-connection">
                        <a href="#">
                            <img src="./images/facebook.png" alt="facebook icon">
                            Log in with Facebook
                        </a>
                    </div>
                    <div class="forget-password">
                        <a href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    </div>
                </div>
            </div>

            <div class="sing-up border_insc">
                <p>
                    Don't have an account?
                    <a href="{{ route('register') }}">Sign up</a>
                </p>
            </div>
            @include('landingPage.phone-app-icons')
        </div>
    </div>
@endsection
