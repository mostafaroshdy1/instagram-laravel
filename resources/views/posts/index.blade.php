<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Instagram</title>

    <link rel="stylesheet" href="{{ asset('homePage/sass/vender/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('homePage/sass/vender/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('homePage/owlcarousel/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('homePage/owlcarousel/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css">

    {{-- from Roshdy: Uncomment this if you need bootstrap cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('homePage/sass/main.css') }}">
</head>

<body class="bg-black">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <div class="post_page ">
        <!--***** nav menu start ****** -->
        <div class="nav_menu ">
            <div class="fix_top ">
                <!-- nav for big->medium screen -->
                <div class="nav bg-black border-right" style="border-right-color: rgb(var(--ig-separator));">
                    <div class="logo">
                        <a href="">
                            <svg style="color: white" aria-label="Instagram" class="x1lliihq x1n2onr6 x5n08af"
                                fill="currentColor" height="29" role="img" viewBox="32 4 113 32" width="103">
                                <title>Instagram</title>
                                <path clip-rule="evenodd"
                                    d="M37.82 4.11c-2.32.97-4.86 3.7-5.66 7.13-1.02 4.34 3.21 6.17 3.56 5.57.4-.7-.76-.94-1-3.2-.3-2.9 1.05-6.16 2.75-7.58.32-.27.3.1.3.78l-.06 14.46c0 3.1-.13 4.07-.36 5.04-.23.98-.6 1.64-.33 1.9.32.28 1.68-.4 2.46-1.5a8.13 8.13 0 0 0 1.33-4.58c.07-2.06.06-5.33.07-7.19 0-1.7.03-6.71-.03-9.72-.02-.74-2.07-1.51-3.03-1.1Zm82.13 14.48a9.42 9.42 0 0 1-.88 3.75c-.85 1.72-2.63 2.25-3.39-.22-.4-1.34-.43-3.59-.13-5.47.3-1.9 1.14-3.35 2.53-3.22 1.38.13 2.02 1.9 1.87 5.16ZM96.8 28.57c-.02 2.67-.44 5.01-1.34 5.7-1.29.96-3 .23-2.65-1.72.31-1.72 1.8-3.48 4-5.64l-.01 1.66Zm-.35-10a10.56 10.56 0 0 1-.88 3.77c-.85 1.72-2.64 2.25-3.39-.22-.5-1.69-.38-3.87-.13-5.25.33-1.78 1.12-3.44 2.53-3.44 1.38 0 2.06 1.5 1.87 5.14Zm-13.41-.02a9.54 9.54 0 0 1-.87 3.8c-.88 1.7-2.63 2.24-3.4-.23-.55-1.77-.36-4.2-.13-5.5.34-1.95 1.2-3.32 2.53-3.2 1.38.14 2.04 1.9 1.87 5.13Zm61.45 1.81c-.33 0-.49.35-.61.93-.44 2.02-.9 2.48-1.5 2.48-.66 0-1.26-1-1.42-3-.12-1.58-.1-4.48.06-7.37.03-.59-.14-1.17-1.73-1.75-.68-.25-1.68-.62-2.17.58a29.65 29.65 0 0 0-2.08 7.14c0 .06-.08.07-.1-.06-.07-.87-.26-2.46-.28-5.79 0-.65-.14-1.2-.86-1.65-.47-.3-1.88-.81-2.4-.2-.43.5-.94 1.87-1.47 3.48l-.74 2.2.01-4.88c0-.5-.34-.67-.45-.7a9.54 9.54 0 0 0-1.8-.37c-.48 0-.6.27-.6.67 0 .05-.08 4.65-.08 7.87v.46c-.27 1.48-1.14 3.49-2.09 3.49s-1.4-.84-1.4-4.68c0-2.24.07-3.21.1-4.83.02-.94.06-1.65.06-1.81-.01-.5-.87-.75-1.27-.85-.4-.09-.76-.13-1.03-.11-.4.02-.67.27-.67.62v.55a3.71 3.71 0 0 0-1.83-1.49c-1.44-.43-2.94-.05-4.07 1.53a9.31 9.31 0 0 0-1.66 4.73c-.16 1.5-.1 3.01.17 4.3-.33 1.44-.96 2.04-1.64 2.04-.99 0-1.7-1.62-1.62-4.4.06-1.84.42-3.13.82-4.99.17-.8.04-1.2-.31-1.6-.32-.37-1-.56-1.99-.33-.7.16-1.7.34-2.6.47 0 0 .05-.21.1-.6.23-2.03-1.98-1.87-2.69-1.22-.42.39-.7.84-.82 1.67-.17 1.3.9 1.91.9 1.91a22.22 22.22 0 0 1-3.4 7.23v-.7c-.01-3.36.03-6 .05-6.95.02-.94.06-1.63.06-1.8 0-.36-.22-.5-.66-.67-.4-.16-.86-.26-1.34-.3-.6-.05-.97.27-.96.65v.52a3.7 3.7 0 0 0-1.84-1.49c-1.44-.43-2.94-.05-4.07 1.53a10.1 10.1 0 0 0-1.66 4.72c-.15 1.57-.13 2.9.09 4.04-.23 1.13-.89 2.3-1.63 2.3-.95 0-1.5-.83-1.5-4.67 0-2.24.07-3.21.1-4.83.02-.94.06-1.65.06-1.81 0-.5-.87-.75-1.27-.85-.42-.1-.79-.13-1.06-.1-.37.02-.63.35-.63.6v.56a3.7 3.7 0 0 0-1.84-1.49c-1.44-.43-2.93-.04-4.07 1.53-.75 1.03-1.35 2.17-1.66 4.7a15.8 15.8 0 0 0-.12 2.04c-.3 1.81-1.61 3.9-2.68 3.9-.63 0-1.23-1.21-1.23-3.8 0-3.45.22-8.36.25-8.83l1.62-.03c.68 0 1.29.01 2.19-.04.45-.02.88-1.64.42-1.84-.21-.09-1.7-.17-2.3-.18-.5-.01-1.88-.11-1.88-.11s.13-3.26.16-3.6c.02-.3-.35-.44-.57-.53a7.77 7.77 0 0 0-1.53-.44c-.76-.15-1.1 0-1.17.64-.1.97-.15 3.82-.15 3.82-.56 0-2.47-.11-3.02-.11-.52 0-1.08 2.22-.36 2.25l3.2.09-.03 6.53v.47c-.53 2.73-2.37 4.2-2.37 4.2.4-1.8-.42-3.15-1.87-4.3-.54-.42-1.6-1.22-2.79-2.1 0 0 .69-.68 1.3-2.04.43-.96.45-2.06-.61-2.3-1.75-.41-3.2.87-3.63 2.25a2.61 2.61 0 0 0 .5 2.66l.15.19c-.4.76-.94 1.78-1.4 2.58-1.27 2.2-2.24 3.95-2.97 3.95-.58 0-.57-1.77-.57-3.43 0-1.43.1-3.58.19-5.8.03-.74-.34-1.16-.96-1.54a4.33 4.33 0 0 0-1.64-.69c-.7 0-2.7.1-4.6 5.57-.23.69-.7 1.94-.7 1.94l.04-6.57c0-.16-.08-.3-.27-.4a4.68 4.68 0 0 0-1.93-.54c-.36 0-.54.17-.54.5l-.07 10.3c0 .78.02 1.69.1 2.09.08.4.2.72.36.91.15.2.33.34.62.4.28.06 1.78.25 1.86-.32.1-.69.1-1.43.89-4.2 1.22-4.31 2.82-6.42 3.58-7.16.13-.14.28-.14.27.07l-.22 5.32c-.2 5.37.78 6.36 2.17 6.36 1.07 0 2.58-1.06 4.2-3.74l2.7-4.5 1.58 1.46c1.28 1.2 1.7 2.36 1.42 3.45-.21.83-1.02 1.7-2.44.86-.42-.25-.6-.44-1.01-.71-.23-.15-.57-.2-.78-.04-.53.4-.84.92-1.01 1.55-.17.61.45.94 1.09 1.22.55.25 1.74.47 2.5.5 2.94.1 5.3-1.42 6.94-5.34.3 3.38 1.55 5.3 3.72 5.3 1.45 0 2.91-1.88 3.55-3.72.18.75.45 1.4.8 1.96 1.68 2.65 4.93 2.07 6.56-.18.5-.69.58-.94.58-.94a3.07 3.07 0 0 0 2.94 2.87c1.1 0 2.23-.52 3.03-2.31.09.2.2.38.3.56 1.68 2.65 4.93 2.07 6.56-.18l.2-.28.05 1.4-1.5 1.37c-2.52 2.3-4.44 4.05-4.58 6.09-.18 2.6 1.93 3.56 3.53 3.69a4.5 4.5 0 0 0 4.04-2.11c.78-1.15 1.3-3.63 1.26-6.08l-.06-3.56a28.55 28.55 0 0 0 5.42-9.44s.93.01 1.92-.05c.32-.02.41.04.35.27-.07.28-1.25 4.84-.17 7.88.74 2.08 2.4 2.75 3.4 2.75 1.15 0 2.26-.87 2.85-2.17l.23.42c1.68 2.65 4.92 2.07 6.56-.18.37-.5.58-.94.58-.94.36 2.2 2.07 2.88 3.05 2.88 1.02 0 2-.42 2.78-2.28.03.82.08 1.49.16 1.7.05.13.34.3.56.37.93.34 1.88.18 2.24.11.24-.05.43-.25.46-.75.07-1.33.03-3.56.43-5.21.67-2.79 1.3-3.87 1.6-4.4.17-.3.36-.35.37-.03.01.64.04 2.52.3 5.05.2 1.86.46 2.96.65 3.3.57 1 1.27 1.05 1.83 1.05.36 0 1.12-.1 1.05-.73-.03-.31.02-2.22.7-4.96.43-1.79 1.15-3.4 1.41-4 .1-.21.15-.04.15 0-.06 1.22-.18 5.25.32 7.46.68 2.98 2.65 3.32 3.34 3.32 1.47 0 2.67-1.12 3.07-4.05.1-.7-.05-1.25-.48-1.25Z"
                                    fill="currentColor" fill-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="menu">
                        <ul>
                            <li>
                                <a class="active" href="home.html">
                                    <svg class="me-3" aria-label="Home" class="x1lliihq x1n2onr6 x5n08af"
                                        fill="currentColor" style="color: white" height="24" role="img"
                                        viewBox="0 0 24 24" width="24">
                                        <title>Home</title>
                                        <path
                                            d="M22 23h-6.001a1 1 0 0 1-1-1v-5.455a2.997 2.997 0 1 0-5.993 0V22a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V11.543a1.002 1.002 0 0 1 .31-.724l10-9.543a1.001 1.001 0 0 1 1.38 0l10 9.543a1.002 1.002 0 0 1 .31.724V22a1 1 0 0 1-1 1Z">
                                        </path>
                                    </svg>
                                    <span class="d-none d-lg-block text-white fw-semibold">Home</span>
                                </a>
                            </li>
                            <li id="search_icon">
                                <a href="#">
                                    <svg class="me-3" style="color: white" aria-label="Search"
                                        class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24"
                                        role="img" viewBox="0 0 24 24" width="24">
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
                            <li>
                                <a href="{{ asset('homePage/explore.html') }}">
                                    <svg class="me-3" style="color: white" aria-label="Explore"
                                        class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24"
                                        role="img" viewBox="0 0 24 24" width="24">
                                        <title>Explore</title>
                                        <polygon fill="none"
                                            points="13.941 13.953 7.581 16.424 10.06 10.056 16.42 7.585 13.941 13.953"
                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"></polygon>
                                        <polygon fill-rule="evenodd"
                                            points="10.06 10.056 13.949 13.945 7.581 16.424 10.06 10.056"></polygon>
                                        <circle cx="12.001" cy="12.005" fill="none" r="10.5"
                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"></circle>
                                    </svg> <span class="d-none d-lg-block text-white fw-semibold">Explore</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('homePage/reels.html') }}">
                                    <svg class="me-3" style="color: white" aria-label="Reels"
                                        class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24"
                                        role="img" viewBox="0 0 24 24" width="24">
                                        <title>Reels</title>
                                        <line fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="2" x1="2.049" x2="21.95" y1="7.002"
                                            y2="7.002"></line>
                                        <line fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" x1="13.504" x2="16.362"
                                            y1="2.001" y2="7.002"></line>
                                        <line fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" x1="7.207" x2="10.002"
                                            y1="2.11" y2="7.002"></line>
                                        <path
                                            d="M2 12.001v3.449c0 2.849.698 4.006 1.606 4.945.94.908 2.098 1.607 4.946 1.607h6.896c2.848 0 4.006-.699 4.946-1.607.908-.939 1.606-2.096 1.606-4.945V8.552c0-2.848-.698-4.006-1.606-4.945C19.454 2.699 18.296 2 15.448 2H8.552c-2.848 0-4.006.699-4.946 1.607C2.698 4.546 2 5.704 2 8.552Z"
                                            fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"></path>
                                        <path
                                            d="M9.763 17.664a.908.908 0 0 1-.454-.787V11.63a.909.909 0 0 1 1.364-.788l4.545 2.624a.909.909 0 0 1 0 1.575l-4.545 2.624a.91.91 0 0 1-.91 0Z"
                                            fill-rule="evenodd"></path>
                                    </svg> <span class="d-none d-lg-block text-white fw-semibold">Reels</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('homePage/messages.html') }}">
                                    <svg class="me-3" style="color: white" aria-label="Messenger"
                                        class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24"
                                        role="img" viewBox="0 0 24 24" width="24">
                                        <title>Messenger</title>
                                        <path
                                            d="M12.003 2.001a9.705 9.705 0 1 1 0 19.4 10.876 10.876 0 0 1-2.895-.384.798.798 0 0 0-.533.04l-1.984.876a.801.801 0 0 1-1.123-.708l-.054-1.78a.806.806 0 0 0-.27-.569 9.49 9.49 0 0 1-3.14-7.175 9.65 9.65 0 0 1 10-9.7Z"
                                            fill="none" stroke="currentColor" stroke-miterlimit="10"
                                            stroke-width="1.739"></path>
                                        <path
                                            d="M17.79 10.132a.659.659 0 0 0-.962-.873l-2.556 2.05a.63.63 0 0 1-.758.002L11.06 9.47a1.576 1.576 0 0 0-2.277.42l-2.567 3.98a.659.659 0 0 0 .961.875l2.556-2.049a.63.63 0 0 1 .759-.002l2.452 1.84a1.576 1.576 0 0 0 2.278-.42Z"
                                            fill-rule="evenodd"></path>
                                    </svg> <span class="d-none d-lg-block text-white fw-semibold">Messages</span>
                                </a>
                            </li>
                            <li class="notification_icon">
                                <a href="#">
                                    <svg class="me-3" style="color: white;" aria-label="Notifications"
                                        class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24"
                                        role="img" viewBox="0 0 24 24" width="24">
                                        <title>Notifications</title>
                                        <path
                                            d="M17.075 1.987a5.852 5.852 0 0 0-5.07 2.66l-.008.012-.01-.014a5.878 5.878 0 0 0-5.062-2.658A6.719 6.719 0 0 0 .5 8.952c0 3.514 2.581 5.757 5.077 7.927.302.262.607.527.91.797l1.089.973c2.112 1.89 3.149 2.813 3.642 3.133a1.438 1.438 0 0 0 1.564 0c.472-.306 1.334-1.07 3.755-3.234l.978-.874c.314-.28.631-.555.945-.827 2.478-2.15 5.04-4.372 5.04-7.895a6.719 6.719 0 0 0-6.425-6.965Z">
                                        </path>
                                    </svg> <span class="d-none d-lg-block text-white fw-semibold">Notifications</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#create_modal">
                                    <svg class="me-3" style="color: white;" aria-label="New post"
                                        class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24"
                                        role="img" viewBox="0 0 24 24" width="24">
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
                            <li>
                                <a href="{{ asset('homePage/profile.html') }}">
                                    <img class="circle story" src="{{ asset('homePage/images/profile_img.jpg') }}">
                                    <span class="d-none d-lg-block text-white fw-semibold">Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="more">
                        <div class="btn-group dropup">
                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="{{ asset('homePage/images/menu.png') }}">
                                <span class="d-none d-lg-block text-white fw-semibold">More</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">
                                        <span>Settings</span>
                                        <img src="{{ asset('homePage/images/reglage.png') }}">
                                    </a></li>
                                <li><a class="dropdown-item" href="#">
                                        <span>Your activity</span>
                                        <img src="{{ asset('homePage/images/history.png') }}">
                                    </a></li>
                                <li><a class="dropdown-item" href="#">
                                        <span>Saved</span>
                                        <img src="{{ asset('homePage/images/save-instagram.png') }}">
                                    </a></li>
                                <li><a class="dropdown-item" href="#">
                                        <span>Switch apperance</span>
                                        <img src="{{ asset('homePage/images/moon.png') }}">
                                    </a></li>
                                <li><a class="dropdown-item" href="#">
                                        <span>Report a problem</span>
                                        <img src="{{ asset('homePage/images/problem.png') }}">
                                    </a></li>
                                <li><a class="dropdown-item bold_border" href="#">
                                        <span>Switch accounts</span>
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ asset('homePage/login.html') }}">
                                        <span>Log out</span>
                                    </a></li>
                            </ul>
                        </div>
                        <!--  -->

                    </div>
                </div>
                <!-- nav for small screen  -->
                <div class="nav_sm">
                    <div class="content">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="logo" src="{{ asset('homePage/images/logo_menu.png') }}">
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">
                                        <span>Following</span>
                                        <img src="{{ asset('homePage/images/add-friend.png') }}">
                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="#">
                                        <span>Favorites</span>
                                        <img src="{{ asset('homePage/images/star.png') }}">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="left">
                            <div class="search_bar">
                                <div class="input-group">
                                    <div class="form-outline">
                                        <div>
                                            <img src="{{ asset('homePage/images/search.png') }}" alt="search">
                                        </div>
                                        <input type="search" id="form1" class="form-control"
                                            placeholder="Search" />
                                    </div>
                                </div>
                            </div>
                            <div class="notifications notification_icon">
                                <a href="{{ asset('homePage/notification.html') }}">
                                    <img src="{{ asset('homePage/images/love.png') }}">
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- nav for ex-small screen  -->
                <div class="nav_xm">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img class="logo" src="{{ asset('homePage/images/logo_menu.png') }}">
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">
                                    <span>Following</span>
                                    <img src="{{ asset('homePage/images/add-friend.png') }}">
                                </a></li>
                            <li><a class="dropdown-item" href="#">
                                    <span>Favorites</span>
                                    <img src="{{ asset('homePage/images/star.png') }}">
                                </a></li>
                        </ul>
                    </div>
                    <div class="left">

                        <img src="{{ asset('homePage/images/send.png') }}">
                        <a href="{{ asset('homePage/notification.html') }}">
                            <img class="notification_icon" src="{{ asset('homePage/images/love.png') }}">
                        </a>

                    </div>
                </div>
            </div>
            <!-- menu in the botton for smal screen  -->
            <div class="nav_bottom">
                <a href="{{ asset('homePage/home.html') }}"><img
                        src="{{ asset('homePage/images/accueil.png') }}"></a>
                <a href="{{ asset('homePage/explore.html') }}"><img
                        src="{{ asset('homePage/images/compass.png') }}"></a>
                <a href="{{ asset('homePage/reels.html') }}"><img
                        src="{{ asset('homePage/images/video.png') }}"></a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#create_modal"><img
                        src="{{ asset('homePage/images/tab.png') }}"></a>
                <a href="profile.html")}}"><img class="circle story"
                        src="{{ asset('homePage/images/profile_img.jpg') }}"></a>
            </div>
        </div>
        <!-- search  -->
        <div id="search" class="search_section">
            <h2>Search</h2>
            <form method="post">
                <input type="text" placeholder="Search">
            </form>
            <div class="find">
                <div class="desc">
                    <h4>Recent</h4>
                    <p><a href="#">Clear all</a></p>
                </div>
                <div class="account">
                    <div class="cart">
                        <div>
                            <div class="img">
                                <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                            </div>
                            <div class="info">
                                <p class="name">Zineb_essoussi</p>
                                <p class="second_name">Zim Ess</p>
                            </div>
                        </div>
                        <div class="clear">
                            <a href="#">X</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- search  -->
        <!-- notification -->
        <div id="notification" class="notification_section">
            <h2>Notifications</h2>
            <div class="notifications">
                <div class="notif follow_notif">
                    <div class="cart">
                        <div>
                            <div class="img">
                                <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                            </div>
                            <div class="info">
                                <p class="name">
                                    Zineb_essoussi
                                    <span class="desc">started following you.</span>
                                    <span class="time">2h</span>
                                </p>

                            </div>
                        </div>
                        <div class="follow_you">
                            <button class="follow_text">Follow</button>
                        </div>
                    </div>
                </div>
                <div class="notif follow_notif">
                    <div class="cart">
                        <div>
                            <div class="img">
                                <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                            </div>
                            <div class="info">
                                <p class="name">
                                    Zineb_essoussi
                                    <span class="desc">started following you.</span>
                                    <span class="time">2h</span>
                                </p>

                            </div>
                        </div>
                        <div class="follow_you">
                            <button class="follow_text">Follow</button>
                        </div>
                    </div>
                </div>
                <div class="notif story_notif">
                    <div class="cart">
                        <div>
                            <div class="img">
                                <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                            </div>
                            <div class="info">
                                <div class="info">
                                    <p class="name">
                                        Zineb_essoussi
                                        <span class="desc">liked your story.</span>
                                        <span class="time">2d</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="story_like">
                            <img src="{{ asset('homePage/images/img2.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="notif follow_notif">
                    <div class="cart">
                        <div>
                            <div class="img">
                                <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                            </div>
                            <div class="info">
                                <p class="name">
                                    Zineb_essoussi
                                    <span class="desc">started following you.</span>
                                    <span class="time">2h</span>
                                </p>

                            </div>
                        </div>
                        <div class="follow_you">
                            <button class="follow_text">Follow</button>
                        </div>
                    </div>
                </div>
                <div class="notif story_notif">
                    <div class="cart">
                        <div>
                            <div class="img">
                                <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                            </div>
                            <div class="info">
                                <div class="info">
                                    <p class="name">
                                        Zineb_essoussi
                                        <span class="desc">liked your story.</span>
                                        <span class="time">2d</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="story_like">
                            <img src="{{ asset('homePage/images/img2.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="notif follow_notif">
                    <div class="cart">
                        <div>
                            <div class="img">
                                <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                            </div>
                            <div class="info">
                                <p class="name">
                                    Zineb_essoussi
                                    <span class="desc">started following you.</span>
                                    <span class="time">2h</span>
                                </p>

                            </div>
                        </div>
                        <div class="follow_you">
                            <button class="follow_text">Follow</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--***** nav menu end ****** -->

        <div class="second_container">
            <!--***** posts_container start ****** -->
            <div class="main_section">
                <div class="posts_container">
                    <div class="stories">
                        <div class="owl-carousel items">
                        </div>
                    </div>

                    <div class="posts">
                        @foreach ($posts as $post)
                            <div class="post">
                                <div class="info">
                                    <div class="person">
                                        <img src="${post_data[i][0]}">
                                        <a href="#" class="text-white">{{ $post->user->name }}</a>
                                        <span class="circle">.</span>
                                        <span>{{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="more">
                                        <img src="{{ asset('homePage/images/show_more.png') }}" alt="show more">
                                    </div>
                                </div>
                                @if ($post->images->isEmpty())
                                    @foreach ($post->videos as $video)
                                        <div class="video">
                                            <!-- Display video player here using the video URL -->
                                            <video controls>
                                                <source src="{{ $video->url }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    @endforeach
                                @else
                                    @foreach ($post->images as $img)
                                        <div class="image">
                                            <img src="{{ $img->url }}">
                                        </div>
                                    @endforeach
                                @endif

                                <div class="desc">
                                    <div class="icons">
                                        <div class="icon_left d-flex">
                                        <div class="like">
                                                    <form id="likeForm" data-post-id="{{ $post->id }}" style="display: inline;">
                                                        @csrf
                                                        {{-- Like button --}}
                                                        <button type="button" class="likeButton" style="background: none; border: none; cursor: pointer;">
                                                            <svg class="not_loved" aria-label="Like" fill="<?php echo $post->likes->contains('user_id', auth()->id()) ? 'red' : 'white'; ?>" height="24" role="img" viewBox="0 0 24 24" width="24" id="svg-{{$post->id}}">
                                                                <title><?php echo $post->likes->contains('user_id', auth()->id()) ? 'Unlike' : 'Like'; ?></title>
                                                                <path
                                                                    d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>


                                            <div class="chat">
                                                <button type="button" class="btn p-0 m-0" data-bs-toggle="modal"
                                                    data-bs-target="#message_modal">
                                                    <svg class="ms-3 m-0 p-0" style="color: white"
                                                        aria-label="Comment" class="x1lliihq x1n2onr6 x5n08af"
                                                        fill="currentColor" height="24" role="img"
                                                        viewBox="0 0 24 24" width="24">
                                                        <title>Comment</title>
                                                        <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z"
                                                            fill="none" stroke="currentColor"
                                                            stroke-linejoin="round" stroke-width="2"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="send">
                                                <button type="button" class="btn p-0" data-bs-toggle="modal"
                                                    data-bs-target="#send_message_modal">
                                                    <svg class="ms-3 m-0 p-0" style="color: white"
                                                        aria-label="Share Post" class="x1lliihq x1n2onr6 x1roi4f4"
                                                        fill="currentColor" height="24" role="img"
                                                        viewBox="0 0 24 24" width="24">
                                                        <title>Share Post</title>
                                                        <line fill="none" stroke="currentColor"
                                                            stroke-linejoin="round" stroke-width="2" x1="22"
                                                            x2="9.218" y1="3" y2="10.083"></line>
                                                        <polygon fill="none"
                                                            points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334"
                                                            stroke="currentColor" stroke-linejoin="round"
                                                            stroke-width="2"></polygon>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <form action="{{ route('posts.save-post') }}" method="post">
                                            @csrf
                                            <div class="save not_saved">
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <button type="submit" class="btn">
                                                    {{-- <img class="hide saved"
                                                        src="{{ asset('homePage/images/save_black.png') }}"> --}}
                                                    {{-- <img class="not_saved" src="{{ 'homePage/images/save-instagram.png' }}"> --}}
                                                    <img class="not_saved"
                                                        src="{{ asset('homePage/images/bookmark.png') }}">
                                                </button>

                                            </div>
                                        </form>
                                    </div>
                                    <div class="liked">
                                    <a class="bold text-white" data-bs-toggle="modal" data-bs-target="#likersModal" id="likers-{{$post->id}}">{{ $post->likes_count }} likes</a>
                                    </div>
                                    <div class="modal fade" id="likersModal" tabindex="-1" aria-labelledby="likersModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                                <div class="modal-content bg-dark text-white">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="likersModalLabel">Likes</h1>
                                                        <i class="btn-close fa-2x fa-solid fa-xmark text-white" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true" id="likersClose"></i>
                                                    </div>
                                                    <div class="modal-body">
                                                        @foreach ($post->likers as $liker)
                                                        <div class="d-flex flex-row justify-content-between align-items-center mb-4">
                                                            <div class="d-flex flex-row align-items-center">
                                                                <img class="rounded-circle" src="{{ asset('homePage/images/profile_img.jpg') }}" width="55" />
                                                                <div class="d-flex flex-column align-items-start ml-2">
                                                                    <span class="font-weight-bold" style="font-size: 1.6em;">{{ $liker->name }}</span>
                                                                </div>
                                                            </div>
                                                            @if(auth()->user()->isNot($liker))
                                                            @if(auth()->user()->followings && auth()->user()->followings->contains($liker))
                                                            <form method="POST" action="{{ route('unfollow', $liker) }}">
                                                                @csrf
                                                                <div class="d-flex flex-row align-items-center mt-2 ">
                                                                    <button type="submit" class="btn  btn-lg bg-secondary  text-white unfollow">Unfollow</button>
                                                                </div>
                                                            </form>
                                                            @elseif($liker->followings && $liker->followings->contains(auth()->user()))
                                                            <form method="POST" action="{{ route('follow', $liker) }}">
                                                                @csrf
                                                                <div class="d-flex flex-row align-items-center mt-2">
                                                                    <button type="submit" class="btn btn-primary btn-lg ">Follow Back</button>
                                                                </div>
                                                            </form>
                                                            @else
                                                            <form method="POST" action="{{ route('follow', $liker) }}">
                                                                @csrf
                                                                <div class="d-flex flex-row align-items-center mt-2">
                                                                    <button type="submit" class="btn btn-primary btn-lg ">Follow</button>
                                                                </div>
                                                            </form>
                                                            @endif
                                                            @endif
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="post_desc">
                                        <p>
                                            <a class="text-white" href="#">{{ $post->body }}</a>
                                        </p>
                                        <div class="comments-section" data-post-id="{{ $post->id }}">
                                            {{-- posts comments --}}
                                            @foreach ($post->comments()->take(3)->get() as $comment)
                                                <div class="comment d-flex justify-content-between align-items-center">
                                                    <p>
                                                        <strong class="text-white">{{ $comment->user->name }}</strong>
                                                        <span class="text-white">{{ $comment->comment }}</span>
                                                    </p>
                                                    <div class="like">
                                                        @if ($comment->likes->contains(auth()->id()))
                                                            <form action="{{ route('comments.unlike', $comment) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-link"><img
                                                                        class="not-loved"
                                                                        src="{{ asset('homePage/images/heart.png') }}"
                                                                        alt="heart image" srcset=""></button>
                                                            </form>
                                                        @else
                                                            <form action="{{ route('comments.like', $comment) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-link"><img
                                                                        class=" bg-body-emphasis"
                                                                        src="{{ asset('homePage/images/love.png') }}"
                                                                        alt="" srcset=""></button>
                                                            </form>
                                                        @endif
                                                        <span class="text-white">{{ $comment->likes()->count() }}
                                                            Likes</span>
                                                    </div>
                                                </div>
                                            @endforeach

                                            @if ($post->comments()->count() > 3)
                                                <div class="view-all-comments" data-bs-toggle="modal"
                                                    data-bs-target="#commentsModal"
                                                    data-post-id="{{ $post->id }}">
                                                    <a href="#" class="gray">View all
                                                        {{ $post->comments()->count() }} comments</a>
                                                </div>
                                            @endif

                                            {{-- comments modal --}}
                                            <div class="modal fade" id="commentsModal" tabindex="-1"
                                                aria-labelledby="commentsModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="commentsModalLabel">All
                                                                Comments</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="comments-list">
                                                                {{-- modal comments --}}
                                                                @foreach ($post->comments as $comment)
                                                                    <div
                                                                        class="comment d-flex justify-content-between align-items-center">
                                                                        <p>
                                                                            <strong>{{ $comment->user->name }}</strong>
                                                                            <span>{{ $comment->comment }}</span>
                                                                        </p>
                                                                        <div class="like">
                                                                            @if ($comment->likes->contains(auth()->id()))
                                                                                <form
                                                                                    action="{{ route('comments.unlike', $comment) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    <button type="submit"
                                                                                        class="btn btn-link"><img
                                                                                            class="not-loved"
                                                                                            src="{{ asset('homePage/images/heart.png') }}"
                                                                                            alt="heart image"
                                                                                            srcset=""></button>
                                                                                </form>
                                                                            @else
                                                                                <form
                                                                                    action="{{ route('comments.like', $comment) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    <button type="submit"
                                                                                        class="btn btn-link"><img
                                                                                            class="loved"
                                                                                            src="{{ asset('homePage/images/love2.png') }}"
                                                                                            alt=""
                                                                                            srcset=""></button>
                                                                                </form>
                                                                            @endif
                                                                            <span>{{ $comment->likes()->count() }}
                                                                                Likes</span>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('comments.store') }}" method="POST">
                                            @csrf
                                            <div class="comment">
                                                <input type="text" name="comment" placeholder="Add a comment...">
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <button type="submit" class="btn">Post</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            {{-- add new comment modal --}}
                            <div class="modal fade" id="message_modal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Comments</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="comments">
                                                @foreach ($post->comments as $comment)
                                                    <div class="comment mb-3">
                                                        <div class="d-flex">
                                                            <div class="img">
                                                                <img src="{{ asset('homePage/images/profile_img.jpg') }}"
                                                                    alt="Profile Image">
                                                            </div>
                                                            <div class="content">
                                                                <div class="person">
                                                                    <h4>{{ $comment->user->name }}</h4>
                                                                    <span>{{ $comment->created_at->diffForHumans() }}</span>
                                                                </div>
                                                                <p class="lead">{{ $comment->comment }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="like">
                                                            @if ($comment->likes->contains(auth()->id()))
                                                                <form
                                                                    action="{{ route('comments.unlike', $comment) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-link"><img
                                                                            class="not-loved"
                                                                            src="{{ asset('homePage/images/heart.png') }}"
                                                                            alt="heart image" srcset=""></button>
                                                                </form>
                                                            @else
                                                                <form action="{{ route('comments.like', $comment) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-link"><img
                                                                            class="loved"
                                                                            src="{{ asset('homePage/images/love2.png') }}"
                                                                            alt="" srcset=""></button>
                                                                </form>
                                                            @endif
                                                            <span class="fs-7">{{ $comment->likes()->count() }}
                                                                Likes</span>
                                                        </div>
                                                    </div>
                                                    <!-- Responses -->
                                                    {{-- <div class="responses">
                                                @foreach ($comment->responses as $response)
                                                <div class="response comment">
                                                    <div class="d-flex">
                                                        <div class="img">
                                                            <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="Profile Image">
                                                        </div>
                                                        <div class="content">
                                                            <div class="person">
                                                                <h4>{{ $response->user->name }}</h4>
                                                                <span>{{ $response->created_at->diffForHumans() }}</span>
                                                            </div>
                                                            <p>{{ $response->comment }}</p>
                                                            <!-- Add replay and translation buttons if needed -->
                                                        </div>
                                                    </div>
                                                    <div class="like">
                                                        <!-- You can add like functionality here if needed -->
                                                        <img class="not_loved" src="{{ asset('homePage/images/love.png') }}" alt="Not Loved">
                                                        <img class="loved" src="{{ asset('homePage/images/heart.png') }}" alt="Loved">
                                                        <p>{{ $response->likes()->count() }}</p>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div> --}}
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <form action="{{ route('comments.store') }}" method="post">
                                                @csrf
                                                <div class="input-group">
                                                    <img src="{{ asset('homePage/images/profile_img.jpg') }}"
                                                        class="img-fluid" alt="Profile Image">
                                                    <input type="text" id="emoji_comment" name="comment"
                                                        class="form-control" placeholder="Add a comment...">
                                                    <input type="hidden" name="post_id"
                                                        value="{{ $post->id }}">
                                                    <button type="submit" class="btn">Add</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <!--***** posts_container end ****** -->

            <!--***** followers_container start ****** -->
            <div class="followers_container">
                <div>
                    <div class="cart">
                        <div>
                            <div class="img">
                                <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                            </div>
                            <div class="info">
                                <p class="name">Zineb_essoussi</p>
                                <p class="second_name">Zim Ess</p>
                            </div>
                        </div>
                        <div class="switch">
                            <a href="#">Switch</a>
                        </div>
                    </div>
                    <div class="suggestions">
                        <div class="title">
                            <h4>Suggestions for you</h4>
                            <a class="dark" href="#">See All</a>
                        </div>
                        <div class="cart">
                            <div>
                                <div class="img">
                                    <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                                </div>
                                <div class="info">
                                    <p class="name">Zineb_essoussi</p>
                                    <p class="second_name">Zim Ess</p>
                                </div>
                            </div>
                            <div class="switch">
                                <button class="follow_text" href="#">follow</button>
                            </div>
                        </div>
                        <div class="cart">
                            <div>
                                <div class="img">
                                    <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                                </div>
                                <div class="info">
                                    <p class="name">Zineb_essoussi</p>
                                    <p class="second_name">Zim Ess</p>
                                </div>
                            </div>
                            <div class="switch">
                                <button class="follow_text" href="#">follow</button>
                            </div>
                        </div>
                        <div class="cart">
                            <div>
                                <div class="img">
                                    <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                                </div>
                                <div class="info">
                                    <p class="name">Zineb_essoussi</p>
                                    <p class="second_name">Zim Ess</p>
                                </div>
                            </div>
                            <div class="switch">
                                <button class="follow_text" href="#">follow</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--***** followers_container end ****** -->

        </div>

        <!-- Modal for sending posts-->
        <div class="modal fade" id="send_message_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Share</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="send">
                            <div class="search_person">
                                <p>To:</p>
                                <input type="text" placeholder="Search">
                            </div>
                            <p>Suggested</p>
                            <div class="poeple">
                                <div class="person">
                                    <div class="d-flex">
                                        <div class="img">
                                            <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                                        </div>
                                        <div class="content">
                                            <div class="person">
                                                <h4>namePerson</h4>
                                                <span>zim ess</span>
                                            </div>
                                        </div>
                                    </div>
                                    <di class="circle">
                                        <span></span>
                                </div>
                            </div>
                            <div class="person">
                                <div class="d-flex">
                                    <div class="img">
                                        <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <div class="person">
                                            <h4>namePerson</h4>
                                            <span>zim ess</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="circle">
                                    <span></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Send</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal for add messages-->

        <!--Create model-->
        <div class="modal fade" id="create_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title w-100 fs-5 d-flex align-items-end justify-content-between"
                            id="exampleModalLabel">
                            <span class="title_create">Create new post</span>
                            <button class="next_btn_post btn_link"></button>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img class="up_load" src="{{ asset('/homePage/images/upload.png') }}" alt="upload">
                        <p>Drag photos and videos here</p>
                        <button class="btn btn-primary btn_upload">
                            select from your computer
                            <form id="upload-form">
                                <input multiple class="input_select" type="file" id="image-upload"
                                    name="image-upload">
                            </form>
                        </button>
                        <div id="image-container" class="hide_img carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <!-- Placeholder for images -->
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
                            <div class="description">
                                <div class="cart">
                                    <div>
                                        <div class="img">
                                            <img src="{{ asset('homePage/images/profile_img.jpg') }}">
                                        </div>
                                        <div class="info">
                                            <p class="name">Zineb_essoussi</p>
                                        </div>
                                    </div>
                                </div>
                                <form>
                                    <textarea class="postCaption" type="text " id="emoji_create" placeholder="Write a caption"></textarea>
                                </form>
                            </div>
                        </div>
                        <div class="post_published hide_img">
                            <img src="{{ asset('homePage/images/uploaded_post.gif') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('homePage/sass/vender/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('homePage/sass/vender/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
    <script src="{{ asset('homePage/owlcarousel/jquery.min.js') }}"></script>
    <script src="{{ asset('homePage/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('homePage/js/carousel.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
    <script src="{{ asset('homePage/js/main.js') }}"></script>
</body>

</html>
