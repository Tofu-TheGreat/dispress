@extends('admin.pages.layout')

@section('css')
    <link href="{{ asset('assets-landing-page/extension/filepond/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
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
                        <div class="breadcrumb-item d-inline">Profile {{ $dataProfile->level }}</div>
                    </div>
                    {{-- Akhir Breadcrumb --}}
                </div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Hi, {{ $dataProfile->nama }}!</h2>
            <p class="section-lead">
                Ubah Profile dan Password Anda disini.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            @if ($dataProfile->foto_user)
                                <div class="position-relative">
                                    <img alt="image {{ $dataProfile->username }}"
                                        src="{{ asset('image_save/' . $dataProfile->foto_user) }}"
                                        class="rounded-circle profile-widget-picture">
                                    <div class="position-absolute text-center profile-hapus-foto">
                                        <button type="button" data-toggle="tooltip" data-placement="top"
                                            title="Hapus Foto Profile" data-original-title="Hapus Foto Profile"
                                            class="btn btn-icon icon-left btn-danger btn-sm px-md-3 px-sm-1 tombol-hapus-profile"><i
                                                class="fas fa-trash"></i>Hapus
                                        </button>
                                    </div>
                                </div>
                            @else
                                <img alt="image {{ $dataProfile->username }}"
                                    src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                    class="rounded-circle profile-widget-picture">
                            @endif
                            <div class="profile-widget-items">
                                @can('admin-officer')
                                    <div class="profile-widget-item position-relative">
                                        <div style="position: absolute; top: 2px; right: 0px;z-index: 9; font-size: .7rem">
                                            <span data-toggle="tooltip" data-placement="top"
                                                title="Ini adalah Semua data Surat yang Anda buat."
                                                data-original-title="Ini adalah Semua data Surat yang Anda buat.">
                                                <i class="bi bi-question-circle mr-2 text-primary"></i>
                                            </span>
                                        </div>
                                        <div class="profile-widget-item-label">Surat</div>
                                        <div class="profile-widget-item-value">{{ $getSuratCount }}</div>
                                    </div>
                                    <div class="profile-widget-item position-relative">
                                        <div style="position: absolute; top: 2px; right: 0px;z-index: 9; font-size: .7rem">
                                            <span data-toggle="tooltip" data-placement="top"
                                                title="Ini adalah Semua data Pengajuan yang Anda buat."
                                                data-original-title="Ini adalah Semua data Pengajuan yang Anda buat.">
                                                <i class="bi bi-question-circle mr-2 text-primary"></i>
                                            </span>
                                        </div>
                                        <div class="profile-widget-item-label">Pengajuan</div>
                                        <div class="profile-widget-item-value">{{ $getPengajuanCount }}</div>
                                    </div>
                                @endcan
                                @can('admin')
                                    <div class="profile-widget-item position-relative">
                                        <div style="position: absolute; top: 2px; right: 0px;z-index: 9; font-size: .7rem">
                                            <span data-toggle="tooltip" data-placement="top"
                                                title="Ini adalah Semua data Disposisi yang Anda buat."
                                                data-original-title="Ini adalah Semua data Disposisi yang Anda buat.">
                                                <i class="bi bi-question-circle mr-2 text-primary"></i>
                                            </span>
                                        </div>
                                        <div class="profile-widget-item-label">Disposisi</div>
                                        <div class="profile-widget-item-value">{{ $getDisposisiByUserCount }}</div>
                                    </div>
                                @endcan
                                @cannot('admin')
                                    <div class="profile-widget-item position-relative">
                                        <div style="position: absolute; top: 2px; right: 0px;z-index: 9; font-size: .7rem">
                                            <span data-toggle="tooltip" data-placement="top"
                                                title="Ini adalah Semua data Disposisi untuk Anda."
                                                data-original-title="Ini adalah Semua data Disposisi untuk Anda.">
                                                <i class="bi bi-question-circle mr-2 text-primary"></i>
                                            </span>
                                        </div>
                                        <div class="profile-widget-item-label">Disposisi</div>
                                        <div class="profile-widget-item-value">{{ $getDisposisiForUserCount }}</div>
                                    </div>
                                @endcannot
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name text-capitalize">{{ $dataProfile->nama }}<div
                                    class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> {{ $dataProfile->username }}
                                </div>
                            </div>
                            <div class="card shadow-sm position-relative">
                                <div style="position: absolute; top: 4px; left: 10px;z-index: 9;">
                                    <span data-toggle="tooltip" data-placement="top"
                                        title="Ini adalah Statistik data Disposisi untuk Anda."
                                        data-original-title="Ini adalah Statistik data Disposisi untuk Anda.">
                                        <i class="bi bi-question-circle mr-2 text-primary"></i>
                                    </span>
                                </div>
                                <div style="position: absolute; top: 5px; right: 5px">
                                    <a href="/disposisi" data-toggle="tooltip" data-placement="top"
                                        title="Menuju detail disposisi untuk anda."
                                        data-original-title="Menuju detail disposisi untuk anda.">
                                        <i class="bi bi-arrow-right-circle mr-2 text-primary"></i>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChartDisposisi" height="158"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-statistic-1 position-relative">
                        <div style="position: absolute; top: 5px; right: 5px">
                            <a href="/disposisi" data-toggle="tooltip" data-placement="top"
                                title="Menuju detail disposisi untuk anda."
                                data-original-title="Menuju detail disposisi untuk anda.">
                                <i class="bi bi-arrow-right-circle-fill mr-2 text-primary" style="font-size: 1rem;"></i>
                            </a>
                        </div>
                        <div class="card-icon bg-primary position-relative">
                            <div style="position: absolute; top: -33px; left: 5px">
                                <span data-toggle="tooltip" data-placement="top"
                                    title="Ini adalah data yang Didisposisikan untuk Anda."
                                    data-original-title="Ini adalah data yang Didisposisikan untuk Anda.">
                                    <i class="bi bi-question-circle mr-2 text-white"></i>
                                </span>
                            </div>
                            <i class="fas fa-envelope-open-text"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Disposisi untuk {{ auth()->user()->nama }}</h4>
                            </div>
                            <div class="card-body">
                                {{ $getDisposisiForUserCount }} Data
                            </div>
                        </div>
                    </div>
                    <div class="card card-statistic-1 position-relative">
                        <div style="position: absolute; top: 5px; right: 5px">
                            <a href="/surat-keluar" data-toggle="tooltip" data-placement="top"
                                title="Menuju detail surat keluar untuk anda."
                                data-original-title="Menuju detail surat keluar untuk anda.">
                                <i class="bi bi-arrow-right-circle-fill mr-2 text-primary" style="font-size: 1rem;"></i>
                            </a>
                        </div>
                        <div class="card-icon bg-warning position-relative">
                            <div style="position: absolute; top: -33px; left: 5px">
                                <span data-toggle="tooltip" data-placement="top"
                                    title="Ini adalah data surat keluar untuk Anda."
                                    data-original-title="Ini adalah data surat keluar untuk Anda.">
                                    <i class="bi bi-question-circle mr-2 text-white"></i>
                                </span>
                            </div>
                            <i class="fas fa-envelope-open"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Surat Keluar untuk {{ auth()->user()->nama }}</h4>
                            </div>
                            <div class="card-body">
                                10 Data
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-10">
                                <div class="row">
                                    <a href="/{{ $dataProfile->level }}" class="mt-2" title="Kembali">
                                        <i class="bi bi-arrow-left mr-3"></i>
                                    </a>
                                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                                        <li class="nav-item text-center">
                                            <a class="nav-link active" id="home-tab3" data-toggle="tab"
                                                href="#profile-edit" role="tab" aria-controls="home"
                                                aria-selected="true"><i class="bi bi-person-fill"></i> Edit
                                                Profile</a>
                                        </li>
                                        <li class="nav-item text-center">
                                            <a class="nav-link" id="profile-tab3" data-toggle="tab"
                                                href="#change-password" role="tab" aria-controls="profile"
                                                aria-selected="false"><i class="bi bi-lock-fill"></i> Change
                                                Password</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="profile-edit" role="tabpanel"
                                    aria-labelledby="home-tab3">
                                    {{-- edit profile --}}
                                    <form action="{{ route('profile-edit', $dataProfile->id_user) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="id_user" value="{{ $dataProfile->id_user }}"
                                            id="" hidden>
                                        <input type="text" name="password" value="{{ $dataProfile->password }}"
                                            id="" hidden>
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="nip">NIP: </label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text bg-secondary">
                                                                        <i class="bi bi-key-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text"
                                                                    class="form-control capitalize @error('nip') is-invalid @enderror"
                                                                    placeholder="ex: 213720078171677275"
                                                                    value="{{ $dataProfile->nip }}" id="nip"
                                                                    name="nip">
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
                                                            <label for="nama">Nama: </label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text bg-secondary">
                                                                        <i class="bi bi-person-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text"
                                                                    class="form-control capitalize @error('nama') is-invalid @enderror"
                                                                    placeholder="ex: Pasya Nada Abinaya"
                                                                    value="{{ $dataProfile->nama }}" id="nama"
                                                                    name="nama">
                                                            </div>
                                                            <span class="text-danger">
                                                                @error('nama')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="username">Username: </label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text bg-secondary">
                                                                        <i class="bi bi-person-badge-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text"
                                                                    class="form-control @error('username') is-invalid @enderror"
                                                                    placeholder="ex: pasyaNada"
                                                                    value="{{ $dataProfile->username }}" id="username"
                                                                    name="username">
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
                                                                    value="{{ $dataProfile->email }}" id="email"
                                                                    name="email">
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
                                                                    value="{{ $dataProfile->nomor_telpon }}"
                                                                    id="nomor_telpon" name="nomor_telpon">
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
                                                            <label for="level">Pilih Level: </label>
                                                            <div class="input-group">
                                                                <select class="form-control select2" id="level"
                                                                    name="level" style="width: 100%">
                                                                    <option selected disabled>Pilih Level</option>
                                                                    <option value="admin"
                                                                        {{ $dataProfile->level == 'admin' ? 'selected' : '' }}>
                                                                        Admin</option>
                                                                    <option value="officer"
                                                                        {{ $dataProfile->level == 'officer' ? 'selected' : '' }}>
                                                                        officer</option>
                                                                    <option value="staff"
                                                                        {{ $dataProfile->level == 'staff' ? 'selected' : '' }}>
                                                                        staff</option>
                                                                </select>
                                                            </div>
                                                            <span class="text-danger">
                                                                @error('level')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="capitalize" for="id_posisi_jabatan">Pilih Posisi
                                                        Jabatan:
                                                    </label>
                                                    <div class="input-group">
                                                        <select
                                                            class="form-control select2 @error('id_posisi_jabatan') is-invalid  @enderror "
                                                            id="id_posisi_jabatan" name="id_posisi_jabatan" required
                                                            style="width: 100%">
                                                            <option selected disabled>Pilih Posisi Jabatan User</option>
                                                            @foreach ($posisiJabatanList as $item)
                                                                <option value="{{ $item->id_posisi_jabatan }}"
                                                                    {{ $dataProfile->id_posisi_jabatan == $item->id_posisi_jabatan ? 'selected' : '' }}>
                                                                    {{ $item->nama_posisi_jabatan }} |
                                                                    {{ jabatanConvert($item->tingkat_jabatan, 'jabatan') }}
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
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="foto">Masukkan Foto: </label>
                                                        <small class="d-block">Catatan: masukkan foto dengan format
                                                            (JPEG, PNG,
                                                            JPG),
                                                            maksimal 10
                                                            MB.</small>
                                                        <input type="file"
                                                            class="img-filepond-preview @error('foto_user') is-invalid @enderror"
                                                            id="foto_user" name="foto_user" accept="jpg,jpeg,png">
                                                        <span class="text-danger">
                                                            @error('foto_user')
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
                                                    <a href="/{{ $dataProfile->level }}" class="btn btn-warning  ">
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
                                    {{-- end edit profile --}}
                                </div>
                                <div class="tab-pane fade" id="change-password" role="tabpanel"
                                    aria-labelledby="profile-tab3">
                                    {{-- change password --}}
                                    <form action="/profile-change-password/{{ $dataProfile->id_user }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <input type="text" name="id_user" value="{{ $dataProfile->id_user }}"
                                            id="" hidden>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="password_lama">Masukkan Password Lama: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi fs-2 bi-key"></i>
                                                            </div>
                                                        </div>
                                                        <input type="password"
                                                            class="form-control capitalize @error('password_lama') is-invalid @enderror"
                                                            id="password_lama" name="password_lama">
                                                        <i class="bi bi-eye view-password-icon"></i>
                                                    </div>
                                                    <div class="text-danger">
                                                        @error('password_lama')
                                                            {{ $message }}
                                                        @enderror
                                                        @if (Session::has('password_lama'))
                                                            <p>{{ Session::get('password_lama') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="password_baru">Masukkan Password Baru : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi fs-2 bi-key-fill"></i>
                                                            </div>
                                                        </div>
                                                        <input type="password"
                                                            class="form-control phone @error('password_baru') is-invalid @enderror"
                                                            id="password_baru" name="password_baru">
                                                        <i class="bi bi-eye view-password-icon"></i>

                                                    </div>
                                                    <div class="text-danger">
                                                        @error('password_baru')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="password_baru_ulang">Ulangi Password Baru :
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi fs-2 bi-key-fill"></i>
                                                            </div>
                                                        </div>
                                                        <input type="password"
                                                            class="form-control phone @error('password_baru_ulang') is-invalid @enderror"
                                                            id="password_baru_ulang" name="password_baru_ulang">
                                                        <i class="bi bi-eye view-password-icon"></i>

                                                    </div>
                                                    <div class="text-danger">
                                                        @error('password_baru_ulang')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <div class="row d-flex justify-content-end">
                                                    <div class="ml-2 ">
                                                        <a href="/{{ $dataProfile->level }}" class="btn btn-warning  ">
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
                                        </div>
                                    </form>
                                    {{-- end change password --}}
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
    <script src="{{ asset('assets/modules/chart.min.js') }}"></script>

    {{-- handle view password --}}

    <script>
        $('.view-password-icon').on('click', function() {
            const passwordInput = $(this).closest('.form-group').find('input');

            if ($(this).hasClass('bi-eye')) {
                $(this).removeClass('bi-eye');
                $(this).addClass('bi-eye-slash');
                passwordInput.attr('type', 'text');
            } else {
                $(this).removeClass('bi-eye-slash');
                $(this).addClass('bi-eye');
                passwordInput.attr('type', 'password');
            }
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

    {{-- seweetalert confirmation delete image --}}
    <script>
        document.body.addEventListener("click", function(event) {
            const element = event.target;

            if (element.classList.contains("tombol-hapus-profile")) {
                swal({
                    title: 'Apakah anda yakin?',
                    text: 'Ingin menghapus foto profile {{ $dataProfile->level }} ini?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        swal('Foto profile {{ $dataProfile->level }} berhasil dihapus!', {
                            icon: 'success',
                        });
                        // Make an AJAX request to trigger the delete
                        fetch('{{ route('deleteImageFromUser', $dataProfile->id_user) }}', {
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
                        swal('Foto profile {{ $dataProfile->level }} tidak jadi dihapus!');
                    }
                });
            }
        });
    </script>

    {{-- Chart Disposisi --}}
    <script>
        const ctx = document.getElementById("myChartDisposisi").getContext('2d');
        const myChartDisposisi = new Chart(ctx, {
            type: 'line',
            data: {
                // labels:
                labels: {!! json_encode($disposisiUserChart['dates']) !!},
                datasets: [{
                    label: 'Disposisi',
                    data: {!! json_encode($disposisiUserChart['disposisi_count']) !!},
                    borderWidth: 2,
                    backgroundColor: 'rgba(63,82,227,.8)',
                    borderWidth: 0,
                    borderColor: 'transparent',
                    pointBorderWidth: 0,
                    pointRadius: 3.5,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
                }]
            },
            options: {
                legend: {
                    display: true
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            // display: false,
                            drawBorder: false,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 10,
                            callback: function(value, index, values) {
                                return value;
                            }
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false,
                            tickMarkLength: 15,
                        }
                    }]
                },
            }
        });
    </script>
@endsection
