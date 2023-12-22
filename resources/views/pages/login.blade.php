<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('/assets-landing-page/img/kamen-rider-dispress.png') }}"
        type="image/x-icon" />

    <!-- judul page -->
    <title>Login | Dispress</title>

    <!-- Bootstarp CSS -->
    <link rel="stylesheet" href="{{ asset('/assets-landing-page/css/bootstrap.min.css') }}" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('/assets-landing-page/css/login.css') }}" />
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
        <!-- Login Section Start -->
        <section class="login d-flex align-items-center" id="login" data-scroll-index="0">
            <div class="effect-wrap">
                <div class="spinner"></div>
                <i class="bi bi-plus effect effect-2"></i>
                <i class="bi bi-folder-fill effect effect-3"></i>
            </div>
            <div class="row container d-flex justify-content-center">
                <div class="col-12 d-flex login-brand justify-content-center mb-2">
                    <img class="m-1 d-md-none d-sm-block"
                        src="{{ asset('/assets-landing-page/img/kamen-rider-dispress.png') }}" width="100px"
                        alt="logo-dispress" />
                    <img class="logo-login pb-4 d-lg-block" src="{{ asset('/assets-landing-page/img/logo-brand.svg') }}"
                        alt="logo-dispress" width="250px" />
                </div>
                <div class="col-lg-10 card rounded-4 card-login">
                    <div class="row align-items-center">
                        <div class="col-md-5 text-center order-lg-last">
                            <div class="login-img me-5" data-aos="fade-up-left" data-aos-duration="1600">
                                <img class="login-img" src="{{ asset('/assets-landing-page/img/login-img.png') }}"
                                    alt="login image" />
                            </div>
                        </div>
                        <div class="col-md-6 order-lg-first form-login">
                            <a href="/" class="back-index">
                                <i class="bi bi-arrow-left-circle-fill back-index-icon fs-3 px-2"></i>
                            </a>
                            <form action="/login" method="POST" class="p-lg-4 p-md-4 ">
                                @csrf
                                <h2 class="login-title">Login</h2>
                                <div class="small-line-height">
                                    <small class="text-primary">Welcome, Please enter your credentials !</small>
                                </div>
                                <div class="form-input mt-3">
                                    <label for="login">Email or Username</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="login" id="login"
                                            placeholder="Enter Username or Email" autofocus required />
                                    </div>
                                    <span class="text-danger fs-6 text-center">
                                        @error('login')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-input">
                                    <label for="password">Password</label>
                                    <div class="col position-relative">
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="**********" required />
                                        <i class="bi bi-eye view-password-icon"></i>
                                    </div>
                                    <span class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger alert-login align-content-center d-flex justify-content-between"
                                            role="alert">
                                            <small class="fs-6 text-danger">
                                                <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
                                                {{ session('error') }}
                                            </small>
                                            <button type="button" class="btn-close" style="width: 10px;height: 10px"
                                                data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session()->has('success'))
                                        <div class="alert alert-success alert-login align-content-center d-flex justify-content-between"
                                            role="alert">
                                            <small class="fs-6 text-success">
                                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                {{ session('success') }}
                                            </small>
                                            <button type="button" class="btn-close" style="width: 10px;height: 10px"
                                                data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-submit-login mt-3"><i
                                        class="icon-btn-login bi-box-arrow-in-right"></i> <span> Login </span>
                                </button>
                                <div class="text-center mt-1 text-register">
                                    <small>Don't have an account? <a href="/register"
                                            class="text-decoration-none">Register</a></small>
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
