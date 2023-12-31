@extends('pages.layouts')

@section('css')
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('/assets-landing-page/css/style.css') }}" />
@endsection

@section('content')
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
                <div class="row d-flex justify-content-center gap-3 mx-3">
                    @include('pages.partials.sidebar-petunjuk')
                    <div class="col-sm-12 col-md-12 col-lg-8 card p-4 petunjuk-wrapper">
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
                                            <b class="bold-main">v.1.0</b> <br>
                                            Progress Petunjuk teknis ini baru mencakup <b class="bold-main">20%</b>
                                            dari keseluruhan
                                            fungsi Dispress
                                        </p>
                                    </div>
                                    <div class="text-center mb-2">
                                        <div class="">
                                            <img width="90%"
                                                src="{{ asset('assets-landing-page/img/img-petunjuk-teknis/landing-page-dispress.png') }}"
                                                class="img-fluid image-box" alt="Foto Tampilan Landing Page">
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
                                <section class="section-petunjuk mt-4" id="alamat" data-scroll-index="2">
                                    <h5 class="title-page-petunjuk mb-0"><i class="bi bi-globe2"></i>
                                        Alamat Web</h5>
                                    <small class="tanggal-page-petunjuk">Last update: 30-December-2023</small>

                                    <p class="text-justify alamat-web">
                                        DiGi.Ka. dapat diakses melalui alamat website: <a
                                            href="https://dispress.smkn4-tng.sch.id/">https://dispress.smkn4-tng.sch.id/</a>
                                    </p>
                                    <div class="custom-block-warning ">
                                        <p class="custom-block-title mt-1 mb-50">Lanjutkan Petunjuk</p>
                                        <a class="btn btn-sm btn-success mb-2" href="/petunjuk-teknis/registrasi">Lanjutkan
                                            <i class="bi bi-arrow-right-circle-fill ms-2"></i></a>
                                        <p class="custom-block-text">Klik untuk melanjutkan membaca petunjuk teknis -
                                            Petunjuk Registrasi
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
@endsection
