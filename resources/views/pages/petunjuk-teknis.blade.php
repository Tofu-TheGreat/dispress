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

    <style>
        .nav-pills .nav-link.active {
            background-color: transparent !important;
            color: #1f66b8;
            font-size: 1rem;
        }

        .nav-pills .nav-link {
            background-color: transparent !important;
            color: #2f4364;
            font-size: .9rem;
            padding: 4px 10px;
        }

        .nav-pills .nav-link:hover {
            color: #1f66b8;
        }
    </style>
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
                <div class="row d-flex justify-content-center gap-3 mx-4">
                    <div class="col-sm-12 col-md-12 col-lg-4 card p-4">
                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                            <h6 class="title-petunjuk">
                                <a class="" href="/petunjuk-teknis">Selamat Datang</a>
                            </h6>
                            <li class="nav-item">
                                <a class="nav-link" data-scroll-nav="0" href="#rekomendasi"
                                    data-bs-target="#rekomendasi"><i class="bi bi-laptop me-2"></i>
                                    Rekomendasi
                                    Perangkat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-scroll-nav="1" href="#browser" data-bs-target="#browser"><i
                                        class="bi bi-browser-chrome me-2"></i>
                                    Rekomendasi
                                    Browser</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-scroll-nav="2" href="#alamat" data-bs-target="#alamat"><i
                                        class="bi bi-globe2 me-2"></i>
                                    Alamat
                                    Web</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-7 card p-4">
                        <div class="tab-content no-padding" id="myTab2Content">
                            <div class="tab-pane fade show active" id="main" role="tabpanel"
                                aria-labelledby="home-tab4">
                                <section class="section-petunjuk">
                                    <h5 class="title-page-petunjuk mb-0"><i class="bi bi-door-closed-fill"></i>
                                        Selamat Datang</h5>
                                    <small class="tanggal-page-petunjuk">Last update: 30-December-2023</small>
                                    <div class="custom-block-warning mb-4">
                                        <p class="custom-block-title mt-1 mb-50">Perhatian</p>
                                        <p class="custom-block-text">Anda sedang membaca petunjuk teknis Dispress versi
                                            <b>v.1.0</b> <br>
                                            Progress Petunjuk teknis ini baru mencakup <b>20%</b> dari keseluruhan
                                            fungsi Dispress
                                        </p>
                                    </div>
                                    <div class="text-center mb-2">
                                        <div class="">
                                            <img width="90%"
                                                src="{{ asset('assets-landing-page/img/img-petunjuk-teknis/landing-page-dispress.png') }}"
                                                class="img-fluid image-box" alt="">
                                        </div>
                                        <small class="img-caption-petunjuk">Landing Page Dispress</small>
                                    </div>
                                    <p class="text-page-petunjuk">Dispress (Disposisi Express) adalah Lorem ipsum dolor
                                        sit amet consectetur,
                                        adipisicing elit. Maxime adipisci
                                        deleniti ab assumenda repudiandae fuga distinctio architecto error iste esse.
                                        Quidem consequuntur tenetur nisi eveniet dolorum officiis ut autem, possimus,
                                        exercitationem magni quibusdam doloremque ullam molestias, blanditiis voluptates
                                        consequatur alias! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut
                                        architecto incidunt dolorum! Ipsa a aspernatur odio reiciendis iste quam quos.
                                    </p>
                                </section>
                                <section class="section-petunjuk mt-4" id="rekomendasi" data-scroll-index="0">
                                    <h5 class="title-page-petunjuk mb-0"><i class="bi bi-laptop-fill"></i>
                                        Rekomendasi Perangkat</h5>
                                    <small class="tanggal-page-petunjuk">Last update: 30-December-2023</small>

                                    <p class="text-justify">Aplikasi Dispress dapat diakses melalui perangkat berikut:
                                    </p>

                                    <ul class="list-rekomendasi-perangkat">
                                        <li><i class="bi bi-patch-check-fill me-2"></i> Komputer/PC</li>
                                        <li><i class="bi bi-patch-check-fill me-2"></i> Tablet</li>
                                        <li><i class="bi bi-patch-check-fill me-2"></i> Smartphone</li>
                                        <li><i class="bi bi-patch-check-fill me-2"></i> Laptop</li>
                                        <li><i class="bi bi-patch-check-fill me-2"></i> Perangkat Lainnya</li>
                                    </ul>

                                    <p>Kami merekomendasikan untuk menggunakan perangkat dengan resolusi layar minimal
                                        1080p. Dalam mengakses Aplikasi Dispress, perangkat di atas harus terhubung
                                        dengan Internet menggunakan browser.</p>
                                </section>
                                <section class="section-petunjuk mt-4" id="browser" data-scroll-index="1">
                                    <h5 class="title-page-petunjuk mb-0"><i class="bi bi-browser-chrome"></i>
                                        Rekomendasi Browser</h5>
                                    <small class="tanggal-page-petunjuk">Last update: 30-December-2023</small>

                                    <p class="text-justify">
                                        DiGi.Ka. dibuat untuk berjalan optimal sesuai dengan fungsi-fungsinya pada
                                        peramban Google Chrome. Kami merekomendasikan untuk menggunakan peramban
                                        tersebut, namun Anda juga dapat menggunakan peramban lainnya seperti Mozilla
                                        Firefox, Microsoft Edge dan peramban lainnya.
                                    </p>
                                    <p class="text-justify">
                                        Pengunaan peramban selain daripada yang direkomendasikan, mungkin saja akan
                                        menyebabkan beberapa fungsi tidak berjalan sesuai dengan semestinya.
                                    </p>
                                </section>
                                <section class="section-petunjuk mt-4" id="#alamat" data-scroll-index="2">
                                    <h5 class="title-page-petunjuk mb-0"><i class="bi bi-globe2"></i>
                                        Alamat Web</h5>
                                    <small class="tanggal-page-petunjuk">Last update: 30-December-2023</small>

                                    <p class="text-justify alamat-web">
                                        DiGi.Ka. dapat diakses melalui alamat website: <a
                                            href="https://dispress.smkn4-tng.sch.id/">https://dispress.smkn4-tng.sch.id/</a>
                                    </p>
                                    <div class="custom-block-warning ">
                                        <p class="custom-block-title mt-1 mb-50">Lanjutkan Petunjuk</p>
                                        <a class="btn btn-sm btn-success mb-2" href="/juknis/dashboard">Lanjutkan <i
                                                class="bi bi-arrow-right-circle-fill ms-2"></i></a>
                                        <p class="custom-block-text">Klik untuk melanjutkan membaca petunjuk teknis -
                                            Penjelasan Halaman Dashboard
                                        </p>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
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

        $(document).ready(function() {
            // Aktifkan tab Bootstrap
            $('#myTab4 a').on('click', function(e) {
                e.preventDefault();
                $(this).tab('show');
            });
        })
    </script>
</body>

</html>
