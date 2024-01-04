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
                                        Rolen Admin</h5>

                                    <p class="text-justify">Role Admin mempunyai tugas yaitu :
                                    </p>

                                    <ol class="list-rekomendasi-perangkat">
                                        <li>Komputer/PC</li>
                                        <li>Tablet</li>
                                        <li>Smartphone</li>
                                        <li>Laptop</li>
                                        <li>Perangkat Lainnya</li>
                                    </ol>

                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum quisquam obcaecati
                                        voluptatibus dignissimos! Deleniti qui non placeat quod repudiandae. Dicta!</p>
                                </section>
                                <section class="section-petunjuk mt-4" id="officer" data-scroll-index="1">
                                    <h5 class="title-page-petunjuk mb-0"><i class="bi bi-person-fill-lock"></i>
                                        Rekomendasi Officer</h5>
                                    <p class="text-justify">Role Officer mempunyai tugas yaitu :
                                    </p>

                                    <ol class="list-rekomendasi-perangkat">
                                        <li>Komputer/PC</li>
                                        <li>Tablet</li>
                                        <li>Smartphone</li>
                                        <li>Laptop</li>
                                        <li>Perangkat Lainnya</li>
                                    </ol>

                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum quisquam obcaecati
                                        voluptatibus dignissimos! Deleniti qui non placeat quod repudiandae. Dicta!</p>
                                </section>
                                <section class="section-petunjuk mt-4" id="staff" data-scroll-index="2">
                                    <h5 class="title-page-petunjuk mb-0"><i class="bi bi-person-fill"></i>
                                        Staff Web</h5>
                                    <p class="text-justify">Role Staff mempunyai tugas yaitu :
                                    </p>

                                    <ol class="list-rekomendasi-perangkat">
                                        <li>Komputer/PC</li>
                                        <li>Tablet</li>
                                        <li>Smartphone</li>
                                        <li>Laptop</li>
                                        <li>Perangkat Lainnya</li>
                                    </ol>

                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum quisquam obcaecati
                                        voluptatibus dignissimos! Deleniti qui non placeat quod repudiandae. Dicta!</p>
                                    <div class="custom-block-warning ">
                                        <p class="custom-block-title mt-1 mb-50">Lanjutkan Petunjuk</p>
                                        <a class="btn btn-sm btn-success mb-2" href="/petunjuk-teknis/registrasi">Lanjutkan
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
