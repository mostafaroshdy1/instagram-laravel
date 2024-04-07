    <div class="row">
        <p class="fs-5 fw-bold">Reset Password</p>
    </div>
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
    <div>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <div class="mb-4">
                <label for="update_password_current_password" class="form-label fs-6">Current Password</label>
                <input type="password" name="current_password" class="form-control bg-black text-white"
                    autocomplete="current-password" id="update_password_current_password">
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>


            <div class="mb-4">
                <label for="update_password_password" class="form-label fs-6">Password</label>
                <input type="password" name="password" class="form-control bg-black text-white"
                    autocomplete="new-password" id="update_password_password">
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label for="update_password_password_confirmation" class="form-label fs-6">New Password</label>
                <input type="password" name="password_confirmation" class="form-control bg-black text-white"
                    autocomplete="new-password" id="update_password_password_confirmation">
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>


            <div class="mb-4 d-flex justify-content-end">
                <input type="submit" class="btn btn-primary btn-lg mt-4 px-6" value="Save">
            </div>

        </form>
    </div>
