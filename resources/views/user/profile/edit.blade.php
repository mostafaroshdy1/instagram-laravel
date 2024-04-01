@extends('layout.insta')
@section('content')
    <div class="row vh-100">
        <div class="col-5  rounded mx-auto my-auto d-flex flex-column">
            <div class="row">
                <p class="fs-5 fw-bold">Edit Profile</p>
            </div>
            <form action="">
                <div class="row">
                    <div class="col-12 mx-auto mb-4 d-flex justify-content-center bg-dark rounded">
                        <div class="col-2 d-flex flex-column justify-content-center">
                            <img src="{{asset('homePage/images/profile_img.jpg')}}" class="profile-picture" alt="">
                        </div>
                        <div class="col-7 my-auto py-3">
                            <div class="row">
                                <span class="fw-bold h6">ganzury._</span>
                            </div>
                            <div class="row">
                                <span class="fs-6 ">Ziad Elganzory</span>
                            </div>
                        </div>
                        <div class="col-3 my-auto">
                            <button type="button" class="btn btn-primary btn-sm">Change Photo</button>
                        </div>
                    </div>

                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label fs-6">username</label>
                    <input type="text" name="username" class="form-control bg-black text-white" id="exampleFormControlInput1">
                  </div>
                  <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label fs-6">Name</label>
                    <input type="text" name="name" class="form-control bg-black text-white" id="exampleFormControlInput1">
                  </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label fs-6">Website</label>
                    <input type="email" name="website" class="form-control bg-black text-white" id="exampleFormControlInput1" placeholder="name@example.com">
                  </div>
                  <div class="mb-4">
                    <label for="exampleFormControlTextarea1" class="form-label">Bio</label>
                    <textarea class="form-control bg-black text-white" name="Bio" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="mb-4">
                    <label for="exampleFormControlTextarea1" class="form-label">Gender</label>
                    <select class="form-select bg-black text-white" name="gender" aria-label="Default select example">
                        <option selected>Select Gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                      </select>
                  </div>
                  <div class="mb-4 d-flex justify-content-end">
                    <input type="submit" class="btn btn-primary btn-lg mt-4 px-6" value="Submit">
                  </div>
            </form>
        </div>
    </div>
@endsection