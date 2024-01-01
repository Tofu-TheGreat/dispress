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
                    <div class="col-lg-12 mt-5">
                        <div class="section-title" data-aos="zoom-in-up" data-aos-duration="1400">
                            <h2>
                                Petunjuk <span>Teknis <i class="bi bi-book-half"></i></span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center gap-3 mx-3">
                    @include('pages.partials.sidebar-petunjuk')
                    <div class="col-sm-12 col-md-12 col-lg-8 petunjuk-wrapper p-4">
                        <div class="tab-content no-padding" id="myTab2Content">
                            <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab4">
                                <section class="section-petunjuk" id="registrasi" data-scroll-index="3">
                                    <h5 class="title-page-petunjuk mb-0"><i class="bi bi-lock-fill"></i>
                                        Petunjuk Registrasi</h5>
                                    <small class="tanggal-page-petunjuk">Last update: 30-December-2023</small>
                                    <div class="custom-block-warning mb-4">
                                        <p class="custom-block-title mt-1 mb-50">Perhatian</p>
                                        <p class="custom-block-text">
                                            Registrasi jika anda belum memiliki akun. <br>
                                            Note: Registrasi hanya dilakukan sekali dan dengan akun ketua instansi anda.
                                        </p>
                                    </div>
                                    <div class="text-center mb-2">
                                        <div class="">
                                            <img width="90%"
                                                src="{{ asset('assets-landing-page/img/img-petunjuk-teknis/registrasi-landing-page.png') }}"
                                                class="img-fluid image-box" alt="Foto Tampilan Register">
                                        </div>
                                        <small class="img-caption-petunjuk">Registrasi Dispress</small>
                                    </div>
                                    <p class="text-page-petunjuk">
                                        Isi semua inputan yang ada di form, jika ada tulisan dalam kurung 'optional' maka
                                        itu tidak wajib diisi
                                        <br> <br>
                                        setelah itu user akan di pindahkan ke tampilan Web Setting, di tampilan ini user
                                        harus memasukkan data instansi beserta data yang di perlukan untuk membuat surat
                                        keluar.
                                    </p>
                                    <div class="text-center mb-2">
                                        <div class="">
                                            <img width="90%"
                                                src="{{ asset('assets-landing-page/img/img-petunjuk-teknis/web-setting-create-page-1.png') }}"
                                                class="img-fluid image-box" alt="Foto Tampilan Web Setting">
                                        </div>
                                        <small class="img-caption-petunjuk">Web Setting Create Dispress 1</small>
                                    </div>
                                    <p class="text-page-petunjuk">
                                        Isi semua inputan yang ada di form, jika ada tulisan dalam kurung 'optional' maka
                                        itu tidak wajib diisi
                                        <br>
                                        <b class="bold-main">Header surat</b> yang dimaksud adalah:
                                    </p>
                                    <div class="text-center mb-2">
                                        <div class="">
                                            <img width="90%"
                                                src="{{ asset('assets-landing-page/img/img-petunjuk-teknis/header-surat.jpg') }}"
                                                class="img-fluid image-box" alt="Foto Tampilan Contoh Header Surat">
                                        </div>
                                        <small class="img-caption-petunjuk">Contoh Header Surat</small>
                                    </div>
                                    <p class="text-page-petunjuk">
                                        Lanjutkan pengisian sama seperti sebelumnya, ketua instansi secara otomatis mengisi
                                        data
                                        dengan data registrasi sebelumnya.
                                    </p>
                                    <div class="text-center mb-2">
                                        <div class="">
                                            <img width="90%"
                                                src="{{ asset('assets-landing-page/img/img-petunjuk-teknis/web-setting-create-page-2.png') }}"
                                                class="img-fluid image-box" alt="Foto Tampilan Web Setting">
                                        </div>
                                        <small class="img-caption-petunjuk">Web Setting Create Dispress 2</small>
                                    </div>
                                    <p class="text-page-petunjuk">
                                        Setelah mengisi semua lanjutkan dengan mengklik tombol <b
                                            class="bold-main">Submit</b>. setelahnya anda berhasil register dan mengakses
                                        tampilan dashboard.
                                    </p>
                                </section>
                                <section class="section-petunjuk mt-4" id="login" data-scroll-index="4">
                                    <h5 class="title-page-petunjuk mb-0"><i class="bi bi-laptop-fill"></i>
                                        Login</h5>
                                    <small class="tanggal-page-petunjuk">Last update: 30-December-2023</small>

                                    <p class="text-justify">Login dengan akun anda yang sudah terdaftar.
                                    </p>

                                    <div class="text-center mb-2">
                                        <div class="">
                                            <img width="90%"
                                                src="{{ asset('assets-landing-page/img/img-petunjuk-teknis/login-page-dispress.png') }}"
                                                class="img-fluid image-box" alt="Foto Tampilan Login">
                                        </div>
                                        <small class="img-caption-petunjuk">Tampilan Login</small>
                                    </div>

                                    <p class="text-page-petunjuk">
                                        Isi semua inputan yang ada di form, jika sudah klick tombol <b
                                            class="bold-main">Login </b>
                                        setelahnya anda akan diarahkan ke tampilan dashboard.
                                    </p>

                                    <div class="custom-block-warning ">
                                        <p class="custom-block-title mt-1 mb-50">Lanjutkan Petunjuk</p>
                                        <a class="btn btn-sm btn-success mb-2" href="/petunjuk-teknis/role">Lanjutkan
                                            <i class="bi bi-arrow-right-circle-fill ms-2"></i></a>
                                        <p class="custom-block-text">Klik untuk melanjutkan membaca petunjuk registree -
                                            Penjelasan halaman petunjuk Role
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
