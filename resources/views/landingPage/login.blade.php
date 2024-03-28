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
                        <input type="email" name="email" id="emai" placeholder="e-mail" required autofocus
                            autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                    </div>
                    <div>
                        <input type="password" name="password" id="password" placeholder="password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                    </div>
                    <button type="submit" class="log_btn">
                        Log in
                    </button>
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
                        <a href="#">
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
