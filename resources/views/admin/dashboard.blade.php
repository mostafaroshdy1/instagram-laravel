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
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
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


    <div id="successAlert" class="alert successAlert d-none">
    </div>
    <div id="warningAlert" class="alert warningAlert d-none">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-12 p-0">
                @include('includes.adminNavBar')
            </div>

            <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12 m-5 text-center">
                            <h1 class="header">All Users</h1>
                        </div>
                        @foreach ($users as $user)
                            @if ($user->email_verified_at != null && $user->isAdmin == 0)
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-4 p=0 text-center">
                                    <div class="card d-flex align-content-center">
                                        <div class="card-header">
                                            {{ $user->full_name }}
                                        </div>
                                        <div class="circular-image">
                                            <img src="{{ $user->avatar }}" class="card-img-top" alt="User Image">
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">{{ $user->email }}</p>
                                            <button type="submit" class="btn btn-light" data-bs-toggle="modal"
                                                data-bs-target="#adminEditModal" id="adminEdit"
                                                onclick="openEditModal('{{ $user->id }}')">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals and JavaScript scripts -->
    <div class="modal fade" id="adminEditModal" tabindex="-1" aria-labelledby="adminEditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm modal-dialog-scrollable">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h1 class="modal-title fs-2" id="adminEditModalLabel">Edit User</h1>
                    <i class="btn-close fa-2x fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close"
                        aria-hidden="true"></i>
                </div>
                <div class="modal-body ">
                    <form action="{{ route('admin.update.user', $user->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label class="toggle-switch">
                                <label for="isVerified">isVerified</label>
                                <input type="hidden" name="isVerified" value="0">
                                <input type="checkbox" name="isVerified" {{ $user->isVerified ? 'checked' : '' }}
                                    value="1">
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-modal-update">Update</button>
                        </div>
                    </form>
                    <form action="{{ route('admin.destroy.user', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-danger btn-modal-delete">Delete User</button>
                        </div>
                    </form>
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
    <script src="{{ asset('tags/js/script.js') }}"></script>
    <script src="{{ asset('admin/js/script.js') }}"></script>

</body>

</html>
