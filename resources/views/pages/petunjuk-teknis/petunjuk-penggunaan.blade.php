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
                    <div class="col-sm-12 col-md-12 col-lg-8 card p-4 petunjuk-wrapper">
                        <div class="tab-content no-padding" id="myTab2Content">
                            <div class="tab-pane fade show active" id="main" role="tabpanel"
                                aria-labelledby="home-tab4">
                                <section class="section-petunjuk">
                                    <h5 class="title-page-petunjuk mb-0"><i class="bi bi-question-diamond-fill"></i>
                                        Petunjuk Penggunaan</h5>
                                    <small class="tanggal-page-petunjuk">Last update: 30-December-2023</small>
                                    <div class="custom-block-warning mb-4">
                                        <p class="custom-block-title mt-1 mb-50">Perhatian</p>
                                        <p class="custom-block-text">
                                            Petunjuk penggunaan disini lebih berfokus untuk role admin, jika petunjuk tidak
                                            ada di UI(tampilan) anda maka itu bukan merupakan kesalahan, karena hak akses
                                            setiap role berbeda (berada di petunjuk role)
                                        </p>
                                    </div>
                                    <h5 class="title-page-petunjuk mb-0"><i class="bi bi-person-badge"></i>
                                        Mengelolah Posisi Jabatan</h5>
                                    <small class="tanggal-page-petunjuk">Last update: 30-December-2023</small>

                                    <div class="text-center mb-2">
                                        <div class="">
                                            <img width="30%"
                                                src="{{ asset('assets-landing-page/img/img-petunjuk-teknis/petunjuk-penggunaan-posjab.png') }}"
                                                class="img-fluid image-box" alt="Foto Tampilan Sidebar">
                                        </div>
                                        <small class="img-caption-petunjuk">Sidebar Dispress</small>
                                    </div>
                                    <p class="text-page-petunjuk">
                                        Pilih menu <b class="bold-main">Posisi Jabatan</b> di sidebar. <br>
                                        maka akan tampil halaman <b class="bold-main">Posisi Jabatan</b> yang terdiri dari
                                        data posisi jabatan dan tombol tombol action untuk mengelola posisi jabatan.
                                    </p>
                                    <h6 class="text-info">Filter Posisi Jabatan</h6>
                                    <div class="text-center mb-2">
                                        <div class="">
                                            <img width="90%"
                                                src="{{ asset('assets-landing-page/img/img-petunjuk-teknis/filter-pojab.png') }}"
                                                class="img-fluid image-box" alt="Foto Tampilan Filter Posisi Jabatan">
                                        </div>
                                        <small class="img-caption-petunjuk">Filter Posisi Jabatan</small>
                                    </div>
                                    <p class="text-page-petunjuk">
                                        Filter posisi jabatan berdasarkan tingkat jabatan. disini pengguna harus memilih
                                        salah satu tingkat jabatan yang ingin ditampilkan, jika sudah memilih maka klik
                                        tombol <b class="bold-main">Filter data</b> dan jika ingin mereset filter maka klik
                                        tombol <b class="bold-main">Reset
                                            Filter</b>.
                                    </p>
                                    <h6 class="text-info">Data Posisi Jabatan</h6>
                                    <div class="text-center mb-2">
                                        <div class="">
                                            <img width="90%"
                                                src="{{ asset('assets-landing-page/img/img-petunjuk-teknis/data-posjab.png') }}"
                                                class="img-fluid image-box" alt="Foto Tampilan Data Posisi Jabatan">
                                        </div>
                                        <small class="img-caption-petunjuk">Data Posisi Jabatan</small>
                                    </div>
                                    <p class="text-page-petunjuk">
                                        Data posisi jabatan ditampilkan dari database. data posisi jabatan terdiri kolom
                                        nama posisi jabatan, deskripsi jabatan, tingkat jabatan, dan action.
                                    </p>
                                    <h6 class="text-info">Action Posisi Jabatan</h6>
                                    <div class="text-center mb-2">
                                        <div class="">
                                            <img width="90%"
                                                src="{{ asset('assets-landing-page/img/img-petunjuk-teknis/tambah-posjab.png') }}"
                                                class="img-fluid image-box"
                                                alt="Foto Tampilan tombol Tambah Posisi Jabatan">
                                        </div>
                                        <small class="img-caption-petunjuk">Tombol Tambah Data Posisi Jabatan</small>
                                    </div>
                                    <h6 class="text-info">Tambah Data Posisi Jabatan</h6>
                                    <p class="text-page-petunjuk">
                                        Tombol tambah data berada di atas kanan data posisi jabatan. jika ingin menambah
                                        data posisi jabatan maka klik tombol <b class="bold-main">Tambah</b>. jika di klik
                                        maka akan muncul modal tambah data.
                                    </p>
                                    <div class="text-center mb-2">
                                        <div class="">
                                            <img width="90%"
                                                src="{{ asset('assets-landing-page/img/img-petunjuk-teknis/modal-tambah-posjab.png') }}"
                                                class="img-fluid image-box" alt="Foto Tampilan modal Tambah Posisi Jabatan">
                                        </div>
                                        <small class="img-caption-petunjuk">Modal Tambah Data Posisi Jabatan</small>
                                    </div>
                                    <p class="text-page-petunjuk">
                                        Isi semua inputan yang ada di form, jika sudah klik tombol <b class="bold-main">Save
                                            Data. </b>
                                    </p>
                                    <div class="text-center mb-2">
                                        <div class="">
                                            <img width="90%"
                                                src="{{ asset('assets-landing-page/img/img-petunjuk-teknis/action-posjab.png') }}"
                                                class="img-fluid image-box" alt="Foto Tombol Action Posisi Jabatan">
                                        </div>
                                        <small class="img-caption-petunjuk">Tombol Action Data Posisi Jabatan</small>
                                    </div>
                                    <p class="text-page-petunjuk">
                                        jika di klik maka akan muncul tombol lain untuk mengelola posisi jabatan. yaitu
                                        tombol detail, edit, dan delete.
                                    </p>
                                    <div class="text-center mb-2">
                                        <div class="">
                                            <img width="90%"
                                                src="{{ asset('assets-landing-page/img/img-petunjuk-teknis/klik-action-posjab.png') }}"
                                                class="img-fluid image-box" alt="Foto klik tombol Action Posisi Jabatan">
                                        </div>
                                        <small class="img-caption-petunjuk">Tombol mengelolah Data Posisi Jabatan</small>
                                    </div>
                                    <p class="text-page-petunjuk">
                                        jika di klik maka akan muncul tombol lain untuk mengelola posisi jabatan. yaitu
                                        tombol detail, edit, dan delete.
                                    </p>
                                    <h6 class="text-info">Detail Data Posisi Jabatan</h6>

                                    <div class="text-center mb-2">
                                        <div class="">
                                            <img width="90%"
                                                src="{{ asset('assets-landing-page/img/img-petunjuk-teknis/detail-posjab.png') }}"
                                                class="img-fluid image-box" alt="Foto modal detail Posisi Jabatan">
                                        </div>
                                        <small class="img-caption-petunjuk">Modal Detail Data Posisi Jabatan</small>
                                    </div>
                                    <p class="text-page-petunjuk">
                                        jika di klik tombol detail maka akan muncul modal detail posisi jabatan.
                                    </p>

                                    <h6 class="text-info">Edit Data Posisi Jabatan</h6>

                                    <div class="text-center mb-2">
                                        <div class="">
                                            <img width="90%"
                                                src="{{ asset('assets-landing-page/img/img-petunjuk-teknis/edit-posjab.png') }}"
                                                class="img-fluid image-box" alt="Foto modal edit Posisi Jabatan">
                                        </div>
                                        <small class="img-caption-petunjuk">Modal Edit Data Posisi Jabatan</small>
                                    </div>
                                    <p class="text-page-petunjuk">
                                        jika di klik tombol edit maka akan muncul modal edit posisi jabatan. Jika ingin
                                        mengubah data maka ubah inputan yang ada di form.
                                    </p>
                                    <h6 class="text-info">Hapus Data Posisi Jabatan</h6>

                                    <div class="text-center mb-2">
                                        <div class="">
                                            <img width="90%"
                                                src="{{ asset('assets-landing-page/img/img-petunjuk-teknis/hapus-posjab.png') }}"
                                                class="img-fluid image-box" alt="Foto modal hapus Posisi Jabatan">
                                        </div>
                                        <small class="img-caption-petunjuk">Modal Hapus Data Posisi Jabatan</small>
                                    </div>
                                    <p class="text-page-petunjuk">
                                        jika di klik tombol hapus maka akan muncul peringatan hapus posisi jabatan, jika
                                        anda yakin ingin menghapusnya maka klik tombol oke.
                                    </p>
                                    <div class="custom-block-warning mb-4">
                                        <p class="custom-block-title mt-1 mb-50">Perhatian</p>
                                        <p class="custom-block-text">
                                            Jika anda mengklik tombol oke pada hapus posisi jabatan, maka data posisi
                                            jabatan akan terhapus permanen.
                                        </p>
                                    </div>
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
                                        <a class="btn btn-sm btn-success mb-2"
                                            href="/petunjuk-teknis/registrasi">Lanjutkan
                                            <i class="bi bi-arrow-right-circle-fill ms-2"></i></a>
                                        <p class="custom-block-text">Klik untuk melanjutkan membaca petunjuk teknis -
                                            Petunjuk registrasi
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
