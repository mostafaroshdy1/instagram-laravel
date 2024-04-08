    <div class="row">
        <p class="fs-5 fw-bold">Reset Password</p>
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
