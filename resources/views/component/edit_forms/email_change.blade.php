    <div class="row">
        <p class="fs-5 fw-bold">Email Change</p>
    </div>
    <div>
        <div class="row">
            <div class="col-12 mx-auto mb-4 d-flex justify-content-center bg-dark rounded">
                <div class="col-2 d-flex flex-column justify-content-center">
                    <img src="{{ asset('homePage/images/profile_img.jpg') }}" class="profile-picture" alt="">
                </div>
                <div class="col-7 my-auto py-3">
                    <div class="row">
                        <span class="fw-bold h6">{{ $user->username }}</span>
                    </div>
                    <div class="row">
                        <span class="fs-6 ">{{ $user->full_name }}</span>
                    </div>
                </div>
                <div class="col-3 my-auto">
                    <button type="button" class="btn btn-primary btn-sm">Change Photo</button>
                </div>
            </div>

        </div>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')
            <div>
                <label for="name">Name</label>
                <input id="name" name="name" type="text" class="form-control bg-black text-white mb-3" value="{{ old('name', $user->name) }}"
                    required autofocus autocomplete="name" />
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
