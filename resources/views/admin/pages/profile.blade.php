@extends('admin.pages.layout')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex">
                    {{-- judul Page --}}
                    <div class="col-md-7 col-sm-12">
                        <h4 class="text-dark judul-page">Manajemen Users</h4>
                    </div>
                    {{-- Akhir judul Page --}}
                    {{-- Breadcrumb --}}
                    <div class="col-md-5 col-sm-12 text-center items-center mt-2 ">
                        <div class="breadcrumb-item d-inline active"><a href="/dashboard">Dashboard</a></div>
                        <div class="breadcrumb-item d-inline active"><a href="/admin">Administrator</a></div>
                        <div class="breadcrumb-item d-inline">Profile Administrator</div>
                    </div>
                    {{-- Akhir Breadcrumb --}}
                </div>
            </div>
        </div>


        <div class="section-body">
            <div class="card">
                <div class="row card-header">
                    <div class="col-10">
                        <div class="row">
                            <a href="/admin" title="Kembali">
                                <i class="bi bi-arrow-left mr-3"></i>
                            </a>
                            <h4 class="text-primary ">Profile Administrator</h4>
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-end btn-group">
                        <a href="/admin/{{ Crypt::encryptString($dataProfile->id_user) }}/edit" class="text-white">
                            <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                title="Edit Data Administrator" data-original-title="Edit Data Administrator">
                                <i class="bi bi-pencil btn-tambah-data"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body ">
                    <form action="/administrator" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                @if ($dataProfile->foto_user)
                                    <div class="d-flex justify-content-center">
                                        <img src="{{ asset('image_save/' . $dataProfile->foto_user) }}"
                                            alt="foto {{ $dataProfile->username }}" class="foto-user">
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center">
                                        <img src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                            alt="foto {{ $dataProfile->username }}" class="foto-user">
                                    </div>
                                @endif
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="nama">Nama : </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-person-fill"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control capitalize @error('nama') is-invalid @enderror"
                                                    value="{{ $dataProfile->nama }}" id="nama" name="nama" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="username">Username : </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-person-badge-fill"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    value="{{ $dataProfile->username }}" id="username" name="username"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Email : </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-envelope-fill"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ $dataProfile->email }}" id="email" name="email"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="nomor_telpon">Nomor Telepon : </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-telephone-fill"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control phone @error('nomor_telpon') is-invalid @enderror"
                                                    value="{{ currencyPhone($dataProfile->nomor_telpon) }}"
                                                    id="nomor_telpon" name="nomor_telpon" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="nip">Nomor Induk Pegawai : </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-key-fill"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('nip') is-invalid @enderror"
                                                    value="{{ $dataProfile->nip }}" id="nip" name="nip"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="jabatan">Jabatan : </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-person-fill-exclamation"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('jabatan') is-invalid @enderror"
                                                    value="{{ $dataProfile->jabatan }}" id="jabatan" name="jabatan"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="level">Akses : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">
                                                <i class="bi bi-layers-fill"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control capitalize @error('level') is-invalid @enderror"
                                            value="{{ $dataProfile->level === 'admin' ? 'Administrator' : $dataProfile->level }}"
                                            id="level" name="level" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <div class=" ">
                                    <a href="/admin" class="btn btn-warning  ">
                                        <i class="bi bi-arrow-90deg-left fs-6 l-1"></i>
                                        <span class="bi-text">Kembali</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
