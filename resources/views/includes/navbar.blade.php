<div class="modal fade" id="create_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content" style="background-color: #262626;">
            <div class="modal-header" style="border-bottom-color: #363636">
                <h1 class="modal-title w-100 fs-5 d-flex align-items-end justify-content-between"
                    id="exampleModalLabel">
                    <span class="title_create text-white">Create new post</span>
                    <button class="next_btn_post btn_link"></button>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <svg aria-label="Icon to represent media such as images or videos"
                    class="x1lliihq x1n2onr6 x5n08af myImg" fill="currentColor" height="77" role="img"
                    viewBox="0 0 97.6 77.3" width="96">
                    <title>Icon to represent media such as images or videos</title>
                    <path
                        d="M16.3 24h.3c2.8-.2 4.9-2.6 4.8-5.4-.2-2.8-2.6-4.9-5.4-4.8s-4.9 2.6-4.8 5.4c.1 2.7 2.4 4.8 5.1 4.8zm-2.4-7.2c.5-.6 1.3-1 2.1-1h.2c1.7 0 3.1 1.4 3.1 3.1 0 1.7-1.4 3.1-3.1 3.1-1.7 0-3.1-1.4-3.1-3.1 0-.8.3-1.5.8-2.1z"
                        fill="white"></path>
                    <path
                        d="M84.7 18.4 58 16.9l-.2-3c-.3-5.7-5.2-10.1-11-9.8L12.9 6c-5.7.3-10.1 5.3-9.8 11L5 51v.8c.7 5.2 5.1 9.1 10.3 9.1h.6l21.7-1.2v.6c-.3 5.7 4 10.7 9.8 11l34 2h.6c5.5 0 10.1-4.3 10.4-9.8l2-34c.4-5.8-4-10.7-9.7-11.1zM7.2 10.8C8.7 9.1 10.8 8.1 13 8l34-1.9c4.6-.3 8.6 3.3 8.9 7.9l.2 2.8-5.3-.3c-5.7-.3-10.7 4-11 9.8l-.6 9.5-9.5 10.7c-.2.3-.6.4-1 .5-.4 0-.7-.1-1-.4l-7.8-7c-1.4-1.3-3.5-1.1-4.8.3L7 49 5.2 17c-.2-2.3.6-4.5 2-6.2zm8.7 48c-4.3.2-8.1-2.8-8.8-7.1l9.4-10.5c.2-.3.6-.4 1-.5.4 0 .7.1 1 .4l7.8 7c.7.6 1.6.9 2.5.9.9 0 1.7-.5 2.3-1.1l7.8-8.8-1.1 18.6-21.9 1.1zm76.5-29.5-2 34c-.3 4.6-4.3 8.2-8.9 7.9l-34-2c-4.6-.3-8.2-4.3-7.9-8.9l2-34c.3-4.4 3.9-7.9 8.4-7.9h.5l34 2c4.7.3 8.2 4.3 7.9 8.9z"
                        fill="white"></path>
                    <path
                        d="M78.2 41.6 61.3 30.5c-2.1-1.4-4.9-.8-6.2 1.3-.4.7-.7 1.4-.7 2.2l-1.2 20.1c-.1 2.5 1.7 4.6 4.2 4.8h.3c.7 0 1.4-.2 2-.5l18-9c2.2-1.1 3.1-3.8 2-6-.4-.7-.9-1.3-1.5-1.8zm-1.4 6-18 9c-.4.2-.8.3-1.3.3-.4 0-.9-.2-1.2-.4-.7-.5-1.2-1.3-1.1-2.2l1.2-20.1c.1-.9.6-1.7 1.4-2.1.8-.4 1.7-.3 2.5.1L77 43.3c1.2.8 1.5 2.3.7 3.4-.2.4-.5.7-.9.9z"
                        fill="white"></path>
                </svg>
                <p class="text-white fs-5 myTxt">Upload your image or video</p>
                <button class="btn btn-primary btn_upload">
                    select from your computer
                    <form id="upload-form">
                        <input multiple class="input_select" type="file" id="image-upload" name="image-upload">
                    </form>
                </button>
                <div id="image-container" class="hide_img carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#image-container"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#image-container"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div id="image_description" class="hide_img">
                    <div class="img_p"></div>
                    <div class="description" style="background-color: #262626">
                        <div class="cart">
                            <div>
                                <div class="img">
                                    <img src="{{ auth()->user()->avatar }}">
                                </div>
                                <div class="info">
                                    <p class="name text-white">{{ auth()->user()->full_name }}</p>
                                </div>
                            </div>
                        </div>
                        <form>
                            <textarea class="postCaption" type="text" style="background-color:#262626 !important" id="emoji_create"
                                placeholder="Write a caption"></textarea>
                        </form>
                    </div>
                </div>
                <div id="creatPostResponse" class="post_published hide_img">
                    <img src="{{ asset('homePage/images/loading.gif') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>






<!--***** nav menu start ****** -->
<div class="nav_menu sticky-top w-100">
    <div class="fix_top">
        <!-- nav for big->medium screen -->
        <div class="nav bg-black border-right" style="border-right-color: #262626">
            <div class="logo">
                <a href="/posts">
                    <svg style="color: white" aria-label="Instagram" class="x1lliihq x1n2onr6 x5n08af"
                        fill="currentColor" height="29" role="img" viewBox="32 4 113 32" width="103">
                        <title>Instagram</title>
                        <path clip-rule="evenodd"
                            d="M37.82 4.11c-2.32.97-4.86 3.7-5.66 7.13-1.02 4.34 3.21 6.17 3.56 5.57.4-.7-.76-.94-1-3.2-.3-2.9 1.05-6.16 2.75-7.58.32-.27.3.1.3.78l-.06 14.46c0 3.1-.13 4.07-.36 5.04-.23.98-.6 1.64-.33 1.9.32.28 1.68-.4 2.46-1.5a8.13 8.13 0 0 0 1.33-4.58c.07-2.06.06-5.33.07-7.19 0-1.7.03-6.71-.03-9.72-.02-.74-2.07-1.51-3.03-1.1Zm82.13 14.48a9.42 9.42 0 0 1-.88 3.75c-.85 1.72-2.63 2.25-3.39-.22-.4-1.34-.43-3.59-.13-5.47.3-1.9 1.14-3.35 2.53-3.22 1.38.13 2.02 1.9 1.87 5.16ZM96.8 28.57c-.02 2.67-.44 5.01-1.34 5.7-1.29.96-3 .23-2.65-1.72.31-1.72 1.8-3.48 4-5.64l-.01 1.66Zm-.35-10a10.56 10.56 0 0 1-.88 3.77c-.85 1.72-2.64 2.25-3.39-.22-.5-1.69-.38-3.87-.13-5.25.33-1.78 1.12-3.44 2.53-3.44 1.38 0 2.06 1.5 1.87 5.14Zm-13.41-.02a9.54 9.54 0 0 1-.87 3.8c-.88 1.7-2.63 2.24-3.4-.23-.55-1.77-.36-4.2-.13-5.5.34-1.95 1.2-3.32 2.53-3.2 1.38.14 2.04 1.9 1.87 5.13Zm61.45 1.81c-.33 0-.49.35-.61.93-.44 2.02-.9 2.48-1.5 2.48-.66 0-1.26-1-1.42-3-.12-1.58-.1-4.48.06-7.37.03-.59-.14-1.17-1.73-1.75-.68-.25-1.68-.62-2.17.58a29.65 29.65 0 0 0-2.08 7.14c0 .06-.08.07-.1-.06-.07-.87-.26-2.46-.28-5.79 0-.65-.14-1.2-.86-1.65-.47-.3-1.88-.81-2.4-.2-.43.5-.94 1.87-1.47 3.48l-.74 2.2.01-4.88c0-.5-.34-.67-.45-.7a9.54 9.54 0 0 0-1.8-.37c-.48 0-.6.27-.6.67 0 .05-.08 4.65-.08 7.87v.46c-.27 1.48-1.14 3.49-2.09 3.49s-1.4-.84-1.4-4.68c0-2.24.07-3.21.1-4.83.02-.94.06-1.65.06-1.81-.01-.5-.87-.75-1.27-.85-.4-.09-.76-.13-1.03-.11-.4.02-.67.27-.67.62v.55a3.71 3.71 0 0 0-1.83-1.49c-1.44-.43-2.94-.05-4.07 1.53a9.31 9.31 0 0 0-1.66 4.73c-.16 1.5-.1 3.01.17 4.3-.33 1.44-.96 2.04-1.64 2.04-.99 0-1.7-1.62-1.62-4.4.06-1.84.42-3.13.82-4.99.17-.8.04-1.2-.31-1.6-.32-.37-1-.56-1.99-.33-.7.16-1.7.34-2.6.47 0 0 .05-.21.1-.6.23-2.03-1.98-1.87-2.69-1.22-.42.39-.7.84-.82 1.67-.17 1.3.9 1.91.9 1.91a22.22 22.22 0 0 1-3.4 7.23v-.7c-.01-3.36.03-6 .05-6.95.02-.94.06-1.63.06-1.8 0-.36-.22-.5-.66-.67-.4-.16-.86-.26-1.34-.3-.6-.05-.97.27-.96.65v.52a3.7 3.7 0 0 0-1.84-1.49c-1.44-.43-2.94-.05-4.07 1.53a10.1 10.1 0 0 0-1.66 4.72c-.15 1.57-.13 2.9.09 4.04-.23 1.13-.89 2.3-1.63 2.3-.95 0-1.5-.83-1.5-4.67 0-2.24.07-3.21.1-4.83.02-.94.06-1.65.06-1.81 0-.5-.87-.75-1.27-.85-.42-.1-.79-.13-1.06-.1-.37.02-.63.35-.63.6v.56a3.7 3.7 0 0 0-1.84-1.49c-1.44-.43-2.93-.04-4.07 1.53-.75 1.03-1.35 2.17-1.66 4.7a15.8 15.8 0 0 0-.12 2.04c-.3 1.81-1.61 3.9-2.68 3.9-.63 0-1.23-1.21-1.23-3.8 0-3.45.22-8.36.25-8.83l1.62-.03c.68 0 1.29.01 2.19-.04.45-.02.88-1.64.42-1.84-.21-.09-1.7-.17-2.3-.18-.5-.01-1.88-.11-1.88-.11s.13-3.26.16-3.6c.02-.3-.35-.44-.57-.53a7.77 7.77 0 0 0-1.53-.44c-.76-.15-1.1 0-1.17.64-.1.97-.15 3.82-.15 3.82-.56 0-2.47-.11-3.02-.11-.52 0-1.08 2.22-.36 2.25l3.2.09-.03 6.53v.47c-.53 2.73-2.37 4.2-2.37 4.2.4-1.8-.42-3.15-1.87-4.3-.54-.42-1.6-1.22-2.79-2.1 0 0 .69-.68 1.3-2.04.43-.96.45-2.06-.61-2.3-1.75-.41-3.2.87-3.63 2.25a2.61 2.61 0 0 0 .5 2.66l.15.19c-.4.76-.94 1.78-1.4 2.58-1.27 2.2-2.24 3.95-2.97 3.95-.58 0-.57-1.77-.57-3.43 0-1.43.1-3.58.19-5.8.03-.74-.34-1.16-.96-1.54a4.33 4.33 0 0 0-1.64-.69c-.7 0-2.7.1-4.6 5.57-.23.69-.7 1.94-.7 1.94l.04-6.57c0-.16-.08-.3-.27-.4a4.68 4.68 0 0 0-1.93-.54c-.36 0-.54.17-.54.5l-.07 10.3c0 .78.02 1.69.1 2.09.08.4.2.72.36.91.15.2.33.34.62.4.28.06 1.78.25 1.86-.32.1-.69.1-1.43.89-4.2 1.22-4.31 2.82-6.42 3.58-7.16.13-.14.28-.14.27.07l-.22 5.32c-.2 5.37.78 6.36 2.17 6.36 1.07 0 2.58-1.06 4.2-3.74l2.7-4.5 1.58 1.46c1.28 1.2 1.7 2.36 1.42 3.45-.21.83-1.02 1.7-2.44.86-.42-.25-.6-.44-1.01-.71-.23-.15-.57-.2-.78-.04-.53.4-.84.92-1.01 1.55-.17.61.45.94 1.09 1.22.55.25 1.74.47 2.5.5 2.94.1 5.3-1.42 6.94-5.34.3 3.38 1.55 5.3 3.72 5.3 1.45 0 2.91-1.88 3.55-3.72.18.75.45 1.4.8 1.96 1.68 2.65 4.93 2.07 6.56-.18.5-.69.58-.94.58-.94a3.07 3.07 0 0 0 2.94 2.87c1.1 0 2.23-.52 3.03-2.31.09.2.2.38.3.56 1.68 2.65 4.93 2.07 6.56-.18l.2-.28.05 1.4-1.5 1.37c-2.52 2.3-4.44 4.05-4.58 6.09-.18 2.6 1.93 3.56 3.53 3.69a4.5 4.5 0 0 0 4.04-2.11c.78-1.15 1.3-3.63 1.26-6.08l-.06-3.56a28.55 28.55 0 0 0 5.42-9.44s.93.01 1.92-.05c.32-.02.41.04.35.27-.07.28-1.25 4.84-.17 7.88.74 2.08 2.4 2.75 3.4 2.75 1.15 0 2.26-.87 2.85-2.17l.23.42c1.68 2.65 4.92 2.07 6.56-.18.37-.5.58-.94.58-.94.36 2.2 2.07 2.88 3.05 2.88 1.02 0 2-.42 2.78-2.28.03.82.08 1.49.16 1.7.05.13.34.3.56.37.93.34 1.88.18 2.24.11.24-.05.43-.25.46-.75.07-1.33.03-3.56.43-5.21.67-2.79 1.3-3.87 1.6-4.4.17-.3.36-.35.37-.03.01.64.04 2.52.3 5.05.2 1.86.46 2.96.65 3.3.57 1 1.27 1.05 1.83 1.05.36 0 1.12-.1 1.05-.73-.03-.31.02-2.22.7-4.96.43-1.79 1.15-3.4 1.41-4 .1-.21.15-.04.15 0-.06 1.22-.18 5.25.32 7.46.68 2.98 2.65 3.32 3.34 3.32 1.47 0 2.67-1.12 3.07-4.05.1-.7-.05-1.25-.48-1.25Z"
                            fill="currentColor" fill-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
            <div class="menu pb-5 mb-5">
                <ul>
                    <li class="mb-5">
                        <a class="active" href="{{ route('posts.index') }}">
                            <svg class="me-3" aria-label="Home" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor"
                                style="color: white" height="24" role="img" viewBox="0 0 24 24"
                                width="24">
                                <title>Home</title>
                                <path
                                    d="M22 23h-6.001a1 1 0 0 1-1-1v-5.455a2.997 2.997 0 1 0-5.993 0V22a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V11.543a1.002 1.002 0 0 1 .31-.724l10-9.543a1.001 1.001 0 0 1 1.38 0l10 9.543a1.002 1.002 0 0 1 .31.724V22a1 1 0 0 1-1 1Z">
                                </path>
                            </svg>
                            <span class="d-none d-lg-block text-white fw-semibold">Home</span>
                        </a>
                    </li>
                    <li id="search_icon" class="mb-5">
                        <a href="#">
                            <svg class="me-3" style="color: white" aria-label="Search"
                                class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24" role="img"
                                viewBox="0 0 24 24" width="24">
                                <title>Search</title>
                                <path d="M19 10.5A8.5 8.5 0 1 1 10.5 2a8.5 8.5 0 0 1 8.5 8.5Z" fill="none"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"></path>
                                <line fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" x1="16.511" x2="22"
                                    y1="16.511" y2="22"></line>
                            </svg> <span class="d-none d-lg-block search text-white fw-semibold">Search </span>
                        </a>
                    </li>

                    <li class="mb-5">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#create_modal">
                            <svg class="me-3" style="color: white;" aria-label="New post"
                                class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24" role="img"
                                viewBox="0 0 24 24" width="24">
                                <title>New post</title>
                                <path
                                    d="M2 12v3.45c0 2.849.698 4.005 1.606 4.944.94.909 2.098 1.608 4.946 1.608h6.896c2.848 0 4.006-.7 4.946-1.608C21.302 19.455 22 18.3 22 15.45V8.552c0-2.849-.698-4.006-1.606-4.945C19.454 2.7 18.296 2 15.448 2H8.552c-2.848 0-4.006.699-4.946 1.607C2.698 4.547 2 5.703 2 8.552Z"
                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"></path>
                                <line fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" x1="6.545" x2="17.455"
                                    y1="12.001" y2="12.001"></line>
                                <line fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" x1="12.003" x2="12.003"
                                    y1="6.545" y2="17.455"></line>
                            </svg> <span class="d-none d-lg-block text-white fw-semibold">Create</span>
                        </a>

                    </li>
                    <li class="mb-5">
                        <a href="{{ route('user.profile.show', ['id' => Auth::user()->id]) }}">
                            <div style="width: 2rem; height: 2rem; overflow: hidden;"
                                class="d-flex align-items-center justify-content-center circle-wrapper">
                                <img style="object-fit: cover; width: 100%; height: 100%;"
                                    class="circle story img-fluid rounded-circle"
                                    src="{{ Auth::user()->avatar ?? asset('homePage/images/profile_img.jpg') }}"
                                    alt="Profile Picture" />
                            </div>
                            <span class="d-none d-lg-block text-white fw-semibold">Profile</span>
                        </a>


                    </li>
                    <li class="mb-5">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="active" :href="route('logout')"
                                onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                <svg class="me-3" aria-label="Home" class="x1lliihq x1n2onr6 x5n08af "
                                    fill="currentColor" style="color: white" height="24" role="img"
                                    viewBox="0 0 24 24" width="24">
                                    <title>Logout</title>
                                    <path
                                        d="M27.9 2.58a.86.86 0 0 0-.07-.1.71.71 0 0 0-.19-.23h-.09a1.12 1.12 0 0 0-.25-.11L27.1 2H12a1 1 0 0 0-1 1v6a1 1 0 0 0 2 0V4h7.19l-3.48 1A1 1 0 0 0 16 6v19h-3v-3a1 1 0 0 0-2 0v4a1 1 0 0 0 1 1h4v2a1 1 0 0 0 .4.8 1 1 0 0 0 .6.2 1 1 0 0 0 .29 0l10-3a1 1 0 0 0 .71-1V3a1 1 0 0 0-.1-.42zM26 25.26l-8 2.4V6.74l8-2.4z"
                                        fill="#ffffff" />
                                    <path
                                        d="M7.41 17H14a1 1 0 0 0 0-2H7.41l1.3-1.29a1 1 0 0 0-1.42-1.42l-3 3a1 1 0 0 0-.21.33 1 1 0 0 0 0 .76 1 1 0 0 0 .21.33l3 3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zM20 17a1 1 0 0 0 0-2 1 1 0 1 0 0 2z"
                                        fill="#ffffff" />

                                </svg>

                                <span class="d-none d-lg-block text-white fw-semibold"> {{ __('Log Out') }}</span>
                            </a>
                        </form>
                    </li>



                </ul>
            </div>

        </div>
        <!-- nav for small screen  -->
        <div class="nav_sm border-bottom" style="border-color: #363636 !important">
            <div class="content bg-black">
                <div class="dropdown ms-3">
                    <svg aria-label="Instagram" class="x1lliihq x1n2onr6 x5n08af" style="color: white"
                        height="29" role="img" viewBox="32 4 113 32" width="103">
                        <title>Instagram</title>
                        <path clip-rule="evenodd"
                            d="M37.82 4.11c-2.32.97-4.86 3.7-5.66 7.13-1.02 4.34 3.21 6.17 3.56 5.57.4-.7-.76-.94-1-3.2-.3-2.9 1.05-6.16 2.75-7.58.32-.27.3.1.3.78l-.06 14.46c0 3.1-.13 4.07-.36 5.04-.23.98-.6 1.64-.33 1.9.32.28 1.68-.4 2.46-1.5a8.13 8.13 0 0 0 1.33-4.58c.07-2.06.06-5.33.07-7.19 0-1.7.03-6.71-.03-9.72-.02-.74-2.07-1.51-3.03-1.1Zm82.13 14.48a9.42 9.42 0 0 1-.88 3.75c-.85 1.72-2.63 2.25-3.39-.22-.4-1.34-.43-3.59-.13-5.47.3-1.9 1.14-3.35 2.53-3.22 1.38.13 2.02 1.9 1.87 5.16ZM96.8 28.57c-.02 2.67-.44 5.01-1.34 5.7-1.29.96-3 .23-2.65-1.72.31-1.72 1.8-3.48 4-5.64l-.01 1.66Zm-.35-10a10.56 10.56 0 0 1-.88 3.77c-.85 1.72-2.64 2.25-3.39-.22-.5-1.69-.38-3.87-.13-5.25.33-1.78 1.12-3.44 2.53-3.44 1.38 0 2.06 1.5 1.87 5.14Zm-13.41-.02a9.54 9.54 0 0 1-.87 3.8c-.88 1.7-2.63 2.24-3.4-.23-.55-1.77-.36-4.2-.13-5.5.34-1.95 1.2-3.32 2.53-3.2 1.38.14 2.04 1.9 1.87 5.13Zm61.45 1.81c-.33 0-.49.35-.61.93-.44 2.02-.9 2.48-1.5 2.48-.66 0-1.26-1-1.42-3-.12-1.58-.1-4.48.06-7.37.03-.59-.14-1.17-1.73-1.75-.68-.25-1.68-.62-2.17.58a29.65 29.65 0 0 0-2.08 7.14c0 .06-.08.07-.1-.06-.07-.87-.26-2.46-.28-5.79 0-.65-.14-1.2-.86-1.65-.47-.3-1.88-.81-2.4-.2-.43.5-.94 1.87-1.47 3.48l-.74 2.2.01-4.88c0-.5-.34-.67-.45-.7a9.54 9.54 0 0 0-1.8-.37c-.48 0-.6.27-.6.67 0 .05-.08 4.65-.08 7.87v.46c-.27 1.48-1.14 3.49-2.09 3.49s-1.4-.84-1.4-4.68c0-2.24.07-3.21.1-4.83.02-.94.06-1.65.06-1.81-.01-.5-.87-.75-1.27-.85-.4-.09-.76-.13-1.03-.11-.4.02-.67.27-.67.62v.55a3.71 3.71 0 0 0-1.83-1.49c-1.44-.43-2.94-.05-4.07 1.53a9.31 9.31 0 0 0-1.66 4.73c-.16 1.5-.1 3.01.17 4.3-.33 1.44-.96 2.04-1.64 2.04-.99 0-1.7-1.62-1.62-4.4.06-1.84.42-3.13.82-4.99.17-.8.04-1.2-.31-1.6-.32-.37-1-.56-1.99-.33-.7.16-1.7.34-2.6.47 0 0 .05-.21.1-.6.23-2.03-1.98-1.87-2.69-1.22-.42.39-.7.84-.82 1.67-.17 1.3.9 1.91.9 1.91a22.22 22.22 0 0 1-3.4 7.23v-.7c-.01-3.36.03-6 .05-6.95.02-.94.06-1.63.06-1.8 0-.36-.22-.5-.66-.67-.4-.16-.86-.26-1.34-.3-.6-.05-.97.27-.96.65v.52a3.7 3.7 0 0 0-1.84-1.49c-1.44-.43-2.94-.05-4.07 1.53a10.1 10.1 0 0 0-1.66 4.72c-.15 1.57-.13 2.9.09 4.04-.23 1.13-.89 2.3-1.63 2.3-.95 0-1.5-.83-1.5-4.67 0-2.24.07-3.21.1-4.83.02-.94.06-1.65.06-1.81 0-.5-.87-.75-1.27-.85-.42-.1-.79-.13-1.06-.1-.37.02-.63.35-.63.6v.56a3.7 3.7 0 0 0-1.84-1.49c-1.44-.43-2.93-.04-4.07 1.53-.75 1.03-1.35 2.17-1.66 4.7a15.8 15.8 0 0 0-.12 2.04c-.3 1.81-1.61 3.9-2.68 3.9-.63 0-1.23-1.21-1.23-3.8 0-3.45.22-8.36.25-8.83l1.62-.03c.68 0 1.29.01 2.19-.04.45-.02.88-1.64.42-1.84-.21-.09-1.7-.17-2.3-.18-.5-.01-1.88-.11-1.88-.11s.13-3.26.16-3.6c.02-.3-.35-.44-.57-.53a7.77 7.77 0 0 0-1.53-.44c-.76-.15-1.1 0-1.17.64-.1.97-.15 3.82-.15 3.82-.56 0-2.47-.11-3.02-.11-.52 0-1.08 2.22-.36 2.25l3.2.09-.03 6.53v.47c-.53 2.73-2.37 4.2-2.37 4.2.4-1.8-.42-3.15-1.87-4.3-.54-.42-1.6-1.22-2.79-2.1 0 0 .69-.68 1.3-2.04.43-.96.45-2.06-.61-2.3-1.75-.41-3.2.87-3.63 2.25a2.61 2.61 0 0 0 .5 2.66l.15.19c-.4.76-.94 1.78-1.4 2.58-1.27 2.2-2.24 3.95-2.97 3.95-.58 0-.57-1.77-.57-3.43 0-1.43.1-3.58.19-5.8.03-.74-.34-1.16-.96-1.54a4.33 4.33 0 0 0-1.64-.69c-.7 0-2.7.1-4.6 5.57-.23.69-.7 1.94-.7 1.94l.04-6.57c0-.16-.08-.3-.27-.4a4.68 4.68 0 0 0-1.93-.54c-.36 0-.54.17-.54.5l-.07 10.3c0 .78.02 1.69.1 2.09.08.4.2.72.36.91.15.2.33.34.62.4.28.06 1.78.25 1.86-.32.1-.69.1-1.43.89-4.2 1.22-4.31 2.82-6.42 3.58-7.16.13-.14.28-.14.27.07l-.22 5.32c-.2 5.37.78 6.36 2.17 6.36 1.07 0 2.58-1.06 4.2-3.74l2.7-4.5 1.58 1.46c1.28 1.2 1.7 2.36 1.42 3.45-.21.83-1.02 1.7-2.44.86-.42-.25-.6-.44-1.01-.71-.23-.15-.57-.2-.78-.04-.53.4-.84.92-1.01 1.55-.17.61.45.94 1.09 1.22.55.25 1.74.47 2.5.5 2.94.1 5.3-1.42 6.94-5.34.3 3.38 1.55 5.3 3.72 5.3 1.45 0 2.91-1.88 3.55-3.72.18.75.45 1.4.8 1.96 1.68 2.65 4.93 2.07 6.56-.18.5-.69.58-.94.58-.94a3.07 3.07 0 0 0 2.94 2.87c1.1 0 2.23-.52 3.03-2.31.09.2.2.38.3.56 1.68 2.65 4.93 2.07 6.56-.18l.2-.28.05 1.4-1.5 1.37c-2.52 2.3-4.44 4.05-4.58 6.09-.18 2.6 1.93 3.56 3.53 3.69a4.5 4.5 0 0 0 4.04-2.11c.78-1.15 1.3-3.63 1.26-6.08l-.06-3.56a28.55 28.55 0 0 0 5.42-9.44s.93.01 1.92-.05c.32-.02.41.04.35.27-.07.28-1.25 4.84-.17 7.88.74 2.08 2.4 2.75 3.4 2.75 1.15 0 2.26-.87 2.85-2.17l.23.42c1.68 2.65 4.92 2.07 6.56-.18.37-.5.58-.94.58-.94.36 2.2 2.07 2.88 3.05 2.88 1.02 0 2-.42 2.78-2.28.03.82.08 1.49.16 1.7.05.13.34.3.56.37.93.34 1.88.18 2.24.11.24-.05.43-.25.46-.75.07-1.33.03-3.56.43-5.21.67-2.79 1.3-3.87 1.6-4.4.17-.3.36-.35.37-.03.01.64.04 2.52.3 5.05.2 1.86.46 2.96.65 3.3.57 1 1.27 1.05 1.83 1.05.36 0 1.12-.1 1.05-.73-.03-.31.02-2.22.7-4.96.43-1.79 1.15-3.4 1.41-4 .1-.21.15-.04.15 0-.06 1.22-.18 5.25.32 7.46.68 2.98 2.65 3.32 3.34 3.32 1.47 0 2.67-1.12 3.07-4.05.1-.7-.05-1.25-.48-1.25Z"
                            fill="currentColor" fill-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="left">
                    <div class="search_bar">
                        <div class="form-outline" style="border-color: black !important">
                            <input type="search" id="search-input2" class="form-control text-white"
                                style="background-color:#262626; border-color:black" placeholder="Search" />
                            <div class="find  search-results2" id="search-result2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- menu in the botton for smal screen  -->
    <div class="nav_bottom bg-black border-top pt-3 pb-2" style="border-top-color:#363636 !important">
        <a href="{{ route('posts.index') }}">
            <svg aria-label="Home" class="x1lliihq x1n2onr6 x5n08af" fill="white" height="24" role="img"
                viewBox="0 0 24 24" width="24">
                <title>Home</title>
                <path
                    d="M22 23h-6.001a1 1 0 0 1-1-1v-5.455a2.997 2.997 0 1 0-5.993 0V22a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V11.543a1.002 1.002 0 0 1 .31-.724l10-9.543a1.001 1.001 0 0 1 1.38 0l10 9.543a1.002 1.002 0 0 1 .31.724V22a1 1 0 0 1-1 1Z">
                </path>
            </svg>
        </a>

        <a href="#" data-bs-toggle="modal" data-bs-target="#create_modal"><svg aria-label="New post"
                class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24" role="img"
                viewBox="0 0 24 24" width="24">
                <title>New post</title>
                <path
                    d="M2 12v3.45c0 2.849.698 4.005 1.606 4.944.94.909 2.098 1.608 4.946 1.608h6.896c2.848 0 4.006-.7 4.946-1.608C21.302 19.455 22 18.3 22 15.45V8.552c0-2.849-.698-4.006-1.606-4.945C19.454 2.7 18.296 2 15.448 2H8.552c-2.848 0-4.006.699-4.946 1.607C2.698 4.547 2 5.703 2 8.552Z"
                    fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                </path>
                <line fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    x1="6.545" x2="17.455" y1="12.001" y2="12.001"></line>
                <line fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    x1="12.003" x2="12.003" y1="6.545" y2="17.455"></line>
            </svg></a>
        <a href="{{ route('user.profile.show', ['id' => Auth::user()->id]) }}"><img class="circle story"
                src="{{ asset('homePage/images/profile_img.jpg') }}"></a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="active" :href="route('logout')"
                onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                <svg class="me-3" aria-label="Home" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor"
                    style="color: white" height="24" role="img" viewBox="0 0 24 24" width="24">
                    <title>Logout</title>
                    <path
                        d="M27.9 2.58a.86.86 0 0 0-.07-.1.71.71 0 0 0-.19-.23h-.09a1.12 1.12 0 0 0-.25-.11L27.1 2H12a1 1 0 0 0-1 1v6a1 1 0 0 0 2 0V4h7.19l-3.48 1A1 1 0 0 0 16 6v19h-3v-3a1 1 0 0 0-2 0v4a1 1 0 0 0 1 1h4v2a1 1 0 0 0 .4.8 1 1 0 0 0 .6.2 1 1 0 0 0 .29 0l10-3a1 1 0 0 0 .71-1V3a1 1 0 0 0-.1-.42zM26 25.26l-8 2.4V6.74l8-2.4z"
                        fill="#ffffff" />
                    <path
                        d="M7.41 17H14a1 1 0 0 0 0-2H7.41l1.3-1.29a1 1 0 0 0-1.42-1.42l-3 3a1 1 0 0 0-.21.33 1 1 0 0 0 0 .76 1 1 0 0 0 .21.33l3 3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zM20 17a1 1 0 0 0 0-2 1 1 0 1 0 0 2z"
                        fill="#ffffff" />

                </svg>

                <span class="d-none d-lg-block text-white fw-semibold"> {{ __('Log Out') }}</span>
            </a>
        </form>
    </div>
</div>
<!-- search  -->
<div id="search" class="search_section position-fixed ps-4 bg-black">
    <h2 class="text-white fw-bold">Search</h2>
    <input id="search-input" name="search" class="form-control" type="text" placeholder="Search"
        style="background-color: #232323; border-color:black; color:white">
    <div class="find mt-5" id="search-result">

    </div>
</div>
<!-- search  -->


<!--***** nav menu end ****** -->
