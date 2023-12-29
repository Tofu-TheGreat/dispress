<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('/assets-landing-page/img/kamen-rider-dispress.png') }}"
        type="image/x-icon" />

    <!-- judul page -->
    <title>Petunjuk Teknis | Dispress</title>

    <!-- Bootstarp CSS -->
    <link rel="stylesheet" href="{{ asset('/assets-landing-page/css/bootstrap.min.css') }}" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('/assets-landing-page/css/style.css') }}" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets-landing-page/css/owl.carousel.min.css') }}" />
    <!-- aos carousel -->
    <link rel="stylesheet" href="{{ asset('assets-landing-page/css/aos.css') }}" />
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

    <!-- togle to top start -->
    <button class="button-to-top opacity-0" type="button" onclick="topFunction()">
        <i class="bi bi-arrow-up"></i>
    </button>
    <!-- togle to top end -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-transparent" id="navbar">
        <div class="container d-flex">
            <a class="navbar-brand d-lg-none position-absolute" href="/">
                <img class="logo-brand" src="{{ asset('/assets-landing-page/img/logo-nav.svg') }}" height="200"
                    alt="Logo" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon navbar-light"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/#hero" aria-current="page" data-bs-target="#hero"><i
                                class="bi bi-house me-2"></i>Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#fitur" data-bs-target="#fitur"><i
                                class="bi bi-wrench-adjustable me-2"></i>Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#keunggulan" data-bs-target="#keunggulan"><i
                                class="bi bi-star-half me-2"></i>Keunggulan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/petunjuk-teknis"><i class="bi bi-book-half me-2"></i>Petunjuk
                            teknis</a>
                    </li>
                </ul>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    @guest
                        <a href="/login" class="btn btn-1 px-4" type="button"> <span>Login</span> <i
                                class="bi bi-lock-fill icon-btn-1 ms-2"></i></a>
                    @endguest
                    @auth
                        <a href="/dashboard-{{ auth()->user()->level }}" class="btn btn-1 px-4" type="button">
                            <span>Dashboard</span> <i class="bi bi-unlock-fill icon-btn-1 ms-2"></i></a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="main main-technical-instructions">
        <!-- technical instructions Section Start -->
        <section class="technical-instructions section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-title" data-aos="zoom-in-up" data-aos-duration="1400">
                            <h2>
                                Petunjuk <span>Teknis <i class="bi bi-book-half"></i></span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center mx-4">

                </div>
            </div>
        </section>
        <!-- technical instructions Section End -->
    </div>

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-col">
                        <h3 class="text-center">Dikelolah Oleh</h3>
                        <div class="school-logo d-flex">
                            <img src="{{ asset('/assets-landing-page/img/logo-sekolah.png') }}" alt="Logo Sekolah"
                                class="w-25" />
                            <div class="text-school-logo">
                                <span>SMK Negeri 4</span>
                                <span class="d-block">Tangerang</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-col footer-col-socmed">
                        <h3 class="text-center social-pages">social pages</h3>
                        <ul class="socmed-footer mt-5" data-aos="zoom-in" data-aos-duration="1800">
                            <a href="https://facebook.com">
                                <li class="li-icon">
                                    <a class="btn btn-socmed-footer px-4" style="--i: #074fa1; --j: #1b71d3"
                                        type="button"><i class="bi bi-facebook icon-btn-socmed-footer ms-2"></i></a>
                                </li>
                            </a>
                            <a href="https://twitter.com" target="_blank">
                                <li class="li-icon">
                                    <a class="btn btn-socmed-footer px-4" style="--i: #373738; --j: #787879"
                                        type="button"><i class="bi bi-twitter-x icon-btn-socmed-footer ms-2"></i></a>
                                </li>
                            </a>
                            <a href="https://instagram.com">
                                <li class="li-icon">
                                    <a class="btn btn-socmed-footer px-4" style="--i: #dd2a7b; --j: #8134af"
                                        type="button"><i class="bi bi-instagram icon-btn-socmed-footer ms-2"></i></a>
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 text-center">
                    <div class="footer-col">
                        <h3 class="footer-slogan">slogan</h3>
                        <h4 class="slogan mt-5">#Disposisicepat</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright-text">Copyright &copy; 2023 Dispress. All rights reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- jquery js -->
    <script src="{{ asset('assets-landing-page/js/jquery.min.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets-landing-page/js/main.js') }}"></script>
    <!-- bootstrap bundle with popper -->
    <script src="{{ asset('/assets-landing-page/js/bootstrap.bundle.min.js') }}"></script>
    <!-- owl carousel js -->
    <script src="{{ asset('/assets-landing-page/js/owl.carousel.min.js') }}"></script>
    <!-- scrollit js -->
    <script src="{{ asset('/assets-landing-page/js/scrollIt.min.js') }}"></script>
    <!-- aos js -->
    <script src="{{ asset('/assets-landing-page/js/aos.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('/assets-landing-page/js/popper.min.js') }}"></script>

    <script>
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>

</html>
