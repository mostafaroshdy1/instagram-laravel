@extends('landingPage.landing-page')
<x-guest-layout>
    <div class="container d-flex justify-content-center align-items-center min-vh-100" style="background-color: white ">
        <div class="log-on border rounded p-4 bg-white justify-content-center align-items-center"
            style="max-width: 400px; width: 100%;">
            <div class="text-center mb-4">
                <img src="./images/logo.png" alt="Instagram logo" class="img-fluid" style="max-width:100px;">
            </div>
            <div class="d-flex justify-content-center">
                <img src="./images/mail.png" alt="Email logo" class="img-fluid" style="max-width:70px;">
            </div>
            <div class="card-header text-center fw-bold">{{ __('Verify Your Email Address') }}</div>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success my-4">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="text-center mb-4" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>

            <form method="POST" action="{{ route('verification.send') }}"
                class="log_btn mb-3 d-flex justify-content-center">
                @csrf
                <button type="submit" class="log_btn">{{ __('Resend Verification Email') }}</button>
            </form>
            <div class="text-center">
                <a href="{{ route('register') }}" style="text-decoration: none"
                    class="btn btn-link">{{ __('Go back') }}</a>
            </div>
        </div>
    </div>
</x-guest-layout>
