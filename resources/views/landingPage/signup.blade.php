@extends('landingPage.landing-page')
@section('title', 'Sign up • Instagram')

<div class="sign_up">
    <div class="content">
        <div class="log-on border_insc">
            <div class="logo">
                <img src="./images/logo.png" alt="Instagram logo">
                <p>Sign up to see photos and videos from your friends.</p>
                <button class="btn log_fac">
                    <a href="#">
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
                <div>
                    <input type="email" name="email" id="emai" placeholder="email address"
                        :value="old('email')" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                </div>
                <div>
                    <input type="text" name="name" id="name" placeholder="Full Name" :value="old('name')"
                        required autocomplete="name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                </div>
                <!-- <div> -->
                <!--     <input type="text" name="username" id="username" placeholder="Username"> -->
                <!-- </div> -->
                <div>
                    <input type="password" name="password" id="password" placeholder="password" required
                        autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
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

                <button type="submit" class="log_btn">
                    Sign Up
                </button>
            </form>
        </div>
        <div class="sing-in border_insc">
            <p>
                Have an account?
                <a href="{{ '/' }}">Log in</a>
            </p>
        </div>
        @include('landingPage.phone-app-icons')
    </div>
</div>
