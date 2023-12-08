@extends('admin.pages.layout')

@section('css')
    <link href="{{ asset('assets-landing-page/extension/filepond/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex">
                    {{-- judul Page --}}
                    <div class="col-md-8 col-sm-12">
                        <h4 class="text-dark judul-page">Manajemen Users</h4>
                    </div>
                    {{-- Akhir judul Page --}}
                    {{-- Breadcrumb --}}
                    <div class="col-md-4 col-sm-12 text-center items-center mt-2 ">
                        <div class="breadcrumb-item d-inline active"><a href="/dashboard">Dashboard</a></div>
                        <div class="breadcrumb-item d-inline active"><a href="/admin">Administrator</a></div>
                        <div class="breadcrumb-item d-inline">Tambah Data</div>
                    </div>
                    {{-- Akhir Breadcrumb --}}
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-1 mr-3">
                                <a href="/admin">
                                    <i class="bi bi-arrow-left"></i>
                                </a>
                            </div>
                            <div class="col-">
                                <h4 class="text-primary">Tambah Data Administrator</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <form action="/admin" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class=" col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group ">
                                        <label for="nama">Masukkan Nama: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-person-fill"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                placeholder="ex: Pasya Nada Abinaya" value="{{ old('nama') }}"
                                                id="nama" name="nama" required autofocus>
                                        </div>
                                        <span class="text-danger">
                                            @error('nama')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class=" col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="capitalize" for="nip">Masukkan NIP: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-key-fill"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control @error('nip') is-invalid @enderror"
                                                placeholder="ex: 213720078171677275" value="{{ old('nip') }}"
                                                id="nip" name="nip" required>
                                        </div>
                                        <span class="text-danger">
                                            @error('nip')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="username">Masukkan Username: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-person-badge-fill"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror"
                                                placeholder="ex: pasyaNada" value="{{ old('username') }}" id="username"
                                                name="username" required>
                                        </div>
                                        <span class="text-danger">
                                            @error('username')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="capitalize" for="level">Level: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-layer-group"></i>
                                                </div>
                                            </div>
                                            <select class="form-control select2  @error('level') is-invalid @enderror "
                                                id="level" name="level" required>
                                                <option selected disabled>Pilih Level User</option>
                                                <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}
                                                    selected>
                                                    Admin</option>
                                                <option value="officer" {{ old('level') == 'officer' ? 'selected' : '' }}
                                                    disabled>
                                                    Officer</option>
                                                <option value="staff" {{ old('level') == 'staff' ? 'selected' : '' }}
                                                    disabled>
                                                    Staff</option>
                                            </select>
                                        </div>
                                        <span class="text-danger">
                                            @error('level')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="capitalize" for="id_posisi_jabatan">Pilih Posisi Jabatan: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-person-fill-exclamation"></i>
                                                </div>
                                            </div>
                                            <select
                                                class="form-control select2 @error('id_posisi_jabatan') is-invalid  @enderror "
                                                id="id_posisi_jabatan" name="id_posisi_jabatan" required>
                                                <option selected disabled>Pilih Posisi Jabatan User</option>
                                                @foreach ($posisiJabatanList as $data)
                                                    <option value="{{ $data->id_posisi_jabatan }}"
                                                        {{ old('id_posisi_jabatan') == $data->id_posisi_jabatan ? 'selected' : '' }}>
                                                        {{ $data->nama_posisi_jabatan }} |
                                                        {{ jabatanConvert($data->tingkat_jabatan, 'jabatan') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class="text-danger">
                                            @error('id_posisi_jabatan')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Masukkan Email: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-envelope-fill"></i>
                                                </div>
                                            </div>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="ex: contoh@gmail.com" value="{{ old('email') }}"
                                                id="email" name="email" required>
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
                                        <label for="nomor_telpon">Masukkan Nomor Telepon: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-telephone-fill"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control phone @error('nomor_telpon') is-invalid @enderror"
                                                placeholder="ex: 0878-2730-3388" value="{{ old('nomor_telpon') }}"
                                                id="nomor_telpon" name="nomor_telpon" required>
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
                                        <label for="password">Masukkan Password: </label>
                                        <div class="input-group position-relative">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-lock-fill"></i>
                                                </div>
                                            </div>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="ex: psyanda153" value="{{ old('password') }}"
                                                id="password" name="password" required>
                                            <i class="bi bi-eye view-password-icon"></i>
                                        </div>
                                        <span class="text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="foto">Masukkan foto: </label>
                                <small class="d-block">Catatan: masukkan foto dengan format (JPEG, PNG,
                                    JPG),
                                    maksimal 10
                                    MB.</small>
                                <input type="file"
                                    class="img-filepond-preview @error('foto_user') is-invalid @enderror" id="foto_user"
                                    name="foto_user" accept="jpg,jpeg,png,svg">
                                <span class="text-danger">
                                    @error('foto_user')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <div class="row d-flex justify-content-end">
                                    <div class="ml-2 ">
                                        <a href="/admin" class="btn btn-warning  ">
                                            <i class="bi bi-arrow-90deg-left fs-6 l-1"></i>
                                            <span class="bi-text">Kembali</span>
                                        </a>
                                    </div>
                                    <div class="ml-2">
                                        <button type="submit" class="btn btn-primary mb-1">
                                            <i class="bi bi-clipboard-plus-fill fs-6 mr-1"></i>
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
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/input-mask/jquery.inputmask.bundle.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.phone').inputmask('9999-9999-9999');

            $('#nip').inputmask('999999999999999999');

            $('.view-password-icon').on('click', function() {
                if ($(this).hasClass('bi-eye')) {
                    $(this).removeClass('bi-eye');
                    $(this).addClass('bi-eye-slash');
                    $('#password').attr('type', 'text');
                } else {
                    $(this).removeClass('bi-eye-slash');
                    $(this).addClass('bi-eye');
                    $('#password').attr('type', 'password');
                }
            });
        });
    </script>
@endsection
