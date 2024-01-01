@extends('pages.layouts')

@section('css')
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('/assets-landing-page/css/style.css') }}" />
@endsection

@section('content')
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
                            src="{{ asset('/assets-landing-page/img/Editorial commision-amico.png') }}" alt="hero image" />
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
                            <a href="/dashboard-{{ auth()->user()->level }}" type="button" class="btn btn-hero mt-3 px-4"><i
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
                    <div class="icon"><i class="bi bi-folder-check"></i></div>
                </div>
                <div class="feature-item col-lg-8 col-md-6" data-aos="zoom-in" data-aos-duration="1400">
                    <h3>Export/Import</h3>
                    <p>Pengguna dapat melakukan ekspor data/file yang ada pada penyimpanan lokal ataupun impor
                        data/file yang berasal dari website dalam bentuk excel.</p>
                </div>
                <div class="feature-item col-lg-8 col-md-6" data-aos="fade-right" data-aos-duration="1400">
                    <h3>Chart</h3>
                    <p>Pengguna dapat melihat statistik data yang tersimpan di dalam website.</p>
                </div>
                <div class="feature-item-icon col-lg-2 col-md-4" style="--i: #3559a7; --j: #f1f1f1" data-aos="zoom-in"
                    data-aos-duration="1400">
                    <div class="icon"><i class="bi bi-bar-chart-line"></i></div>
                </div>
                <div class="feature-item-icon col-lg-2 col-md-4" style="--i: #2161ac; --j: #5349a5" data-aos="fade-right"
                    data-aos-duration="1400">
                    <div class="icon"><i class="bi bi-printer"></i></div>
                </div>
                <div class="feature-item col-lg-8 col-md-6" data-aos="zoom-in" data-aos-duration="1400">
                    <h3>Mencetak dokumen</h3>
                    <p>Pengguna dapat langsung mencetak dokumen/file yang ada pada website dalam bentuk pdf.</p>
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
                        <p>Memungkinkan pengguna untuk melakukan kegiatan dokumentasi pendataan atau pencatatan
                            beralih menjadi digital.Sehingga dapat mengurangi penggunaan kertas.</p>
                    </div>
                    <div class="superiority-item">
                        <div class="icon" style="--i: rgba(7, 55, 150, 1); --j: rgba(0, 198, 255, 1)"><img
                                src="{{ asset('/assets-landing-page/img/mudah.webp') }}" alt="mudah-img" /></div>
                        <h3 class="text-white">Mudah</h3>
                        <p>Kami menyediakan petunjuk teknis sebagai panduan,jika menemukan kesulitan tim kami
                            bersedia membantu dan memberikan solusi.</p>
                    </div>
                    <div class="superiority-item">
                        <div class="icon" style="--i: #081649; --j: #749cdc"><img
                                src="{{ asset('/assets-landing-page/img/multi-platform.webp') }}"
                                alt="multi-platform-img" />
                        </div>
                        <h3 class="text-white">Multi Platform</h3>
                        <p>Memungkinkan pengguna untuk melakukan atau aktivitas pada website melalui desktop
                            PC,Laptop,Tablet,bahkan Smartphone.</p>
                    </div>
                    <div class="superiority-item">
                        <div class="icon" style="--i: #9c5bb6; --j: #081649"><img
                                src="{{ asset('/assets-landing-page/img/dok-baik.webp') }}" alt="dokumentasi-img" /></div>
                        <h3 class="text-white">Terdokumentasi dengan baik</h3>
                        <p>Kapanpun pengguna membutuhkan data,pengguna bisa langsung mengunduhnya.</p>
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
@endsection
