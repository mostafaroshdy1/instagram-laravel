    <div class="row">
        <p class="fs-5 fw-bold">Email Change</p>
    </div>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <label for="name">Name</label>
            <input id="name" name="name" type="text" class="form-control bg-black text-white mb-3"
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>


        <div class="mb-4">
            <label for="email" class="form-label fs-6">Email</label>
            <input type="email" name="email" class="form-control bg-black text-white"
                value="{{ old('email', $user->email) }}" required autocomplete="username" id="email">
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <div class="mb-4 d-flex justify-content-end">
            <input type="submit" class="btn btn-primary btn-lg mt-4 px-6" value="Submit">
        </div>
    </form>

    </div>
