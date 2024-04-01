@extends('landingPage.landing-page')
<x-guest-layout>
    <div class="container d-flex justify-content-center align-items-center min-vh-100" style="background-color: white">
        <div>
            <div class="d-flex flex-column log-on p-5 bg-white border rounded" style="max-width: 600px; width: 100%;">
                <div class="d-flex flex-column align-items-center gap-2 mb-4">
                    <img src="../images/forget-password.png" alt="Instagram logo" class="img-fluid"
                        style="max-width:100px;">
                    <h5 class="fs-5 fw-bold">Reset your password</h5>
                </div>
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" placeholder="Email"
                            name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-text-input id="password" class="block mt-1 w-full" type="password" placeholder="Password"
                            name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            placeholder="Confirm Password" type="password" name="password_confirmation" required
                            autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button class="btn btn-primary w-100">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>


            </div>
            <div class="py-4 px-3 bg-body border text-center">
                <a class="text-decoration-none text-body fw-bolder" href="{{ route('login') }}">Back to login</a>
            </div>
        </div>
    </div>
</x-guest-layout>
