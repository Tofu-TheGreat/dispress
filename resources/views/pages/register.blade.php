<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('/assets-landing-page/img/kamen-rider-dispress.png') }}"
        type="image/x-icon" />

    <!-- judul page -->
    <title>Register | Dispress</title>

    <!-- Bootstarp CSS -->
    <link rel="stylesheet" href="{{ asset('/assets-landing-page/css/bootstrap.min.css') }}" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('/assets-landing-page/css/register.css') }}" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('/assets-landing-page/css/owl.carousel.min.css') }}" />
    <!-- aos carousel -->
    <link rel="stylesheet" href="{{ asset('/assets-landing-page/css/aos.css') }}" />

</head>

<body>
    <!-- Preloader Start -->
    <div class="preloader">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    <!-- Preloader End -->

    <!-- togle theme start -->
    <button class="button-theme">
        <i class="bi bi-sun-fill"></i>
    </button>
    <!-- togle theme end -->

    <div class="main">
        <!-- Register Section Start -->
        <section class="register d-flex align-items-center" id="register" data-scroll-index="0">
            <div class="effect-wrap">
                <div class="spinner"></div>
                <i class="bi bi-plus effect effect-2"></i>
                <i class="bi bi-folder-fill effect effect-3"></i>
            </div>
            <div class="row container d-flex justify-content-center">
                <div class="col-12 d-flex register-brand justify-content-center mb-2">
                    <img class="m-1 d-md-none d-sm-block"
                        src="{{ asset('/assets-landing-page/img/kamen-rider-dispress.png') }}" width="100px"
                        alt="logo-dispress" />
                    <img class="logo-register pb-4 d-lg-block"
                        src="{{ asset('/assets-landing-page/img/logo-brand.svg') }}" alt="logo-dispress"
                        width="250px" />
                </div>
                <div class="col-lg-10 card rounded-4 card-register mb-5">
                    <div class="row align-items-center">
                        <div class="col-12 order-lg-first form-register">
                            <a href="/" class="back-index">
                                <i class="bi bi-arrow-left-circle-fill back-index-icon fs-3 px-2"></i>
                            </a>
                            <form action="/register" method="POST" class="p-lg-4 p-md-4 row">
                                @csrf
                                <h2 class="register-title">Register</h2>
                                <div class="small-line-height mb-3 ">
                                    <small class="text-primary">Create your account !</small>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-input">
                                        <label for="nama">Nama lengkap</label>
                                        <div class="col">
                                            <input type="text" class="form-control" name="nama" id="nama"
                                                placeholder="ex: pasya nada albinaya" autofocus required />
                                        </div>
                                        <span class="text-danger fs-6 text-center">
                                            @error('nama')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-input ">
                                        <label for="nip">NIP</label>
                                        <div class="col">
                                            <input type="text" class="form-control" name="nip" id="nip"
                                                placeholder="ex: 213720078171677275" autofocus required />
                                        </div>
                                        <span class="text-danger fs-6 text-center">
                                            @error('nip')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-input">
                                        <label for="username">Username</label>
                                        <div class="col">
                                            <input type="text" class="form-control" name="username" id="username"
                                                placeholder="ex: pasya.nada" autofocus required />
                                        </div>
                                        <span class="text-danger fs-6 text-center">
                                            @error('username')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-input">
                                        <label for="email">Email</label>
                                        <div class="col">
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="ex: contoh@example.com" autofocus required />
                                        </div>
                                        <span class="text-danger fs-6 text-center">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-input">
                                        <label for="nomor_telpon">Nomor telepon</label>
                                        <div class="col">
                                            <input type="text" class="form-control" name="nomor_telpon"
                                                id="nomor_telpon" placeholder="ex: 0878-2730-3388" autofocus
                                                required />
                                        </div>
                                        <span class="text-danger fs-6 text-center">
                                            @error('nomor_telpon')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-input">
                                        <label for="password">Password</label>
                                        <div class="col position-relative">
                                            <input type="password" name="password" class="form-control"
                                                id="password" placeholder="**********" required />
                                            <i class="bi bi-eye view-password-icon"></i>
                                        </div>
                                        <span class="text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        @if (session()->has('error'))
                                            <div class="alert alert-danger alert-register align-content-center d-flex justify-content-between"
                                                role="alert">
                                                <small class="fs-6 text-danger">
                                                    <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
                                                    {{ session('error') }}
                                                </small>
                                                <button type="button" class="btn-close"
                                                    style="width: 10px;height: 10px" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                        @if (session()->has('success'))
                                            <div class="alert alert-success alert-register align-content-center d-flex justify-content-between"
                                                role="alert">
                                                <small class="fs-6 text-success">
                                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                    {{ session('success') }}
                                                </small>
                                                <button type="button" class="btn-close"
                                                    style="width: 10px;height: 10px" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="btn-submit-register-wrapper d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-submit-register col-12"><i
                                            class="icon-btn-register bi-box-arrow-in-right"></i> <span> Register
                                        </span>
                                    </button>
                                </div>
                                <div class="mt-1 text-register">
                                    <small>Already have an account? <a href="/login"
                                            class="text-decoration-none">Login</a></small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Login Section End -->
    </div>
    <!-- jquery js -->
    <script src="{{ asset('/assets-landing-page/js/jquery.min.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('/assets-landing-page/js/main.js') }}"></script>
    <!-- bootstrap bundle with popper -->
    <script src="{{ asset('/assets-landing-page/js/bootstrap.bundle.min.js') }}"></script>
    <!-- scrollit js -->
    <script src="{{ asset('/assets-landing-page/js/scrollIt.min.js') }}"></script>
    <!-- owl carousel js -->
    <script src="{{ asset('/assets-landing-page/js/owl.carousel.min.js') }}"></script>
    <!-- aos js -->
    <script src="{{ asset('/assets-landing-page/js/aos.js') }}"></script>

</body>

</html>
