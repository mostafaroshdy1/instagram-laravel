<div class="row">
    <p class="fs-5 fw-bold">Edit Profile</p>
</div>
<form method="POST" action={{ route('user.profile.update', ['id' => $user->id]) }} enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12 mx-auto mb-4 d-flex justify-content-center bg-dark rounded">
            <div class="col-2 d-flex flex-column justify-content-center">
                <img id="avatar" src="{{ $user->avatar ?? asset('homePage/images/profile_img.jpg') }}"
                    class="profile-picture" alt="">
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
                <label for="changePhoto" class="btn btn-primary btn-sm">Change Photo</label>
                <input id="changePhoto" type="file" hidden name="photo">
            </div>
        </div>

    </div>
    <div class="mb-4">
        <label for="exampleFormControlInput1" class="form-label fs-6">username</label>
        <input type="text" name="username" class="form-control bg-black text-white" id="exampleFormControlInput1"
            value="{{ old('uesrname', $user->username) }}">
    </div>
    <div class="mb-4">
        <label for="exampleFormControlInput1" class="form-label fs-6">Name</label>
        <input type="text" name="name" class="form-control bg-black text-white" id="exampleFormControlInput1"
            value="{{ old('name', $user->full_name) }}">
    </div>
    <div class="mb-4">
        <label for="exampleFormControlInput1" class="form-label fs-6">Website</label>
        <input type="url" name="website" class="form-control bg-black text-white" id="exampleFormControlInput1"
            placeholder="name@example.com" value="{{ old('website', $user->website) }}">

    </div>
    <div class="mb-4">
        <label for="exampleFormControlTextarea1" class="form-label">Bio</label>
        <textarea class="form-control bg-black text-white" name="bio" id="exampleFormControlTextarea1" rows="3">{{ old('bio', $user->bio) }}
            </textarea>
    </div>
    <div class="mb-4 d-flex justify-content-end">
        <input type="submit" class="btn btn-primary btn-lg mt-4 px-6" value="Submit">
    </div>
</form>
