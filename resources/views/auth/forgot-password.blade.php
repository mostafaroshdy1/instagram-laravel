@extends('landingPage.landing-page')
<x-guest-layout>
    <div class="container d-flex justify-content-center align-items-center min-vh-100" style="background-color: white ">
        <div>
            <div class="d-flex flex-column log-on border-top border-end border-start rounded-top p-5 bg-white justify-content-center align-items-center"
                style="max-width: 400px; width: 100%;">
                <div class="d-flex flex-column align-items-center gap-2 mb-4">
                    <img src="./images/forget-password.png" alt="Instagram logo" class="img-fluid" style="max-width:100px;">
                    <h5 class="fs-5 fw-bold">Trouble logging in?</h5>
                </div>
                <div class="mb-4 text-sm text-gray-600 text-center leading-snug">
                    {{ __("Enter your email and we'll send you a link to get back into your account.") }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            placeholder="Email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button class="btn btn-primary w-100">
                            {{ __('Send login link') }}
                        </button>
                    </div>
                </form>

                <div class="seperator">
                    <span class="ligne"></span>
                    <span class="ou">OR</span>
                    <span class="ligne"></span>
                </div>

                <div class="text-center">
                    <a class="text-decoration-none text-body fw-bolder" href="{{ route('register') }}">Create new
                        account</a>
                </div>

            </div>
            <div class="py-4 px-3 bg-body border text-center">
                <a class="text-decoration-none text-body fw-bolder" href="{{ route('login') }}">Back to login</a>
            </div>
        </div>
    </div>
</x-guest-layout>
