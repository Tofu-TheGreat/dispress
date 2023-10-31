<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/assets/img/kamen-rider-dispress.png" type="image/x-icon" />
    <!-- judul page -->
    <title>Landing Page</title>

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
                        <a class="nav-link active" data-scroll-nav="0" aria-current="page" href="#hero"
                            data-bs-target="#hero"><i class="bi bi-house me-2"></i>Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll-nav="1" href="#fitur"><i
                                class="bi bi-wrench-adjustable me-2"></i>Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll-nav="2" href="#keunggulan"><i
                                class="bi bi-star-half me-2"></i>Keunggulan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll-nav="3" href="#petunjuk-teknis"><i
                                class="bi bi-book-half me-2"></i>Petunjuk teknis</a>
                    </li>
                </ul>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    @guest
                        <a href="/login" class="btn btn-1 px-4" type="button"> <span>Login</span> <i
                                class="bi bi-lock-fill icon-btn-1 ms-2"></i></a>
                    @endguest
                    @auth
                        <a href="/dashboard" class="btn btn-1 px-4" type="button"> <span>Dashboard</span> <i
                                class="bi bi-unlock-fill icon-btn-1 ms-2"></i></a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="main">
        <!-- Hero Section Start -->
        <section class="hero d-flex align-items-center" id="hero" data-scroll-index="0">
            <div class="effect-wrap">
                <div class="spinner"></div>
                <i class="bi bi-plus effect effect-2"></i>
                <i class="bi bi-folder-fill effect effect-3"></i>
            </div>
            <div class="container mb-5 ps-5">
                <div class="row align-items-center">
                    <div class="col-md-5 text-center order-lg-last">
                        <div class="hero-img" data-aos="fade-up-right" data-aos-duration="1600">
                            <img class="hero-img-gif"
                                src="{{ asset('/assets-landing-page/img/Editorial commision-amico.png') }}"
                                alt="hero image" />
                        </div>
                    </div>
                    <div class="col-md-7 order-lg-first">
                        <div class="hero-text">
                            <img class="d-none d-lg-block" src="{{ asset('/assets-landing-page/img/logo-brand.svg') }}"
                                height="" alt="logo-hero" />
                            <h1>Disposisi Express</h1>
                            <p>Disposisi cepat tanpa ribet!</p>
                            @guest
                                <a href="/login" type="button" class="btn btn-hero mt-3 px-4"><i
                                        class="icon-btn-hero bi-box-arrow-in-right"></i> <span> Login </span></a>
                            @endguest
                            @auth
                                <a href="/dashboard" type="button" class="btn btn-hero mt-3 px-4"><i
                                        class="icon-btn-hero bi-box-arrow-in-right dashboard-icon"></i> <span> Dashboard
                                    </span></a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <!-- Socmed Section Start -->
            <section class="socmed">
                <div class="container d-flex justify-content-center">
                    <ul>
                        <a href="https://facebook.com">
                            <li style="--i: #2808dd; --j: #4461e2">
                                <span class="icon"><i class="bi bi-facebook"></i></span>
                                <span class="text-icon">facebook</span>
                            </li>
                        </a>
                        <a href="https://twitter.com" target="_blank">
                            <li style="--i: #373738; --j: #787879">
                                <span class="icon"><i class="bi bi-twitter-x"></i></span>
                                <span class="text-icon">Twitter</span>
                            </li>
                        </a>
                        <a href="https://instagram.com">
                            <li style="--i: #dd2a7b; --j: #8134af">
                                <span class="icon"><i class="bi bi-instagram"></i></span>
                                <span class="text-icon">instagram</span>
                            </li>
                        </a>
                    </ul>
                </div>
            </section>
            <!-- Socmed Section End -->
        </section>
        <!-- Hero Section End -->

        <!-- Features Section Start -->
        <section class="features section-padding" id="fitur" data-scroll-index="1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-title" data-aos="zoom-in-up" data-aos-duration="1400">
                            <h2>
                                Fitur <span>Dispress <i class="bi bi-wrench-adjustable"></i></span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center mx-4">
                    <div class="feature-item-icon col-lg-2 col-md-4" style="--i: #5349a5; --j: rgb(154,147,214)"
                        data-aos="fade-right" data-aos-duration="1400">
                        <div class="icon"><i class="bi bi-rocket-takeoff-fill"></i></div>
                    </div>
                    <div class="feature-item col-lg-8 col-md-6" data-aos="zoom-in" data-aos-duration="1400">
                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae</h3>
                        <p>jurusan yang mengkombinasikan dua bidang, yaitu bisnis daring atau e-commerce dan pemasaran
                            atau marketing.</p>
                    </div>
                    <div class="feature-item col-lg-8 col-md-6" data-aos="fade-right" data-aos-duration="1400">
                        <h3>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h3>
                        <p>jurusan yang mengkombinasikan dua bidang, yaitu bisnis daring atau e-commerce dan pemasaran
                            atau marketing.</p>
                    </div>
                    <div class="feature-item-icon col-lg-2 col-md-4" style="--i: #3559a7; --j: #f1f1f1"
                        data-aos="zoom-in" data-aos-duration="1400">
                        <div class="icon"><i class="bi bi-kanban"></i></div>
                    </div>
                    <div class="feature-item-icon col-lg-2 col-md-4" style="--i: #2161ac; --j: #5349a5"
                        data-aos="fade-right" data-aos-duration="1400">
                        <div class="icon"><i class="bi bi-pc-display-horizontal"></i></div>
                    </div>
                    <div class="feature-item col-lg-8 col-md-6" data-aos="zoom-in" data-aos-duration="1400">
                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem!</h3>
                        <p>jurusan yang mengkombinasikan dua bidang, yaitu bisnis daring atau e-commerce dan pemasaran
                            atau marketing.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Features Section End -->

        <!-- Superiority Section Start -->
        <section class="superiority section-padding" id="keunggulan" data-scroll-index="2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-title" data-aos="zoom-in-up" data-aos-duration="1400">
                            <h2>
                                Keunggulan <span>Dispress <i class="bi bi-star-half"></i></span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="owl-carousel superiority-carousel">
                        <div class="superiority-item">
                            <div class="icon" style="--i: #362b82; --j: #7264d7;"><img
                                    src="{{ asset('/assets-landing-page/img/go-green.webp') }}" alt="paperles-img" />
                            </div>
                            <h3 class="text-white">Paperless</h3>
                            <p>memungkinkan Satuan Kerja untuk beralih ke Dokumen Digital. Dengan begitu, kita dapat
                                mencintai lingkungan sambil berhemat pengeluaran sekolah.</p>
                        </div>
                        <div class="superiority-item">
                            <div class="icon" style="--i: rgba(7, 55, 150, 1); --j: rgba(0, 198, 255, 1)"><img
                                    src="{{ asset('/assets-landing-page/img/mudah.webp') }}" alt="mudah-img" /></div>
                            <h3 class="text-white">Mudah</h3>
                            <p>dilengkapi dengan Petunjuk Teknis, Anda menemukan kesulitan? Tim kami selalu siap
                                menjawab dan memberikan solusinya.</p>
                        </div>
                        <div class="superiority-item">
                            <div class="icon" style="--i: #081649; --j: #749cdc"><img
                                    src="{{ asset('/assets-landing-page/img/multi-platform.webp') }}"
                                    alt="multi-platform-img" />
                            </div>
                            <h3 class="text-white">Multi Platform</h3>
                            <p>Anda dapat melakukannya baik itu melalui Desktop PC, Laptop, Tablet atau bahkan dari
                                smartphone Anda.</p>
                        </div>
                        <div class="superiority-item">
                            <div class="icon" style="--i: #9c5bb6; --j: #081649"><img
                                    src="{{ asset('/assets-landing-page/img/dok-baik.webp') }}"
                                    alt="dokumentasi-img" /></div>
                            <h3 class="text-white">Terdokumentasi dengan baik</h3>
                            <p>terdokumentasi dengan baik. Kapanpun data dibutuhkan, para pengelola surat dapat
                                mengunduhnya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Superiority Section End -->

        <!-- Map Section Start -->
        <section class="map section-padding" id="map" data-scroll-index="4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title">
                            <h2 data-aos="zoom-in-up" data-aos-duration="2000">
                                Lokasi <span>Kami <i class="bi bi-geo-alt-fill"></i></span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="text-center">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5768925963066!2d106.63556391455468!3d-6.187333395520691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f929162547c7%3A0xbbf35137362e584d!2sSMK%20Negeri%204%20Kota%20Tangerang!5e0!3m2!1sid!2sid!4v1677921080826!5m2!1sid!2sid"
                            width="100%" height="600" style="border: 0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </section>
        <!-- Map Section End -->
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
