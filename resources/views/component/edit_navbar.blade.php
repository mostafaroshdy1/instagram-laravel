<div class="col-lg-3 col-md-3 col-4 border-end border-start d-flex flex-column align-items-center">
    <div class="row">
        <div class="col-3 d-flex flex-column align-items-center mx-auto">
            <p class="fs-4 fw-bold ">Settings</p>
        </div>

    </div>
    <div class="row pb-4 w-100">
        <div class="col rounded link" data-form="edit_profile" data-user-id="{{ $user->id }}">
            <div class="d-flex mx-auto my-3 gap-1 justify-content-center align-items-center">
                <div class="">
                    <svg aria-label="" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24"
                        role="img" viewBox="0 0 24 24" width="24">
                        <title></title>
                        <circle cx="12.004" cy="12.004" fill="none" r="10.5" stroke="currentColor"
                            stroke-linecap="round" stroke-miterlimit="10" stroke-width="2"></circle>
                        <path
                            d="M18.793 20.014a6.08 6.08 0 0 0-1.778-2.447 3.991 3.991 0 0 0-2.386-.791H9.38a3.994 3.994 0 0 0-2.386.791 6.09 6.09 0 0 0-1.779 2.447"
                            fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                            stroke-width="2"></path>
                        <circle cx="12.006" cy="9.718" fill="none" r="4.109" stroke="currentColor"
                            stroke-linecap="round" stroke-miterlimit="10" stroke-width="2"></circle>
                    </svg>
                </div>
                <div class="col ps-3 d-none d-md-block">
                    <span>Edit Profile</span>
                </div>
                <div class="col ps-4 d-block d-md-none">
                    <span>Edit</span>
                </div>
            </div>

        </div>
    </div>
    <div class="row pb-4 w-100">
        <div class="col rounded link" data-form="pass_reset" data-user-id="{{ $user->id }}">
            <div class="d-flex mx-auto my-3 gap-1 justify-content-center align-items-center">
                <div class="col-1">
                    <svg aria-label="" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24"
                        role="img" viewBox="0 0 24 24" width="24">
                        <title></title>
                        <path
                            d="M6.71 9.555h10.581a2.044 2.044 0 0 1 2.044 2.044v8.357a2.044 2.044 0 0 1-2.043 2.043H6.71a2.044 2.044 0 0 1-2.044-2.044V11.6A2.044 2.044 0 0 1 6.71 9.555Zm1.07 0V6.222a4.222 4.222 0 0 1 8.444 0v3.333"
                            fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"></path>
                    </svg>
                </div>
                <div class="col ps-3 d-none d-md-block">
                    <span>Change Password</span>
                </div>
                <div class="col ps-4 d-block d-md-none">
                    <span>Reset</span>
                </div>
            </div>

        </div>
    </div>
    <div class="row pb-4 w-100">
        <div class="col rounded link" data-form="email_change" data-user-id="{{ $user->id }}">
            <div class="d-flex mx-auto my-3 gap-1 justify-content-center align-items-center">
                <div class="col-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="#ffffff"
                            d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z" />
                    </svg>
                </div>
                <div class="col ps-3 d-none d-md-block">
                    <span>Change Mail</span>
                </div>
                <div class="col ps-4 d-block d-md-none">
                    <span>Mail</span>
                </div>
            </div>

        </div>
    </div>
</div>
