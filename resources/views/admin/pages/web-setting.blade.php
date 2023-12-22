@extends('admin.pages.layout')

@section('css')
    <link href="{{ asset('assets-landing-page/extension/filepond/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex">
                    {{-- judul Page --}}
                    <div class="col-md-9 col-sm-12">
                        <h4 class="text-dark judul-page">Manajemen Setting</h4>
                    </div>
                    {{-- Akhir judul Page --}}
                    {{-- Breadcrumb --}}
                    <div class="col-md-3 col-sm-12 text-center items-center mt-2 ">
                        <div class="breadcrumb-item d-inline active"><a href="/dashboard">Dashboard</a></div>
                        <div class="breadcrumb-item d-inline">Web Setting</div>
                    </div>
                    {{-- Akhir Breadcrumb --}}
                </div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Setting</h2>
            <p class="section-lead">
                Atur dan sesuaikan Instansi anda.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card card-profile-widget profile-widget shadow-sm mb-5">
                        <div class="profile-widget-header profile-widget-header-bg-img position-relative"
                            @if ($dataWebSetting->instansi->foto_instansi) style="background-image: url({{ asset('image_save/' . $dataWebSetting->instansi->foto_instansi) }})"
                            @else
                            style="background-image: url({{ asset('assets-landing-page/img/Building-bro.png') }})" @endif>
                            @if ($dataWebSetting->default_logo)
                                <div class="img-web-wrapper">
                                    <div class="position-relative">
                                        <img alt="image {{ $dataWebSetting->instansi->nama_instansi }}"
                                            src="{{ asset('image_save/' . $dataWebSetting->default_logo) }}"
                                            class="rounded-circle profile-widget-picture profile-widget-picture-instansi">
                                        <div class="position-absolute text-center profile-hapus-foto-instansi">
                                            <button type="button" data-toggle="tooltip" data-placement="top"
                                                title="Hapus Logo Instansi" data-original-title="Hapus Logo Instansi"
                                                class="btn btn-icon icon-left btn-danger btn-sm px-md-3 px-sm-1 tombol-hapus-instansi"><i
                                                    class="fas fa-trash"></i>Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="img-web-wrapper">
                                    <div class="position-relative">
                                        <img alt="image {{ $dataWebSetting->instansi->nama_instansi }}"
                                            src="{{ asset('assets-landing-page/img/logo-sekolah.png') }}"
                                            class="rounded-circle profile-widget-picture profile-widget-picture-instansi">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="profile-widget-description mt-4">
                            <div class="profile-widget-name text-capitalize">{{ $dataWebSetting->instansi->nama_instansi }}
                            </div>
                            <div class="informasi">
                                <p>{{ $dataWebSetting->instansi->alamat_instansi }}</p>
                            </div>
                            <div class="text-center">
                                <div class="font-weight-bold mb-2"> Informasi Lainnya </div>
                                <span data-toggle="tooltip" data-placement="top"
                                    title="{{ $dataWebSetting->instansi->email }}"
                                    data-original-title="{{ $dataWebSetting->instansi->email }}"
                                    class="btn btn-primary mr-1">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <span data-toggle="tooltip" data-placement="top"
                                    title="{{ currencyPhone($dataWebSetting->instansi->nomor_telpon) }}"
                                    data-original-title="{{ currencyPhone($dataWebSetting->instansi->nomor_telpon) }}"
                                    class="btn btn-primary mr-1">
                                    <i class="bi bi-telephone"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            @if ($dataWebSetting->ketua->foto_user)
                                <img alt="image {{ $dataWebSetting->ketua->username }}"
                                    src="{{ asset('image_save/' . $dataWebSetting->ketua->foto_user) }}"
                                    class="rounded-circle profile-widget-picture">
                            @else
                                <img alt="image {{ $dataWebSetting->ketua->username }}"
                                    src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                    class="rounded-circle profile-widget-picture">
                            @endif
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-value">{{ $dataWebSetting->ketua->nama }}</div>
                                    <div class="profile-widget-item-label">Ketua Instansi</div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <ul
                                class="list-unstyled user-details list-unstyled-border list-unstyled-noborder d-flex justify-content-center">
                                <li class="media">
                                    <div class="media-items">
                                        <div class="media-item">
                                            <div class="media-value">Email</div>
                                            <div class="media-label">{{ $dataWebSetting->ketua->email }}</div>
                                        </div>
                                        <div class="media-item">
                                            <div class="media-value">No. Telp</div>
                                            <div class="media-label">{{ $dataWebSetting->ketua->nomor_telpon }}</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-10">
                                <div class="row">
                                    <a href="/dashboard" class="mt-2" title="Kembali">
                                        <i class="bi bi-arrow-left mr-3"></i>
                                    </a>
                                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                                        <li class="nav-item text-center">
                                            <a class="nav-link active" id="web-setting-show" data-toggle="tab"
                                                href="#show-web-setting" role="tab" aria-controls="home"
                                                aria-selected="true"><i class="bi bi-building mr-1"></i> Detail Profile
                                                Instansi
                                            </a>
                                        </li>
                                        <li class="nav-item text-center">
                                            <a class="nav-link" id="web-setting-edit" data-toggle="tab"
                                                href="#edit-web-setting" role="tab" aria-controls="profile"
                                                aria-selected="false"><i class="bi bi-pencil-fill mr-1"></i> Edit Profile
                                                Instansi</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="show-web-setting" role="tabpanel"
                                    aria-labelledby="web-setting-show">
                                    {{-- show profile web setting --}}
                                    <form action="{{ route('profile-edit', $dataWebSetting->id_web_setting) }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="id_instansi">Instansi Anda: </label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text bg-secondary">
                                                                        <i class="bi bi-key-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text"
                                                                    class="form-control capitalize @error('id_instansi') is-invalid @enderror"
                                                                    placeholder="ex: 213720078171677275"
                                                                    value="{{ $dataWebSetting->instansi->nama_instansi }}"
                                                                    name="id_instansi" readonly>
                                                            </div>
                                                            <span class="text-danger">
                                                                @error('id_instansi')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="id_ketua">Ketua Instansi: </label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text bg-secondary">
                                                                        <i class="bi bi-person-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text"
                                                                    class="form-control capitalize @error('id_ketua') is-invalid @enderror"
                                                                    placeholder="ex: Pasya Nada Abinaya"
                                                                    value="{{ $dataWebSetting->ketua->nama }}"
                                                                    id="id_ketua" name="id_ketua" readonly>
                                                            </div>
                                                            <span class="text-danger">
                                                                @error('id_ketua')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="email">Email Instansi: </label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text bg-secondary">
                                                                        <i class="bi bi-envelope-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text"
                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                    placeholder="ex: contoh@gmail.com"
                                                                    value="{{ $dataWebSetting->instansi->email }}"
                                                                    name="email" readonly>
                                                            </div>
                                                            <span class="text-danger">
                                                                @error('email')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="nomor_telpon">Nomor Telepon Instansi: </label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text bg-secondary">
                                                                        <i class="bi bi-telephone-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text"
                                                                    class="form-control phone @error('nomor_telpon') is-invalid @enderror"
                                                                    placeholder="ex: 0878-2730-3388"
                                                                    value="{{ $dataWebSetting->instansi->nomor_telpon }}"
                                                                    name="nomor_telpon" readonly>
                                                            </div>
                                                            <span class="text-danger">
                                                                @error('nomor_telpon')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="alamat_instansi">Alamat Instansi: </label>
                                                            <textarea class="summernote-simple summernote-disable @error('alamat_instansi') is-invalid @enderror"
                                                                name="alamat_instansi" readonly> {{ $dataWebSetting->instansi->alamat_instansi }} </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- end show profile web --}}
                                </div>
                                <div class="tab-pane fade" id="edit-web-setting" role="tabpanel"
                                    aria-labelledby="web-setting-edit">
                                    {{-- edit web profile --}}
                                    <form action="{{ route('web-setting-edit', $dataWebSetting->id_web_setting) }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="id_instansi">Instansi Anda: </label>
                                                            <div class="input-group">
                                                                <select
                                                                    class="filter select2 @error('id_instansi') is-invalid  @enderror "
                                                                    id="id_instansi" name="id_instansi"
                                                                    style="width: 100%;" required>
                                                                    <option selected disabled>Pilih Instansi Pengirim
                                                                    </option>
                                                                    @foreach ($instansiList as $data)
                                                                        <option value="{{ $data->id_instansi }}"
                                                                            {{ $dataWebSetting->id_instansi == $data->id_instansi ? 'selected' : '' }}>
                                                                            {{ $data->nama_instansi }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <span class="text-danger">
                                                                @error('id_instansi')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="id_ketua">Ketua Instansi: </label>
                                                            <div class="input-group">
                                                                <select
                                                                    class="filter select2 @error('id_user') is-invalid  @enderror "
                                                                    id="id_user" name="id_ketua" style="width: 100%;"
                                                                    required>
                                                                    <option selected disabled>Pilih Instansi Pengirim
                                                                    </option>
                                                                    @foreach ($userList as $data)
                                                                        <option value="{{ $data->id_user }}"
                                                                            {{ $dataWebSetting->id_ketua == $data->id_user ? 'selected' : '' }}>
                                                                            {{ $data->nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <span class="text-danger">
                                                                @error('id_ketua')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="email">Email: </label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text bg-secondary">
                                                                        <i class="bi bi-envelope-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text"
                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                    placeholder="ex: contoh@gmail.com"
                                                                    value="{{ $dataWebSetting->instansi->email }}"
                                                                    id="email" name="email">
                                                            </div>
                                                            <span class="text-danger">
                                                                @error('email')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="nomor_telpon">Nomor Telepon: </label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text bg-secondary">
                                                                        <i class="bi bi-telephone-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text"
                                                                    class="form-control phone @error('nomor_telpon') is-invalid @enderror"
                                                                    placeholder="ex: 0878-2730-3388"
                                                                    value="{{ $dataWebSetting->instansi->nomor_telpon }}"
                                                                    id="nomor_telpon" name="nomor_telpon">
                                                            </div>
                                                            <span class="text-danger">
                                                                @error('nomor_telpon')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="alamat_instansi">Alamat Instansi: </label>
                                                    <textarea class="summernote-simple @error('alamat_instansi') is-invalid @enderror" id="alamat_instansi"
                                                        name="alamat_instansi" readonly> {{ $dataWebSetting->instansi->alamat_instansi }} </textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="default_logo">Set Default Logo Instansi: </label>
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

                                        <div class="col-12 d-flex justify-content-end">
                                            <div class="row d-flex justify-content-end">
                                                <div class="ml-2 ">
                                                    <a href="/dashboard" class="btn btn-warning  ">
                                                        <i class="bi bi-arrow-90deg-left fs-6 l-1"></i>
                                                        <span class="bi-text">Kembali</span>
                                                    </a>
                                                </div>
                                                <div class="ml-2">
                                                    <button type="submit" class="btn btn-primary mb-1">
                                                        <i class="bi bi-clipboard-check-fill fs-6 mr-1"></i>
                                                        <span class="bi-text">Save Data</span></button>
                                                </div>
                                                <div class="ml-2 ">
                                                    <button type="reset" class="btn btn-secondary">
                                                        <i class="bi bi-arrow-counterclockwise fs-6 mr-1"></i>
                                                        <span class="bi-text">Reset</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- end edit web profile --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/js/filepond.js') }}"></script>
    <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>

    <script>
        // Delegasi event change untuk elemen dengan ID 'id_instansi'
        $(document).on('change', '#id_instansi', function() {
            // Mendapatkan nilai yang dipilih dari dropdown
            const selectedValue = $(this).val();

            // Mendapatkan data terkait dari dropdown yang dipilih
            const selectedInstansi = {!! json_encode($instansiList) !!}.find(function(item) {
                return item.id_instansi == selectedValue;
            });

            // Mengisi nilai pada elemen dengan ID 'email' dan 'nomor_telpon'
            $('#email').val(selectedInstansi ? selectedInstansi.email : '');
            $('#nomor_telpon').val(selectedInstansi ? selectedInstansi.nomor_telpon : '');

            // Menetapkan nilai pada elemen dengan ID 'alamat_instansi'
            const alamatValue = selectedInstansi ? selectedInstansi.alamat_instansi : '';
            $('#alamat_instansi').summernote('code', alamatValue);
        });
    </script>

    {{-- Toast --}}
    @if (Session::has('success'))
        <script>
            $(document).ready(function() {
                iziToast.success({
                    title: 'Success',
                    message: "{{ Session::get('success') }}",
                    position: 'topRight'
                })
            });
        </script>
    @endif
    @if (Session::has('warning'))
        <script>
            $(document).ready(function() {
                iziToast.warning({
                    title: 'warning',
                    message: "{{ Session::get('warning') }}",
                    position: 'topRight'
                })
            });
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            $(document).ready(function() {
                iziToast.error({
                    title: 'Error',
                    message: "{{ Session::get('error') }} Import",
                    position: 'topRight'
                })
            });
        </script>
    @endif

    {{-- Summernote --}}
    <script>
        $('.summernote-simple').summernote({
            dialogsInBody: true,
            minHeight: 150,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['para', ['paragraph']]
            ]
        });

        $('.summernote-disable').next().find(".note-editable").attr("contenteditable", false);
    </script>
    <script>
        document.body.addEventListener("click", function(event) {
            const element = event.target;

            if (element.classList.contains("tombol-hapus-instansi")) {
                swal({
                    title: 'Apakah anda yakin?',
                    text: 'Ingin menghapus foto instansi ini?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        swal('Foto instansi berhasil dihapus!', {
                            icon: 'success',
                        });
                        // Make an AJAX request to trigger the delete
                        fetch('{{ route('deleteImageWebSetting', $dataWebSetting->id_web_setting) }}', {
                                method: 'GET',
                            })
                            .then(response => {
                                // Handle the response here (e.g., trigger the delete)
                                if (response.ok) {

                                    window.location.reload();
                                }
                            })
                            .catch(error => {
                                // Handle any errors here
                                console.error('Error:', error);
                            });
                    } else {
                        swal('Foto profile Admin tidak jadi dihapus!');
                    }
                });
            }
        });
    </script>
@endsection
