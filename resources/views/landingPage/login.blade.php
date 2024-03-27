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
                <form>
                    <div>
                        <input type="email" name="email" id="emai" placeholder="e-mail">
                    </div>
                    <div>
                        <input type="password" name="password" id="password" placeholder="password">
                    </div>

                </form>
                <a href="./home.html">
                    <button class="log_btn">
                        Log in
                    </button>
                </a>
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
