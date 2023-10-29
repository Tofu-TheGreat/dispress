<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('/assets-landing-page/img/kamen-rider-dispress.png') }}"
        type="image/x-icon" />

    <!-- judul page -->
    <title>Landing Page</title>

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
                <div class="col-lg-10 card rounded-4">
                    <div class="row align-items-center">
                        <div class="col-md-5 text-center order-lg-last">
                            <div class="login-img me-5" data-aos="fade-up-left" data-aos-duration="1600">
                                <img class="login-img" src="{{ asset('/assets-landing-page/img/login-img.png') }}"
                                    alt="login image" />
                            </div>
                        </div>
                        <div class="col-md-6 order-lg-first form-login">
                            <a href="/home" class="back-index">
                                <i class="bi bi-arrow-left-circle-fill back-index-icon fs-3 px-2"></i>
                            </a>
                            <form action="/login" method="POST" class="p-lg-5 p-md-4 p-sm-5">
                                @csrf
                                <h2 class="login-title">Login</h2>
                                <small>Welcome, Please enter your credentials</small>
                                <div class="form-input">
                                    <label for="login">Email or Username</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="login" id="login"
                                            placeholder="Enter Username or Email" autofocus />
                                    </div>
                                    <span class="text-danger">
                                        @error('login')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-input">
                                    <label for="password">Password</label>
                                    <div class="col">
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="**********" />
                                    </div>
                                    <span class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-submit-login mt-4"><i
                                        class="icon-btn-login bi-box-arrow-in-right"></i> <span> Login </span>
                                </button>
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
