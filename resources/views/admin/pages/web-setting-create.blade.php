<!DOCTYPE html>
<html lang="en">
@include('admin.partials.head')

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('/assets-landing-page/img/kamen-rider-dispress.png') }}"
        type="image/x-icon" />

    <!-- judul page -->
    <title>Web Setting | Dispress</title>

    <!-- Bootstarp CSS -->
    <link rel="stylesheet" href="{{ asset('/assets-landing-page/css/bootstrap.min.css') }}" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('/assets-landing-page/css/web-setting.css') }}" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('/assets-landing-page/css/owl.carousel.min.css') }}" />
    <!-- aos carousel -->
    <link rel="stylesheet" href="{{ asset('/assets-landing-page/css/aos.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">

    <link href="{{ asset('assets-landing-page/extension/filepond/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet"
        href="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">

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
        <!-- Web setting Section Start -->
        <section class="web-setting d-flex align-items-center" id="web-setting" data-scroll-index="0">
            <div class="effect-wrap">
                <div class="spinner"></div>
                <i class="bi bi-plus effect effect-2"></i>
                <i class="bi bi-folder-fill effect effect-3"></i>
            </div>
            <div class="row container d-flex justify-content-center">
                <div class="col-12 d-flex web-setting-brand justify-content-center mb-2">
                    <img class="m-1 d-md-none d-sm-block"
                        src="{{ asset('/assets-landing-page/img/kamen-rider-dispress.png') }}" width="100px"
                        alt="logo-dispress" />
                    <img class="logo-web-setting pb-4 d-lg-block"
                        src="{{ asset('/assets-landing-page/img/logo-brand.svg') }}" alt="logo-dispress"
                        width="250px" />
                </div>
                <div class="col-12 ">
                    <form action="/register_web_setting" method="POST" enctype="multipart/form-data"
                        class="d-flex justify-content-center">
                        @csrf
                        <input type="text" name="nip" value="{{ $user['nip'] }}" id="" hidden>
                        <input type="text" name="nama" value="{{ $user['nama'] }}" id="" hidden>
                        <input type="text" name="username" value="{{ $user['username'] }}" id="" hidden>
                        <input type="text" name="pangkat" value="{{ $user['pangkat'] }}" id="" hidden>
                        <input type="text" name="golongan" value="{{ $user['golongan'] }}" id="" hidden>
                        <input type="text" name="jenis_kelamin" value="{{ $user['jenis_kelamin'] }}" id=""
                            hidden>
                        <input type="text" name="email_user" value="{{ $user['email'] }}" id="" hidden>
                        <input type="text" name="nomor_telpon_user" value="{{ $user['nomor_telpon'] }}"
                            id="" hidden>
                        <input type="text" name="password" value="{{ $user['password'] }}" id="" hidden>
                        <div class="col-lg-10 card rounded-4 card-web-setting mb-5">
                            <div class="row">
                                <div class="col-12 form-web-setting p-5">
                                    <h2 class="web-setting-title">Instansi</h2>
                                    <div class="small-line-height mb-3 ">
                                        <small class="text-primary">Masukkan data instansi Anda disini !</small>
                                    </div>
                                    <div class="row">
                                        {{-- <input type="hidden" name="id_ketua" value="{{ Auth::user()->id_user }}"> --}}
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group ">
                                                <label for="nama_instansi">Masukkan Nama Instansi: </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-building"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('nama_instansi') is-invalid @enderror"
                                                        placeholder="ex: PT Gayuh Net"
                                                        value="{{ old('nama_instansi') }}" id="nama_instansi"
                                                        name="nama_instansi" required autofocus>
                                                </div>
                                                <span class="text-danger">
                                                    @error('nama_instansi')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="nomor_telpon">Masukkan Nomor Telepon Instansi: </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="bi bi-telephone-fill"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control phone @error('nomor_telpon') is-invalid @enderror"
                                                        placeholder="ex: (0878)-2730-3388"
                                                        value="{{ old('nomor_telpon') }}" id="nomor_telpon"
                                                        name="nomor_telpon" required>
                                                </div>
                                                <span class="text-danger">
                                                    @error('nomor_telpon')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="header_surat">Header Surat: </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-secondary">
                                                            <i class="bi bi-telephone-fill"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control  @error('header_surat') is-invalid @enderror"
                                                        placeholder="ex: 0878-2730-3388"
                                                        value="{{ old('header_surat') }}"
                                                        id="header_surat" name="header_surat" required>
                                                </div>
                                                <span class="text-danger">
                                                    @error('header_surat')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="kota_user">Kota: </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-secondary">
                                                            <i class="bi bi-telephone-fill"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control  @error('kota_user') is-invalid @enderror"
                                                        placeholder="ex: 0878-2730-3388"
                                                        value="{{ old('kota_user') }}"
                                                        id="kota_user" name="kota_user" required>
                                                </div>
                                                <span class="text-danger">
                                                    @error('kota_user')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email">Masukkan Email Instansi: </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="bi bi-envelope-fill"></i>
                                                        </div>
                                                    </div>
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        placeholder="ex: contoh@gmail.com"
                                                        value="{{ old('email') }}" id="email" name="email"
                                                        required>
                                                </div>
                                                <span class="text-danger">
                                                    @error('email')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="alamat_instansi">Masukkan Alamat Instansi: </label>
                                                <textarea class="summernote-simple @error('alamat_instansi') is-invalid @enderror" id="alamat_instansi"
                                                    name="alamat_instansi" required> {{ old('alamat_instansi') }} </textarea>
                                                <span class="text-danger">
                                                    @error('alamat_instansi')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="id_ketua">Ketua Instansi: </label>
                                                <div class="input-group">
                                                    <select
                                                        class="filter select2 @error('id_ketua') is-invalid  @enderror "
                                                        id="id_ketua" name="id_ketua" style="width: 100%;" disabled>
                                                        <option selected disabled>Ketua Instansi Anda
                                                        </option>
                                                        <option {{ $user['nama'] == $user['nama'] ? 'selected' : '' }}>
                                                            {{ $user['nama'] }}</option>
                                                    </select>
                                                </div>
                                                <span class="text-danger">
                                                    @error('id_ketua')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="default_logo">Set Default Logo Instansi:
                                                        (Optional)</label>
                                                    <small class="d-block">Catatan: masukkan logo dengan format
                                                        (JPEG, PNG,
                                                        JPG),
                                                        maksimal 10
                                                        MB.</small>
                                                    <input type="file"
                                                        class="img-filepond-preview @error('default_logo') is-invalid @enderror"
                                                        id="default_logo" name="default_logo" accept="jpg,jpeg,png">
                                                    <span class="text-danger">
                                                        @error('default_logo')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-submit-web-setting col-12"><i
                                                class="icon-btn-web-setting bi-box-arrow-in-right"></i> <span> Submit
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Login Section End -->
    </div>
    @include('admin.partials.script')

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

    <script src="{{ asset('assets-landing-page/extension/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/js/filepond.js') }}"></script>
    <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.phone').inputmask('(9999)-9999-9999');
        });
    </script>

</body>

</html>
