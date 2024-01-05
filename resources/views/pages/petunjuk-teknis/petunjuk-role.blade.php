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
                                    <h5 class="title-page-petunjuk mb-0"><i class="bi bi-person-exclamation"></i>
                                        Petunjuk Role</h5>
                                    <small class="tanggal-page-petunjuk">Last update: 30-December-2023</small>
                                    <div class="custom-block-warning mb-4">
                                        <p class="custom-block-title mt-1 mb-50">Perhatian</p>
                                        <p class="custom-block-text">
                                            Dispress (Disposisi Express), Memiliki 3 role yaitu Admin, Officer, Staff setiap
                                            role memiliki hak aksesnya masing-masing.
                                        </p>
                                    </div>
                                </section>
                                <section class="section-petunjuk mt-4" id="admin" data-scroll-index="0">
                                    <h5 class="title-page-petunjuk mb-0"><i class="bi bi-person-fill-gear"></i>
                                        Role Admin</h5>

                                    <p class="text-justify">Role Admin mempunyai hak akses yaitu :
                                    </p>

                                    <div class="custom-block-info mb-4">
                                        <p class="custom-block-title mt-1 mb-50">Info</p>
                                        <p class="custom-block-text">
                                            CRUD Adalah singkatan (Cread, Read, Update, Delete) <br> buat, baca, perbarui,
                                            dan
                                            hapus data dari interface anda.
                                        </p>
                                    </div>

                                    <ol class="list-rekomendasi-perangkat">
                                        <li>CRUD Posisi Jabatan</li>
                                        <li>CRUD User</li>
                                        <li>CRUD Instansi</li>
                                        <li>CRUD Nomor Klasifikasi</li>
                                        <li>CRUD Surat Masuk</li>
                                        <li>CRUD Pengajuan Disposisi</li>
                                        <li>CRUD Disposisi (Mendisposisikan)</li>
                                        <li>CRUD Surat Keluar</li>
                                        <li>CRUD Surat Tugas</li>
                                    </ol>

                                    <p>
                                        Role admin memiliki hak akses yang bisa mengakses semua fitur di aplikasi.
                                    </p>
                                </section>
                                <section class="section-petunjuk mt-4" id="officer" data-scroll-index="1">
                                    <h5 class="title-page-petunjuk mb-0"><i class="bi bi-person-fill-lock"></i>
                                        Role Officer</h5>
                                    <p class="text-justify">Role Officer mempunyai hak akses yaitu :
                                    </p>

                                    <ol class="list-rekomendasi-perangkat">
                                        <li>CRUD Posisi Jabatan</li>
                                        <li>Read Users</li>
                                        <li>CRUD Instansi</li>
                                        <li>CRUD Nomor Klasifikasi</li>
                                        <li>CRUD Surat Masuk</li>
                                        <li>CRUD Pengajuan Disposisi (Yang dia ajukan)</li>
                                        <li>Read Disposisi</li>
                                        <li>Read Surat Keluar</li>
                                        <li>Read Surat Tugas</li>
                                    </ol>

                                    <p>
                                        Role officer memiliki hak akses yang bisa mengakses sebagian fitur di aplikasi.
                                    </p>
                                </section>
                                <section class="section-petunjuk mt-4" id="staff" data-scroll-index="2">
                                    <h5 class="title-page-petunjuk mb-0"><i class="bi bi-person-fill"></i>
                                        Role Staff </h5>
                                    <p class="text-justify">Role Staff mempunyai hak akses yaitu :
                                    </p>

                                    <ol class="list-rekomendasi-perangkat">
                                        <li>Read Posisi Jabatan</li>
                                        <li>Read Users</li>
                                        <li>Read Instansi</li>
                                        <li>Read Nomor Klasifikasi</li>
                                        <li>Read Surat Masuk</li>
                                        <li>Read Disposisi</li>
                                        <li>Read Surat Keluar</li>
                                        <li>Read Surat Tugas</li>
                                    </ol>

                                    <p>
                                        Role staff hanya memiliki hak akses untuk melihat detail data di aplikasi.
                                    </p>
                                    <div class="custom-block-warning ">
                                        <p class="custom-block-title mt-1 mb-50">Lanjutkan Petunjuk</p>
                                        <a class="btn btn-sm btn-success mb-2" href="/petunjuk-teknis/penggunaan">Lanjutkan
                                            <i class="bi bi-arrow-right-circle-fill ms-2"></i></a>
                                        <p class="custom-block-text">Klik untuk melanjutkan membaca petunjuk role -
                                            Petunjuk Penggunaan
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
