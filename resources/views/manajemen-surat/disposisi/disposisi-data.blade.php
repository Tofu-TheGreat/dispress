@extends('admin.pages.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link href="{{ asset('assets-landing-page/extension/filepond/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex">
                    {{-- judul Page --}}
                    <div class="col-md-9 col-sm-8">
                        <h4 class="text-dark judul-page">Manajemen Surat</h4>
                    </div>
                    {{-- Akhir judul Page --}}
                    {{-- Breadcrumb --}}
                    <div class="col-md-3 col-sm-4 text-center items-center mt-2 ">
                        <div class="breadcrumb-item d-inline active"><a href="/dashboard">Dashboard</a></div>
                        <div class="breadcrumb-item d-inline">Disposisi</div>
                    </div>
                    {{-- Akhir Breadcrumb --}}
                </div>
            </div>
        </div>

        {{-- Filter by user --}}
        <div class="card" id="filter1">
            <div class="card-header d-flex justify-content-between">
                <div class="col">
                    <h4 class="text-primary">Filter</h4>
                </div>
                <div class="col d-flex justify-content-end">
                    {{-- Button Triger Filter --}}
                    <span data-toggle="tooltip" data-placement="top" title="Klik untuk menu filter data."
                        data-original-title="Filter Data" disabled>
                        <button class="btn btn-info collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"
                            title="Tombol Filter">
                            <i class="bi bi-funnel-fill"></i>
                        </button>
                    </span>
                    {{-- Akhir Button Triger Filter --}}
                </div>
            </div>
            <form action="/disposisi-filter" method="get">
                @csrf
                <div class="collapse" id="collapseExample" style="">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="id_user">Pilih Berdasarkan Pengirim: </label>
                                    <div class="input-group">
                                        <select class="filter select2 @error('id_user') is-invalid  @enderror "
                                            id="id_user" name="id_user" style="width: 100%;">
                                            <option selected disabled>Pilih Pengirim</option>
                                            @foreach ($userList as $data)
                                                <option value="{{ $data->id_user }}"
                                                    {{ old('id_user') == $data->id_user ? 'selected' : '' }}>
                                                    {{ $data->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('id_user')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="sifat_disposisi">Pilih Berdasarkan Sifat Disposisi:
                                    </label>
                                    <div class="input-group">
                                        <select class="filter select2 @error('sifat_disposisi') is-invalid  @enderror "
                                            id="sifat_disposisi" name="sifat_disposisi" style="width: 100%;">
                                            <option selected disabled>Pilih Sifat Disposisi</option>
                                            <option value="0" {{ old('sifat_disposisi') === '0' ? 'selected' : '' }}>
                                                Tindaklanjuti</option>
                                            <option value="1" {{ old('sifat_disposisi') === '1' ? 'selected' : '' }}>
                                                Biasa</option>
                                            <option value="2" {{ old('sifat_disposisi') == '2' ? 'selected' : '' }}>
                                                Segera</option>
                                            <option value="3" {{ old('sifat_disposisi') == '3' ? 'selected' : '' }}>
                                                Penting</option>
                                            <option value="4" {{ old('sifat_disposisi') == '4' ? 'selected' : '' }}>
                                                Rahasia</option>
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('sifat_disposisi')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="capitalize" for="status_disposisi">Pilih Status Disposisi: </label>
                                    <div class="input-group">
                                        <select class="filter select2 @error('status_disposisi') is-invalid  @enderror "
                                            id="status_disposisi" name="status_disposisi" style="width: 100%;">
                                            <option selected disabled>Pilih Status Disposisi</option>
                                            <option value="0" {{ old('status_disposisi') === '0' ? 'selected' : '' }}>
                                                Arsipkan</option>
                                            <option value="1" {{ old('status_disposisi') === '1' ? 'selected' : '' }}>
                                                Jabarkan</option>
                                            <option value="2" {{ old('status_disposisi') === '2' ? 'selected' : '' }}>
                                                Umumkan</option>
                                            <option value="3" {{ old('status_disposisi') === '3' ? 'selected' : '' }}>
                                                Laksanakan</option>
                                            <option value="4" {{ old('status_disposisi') === '4' ? 'selected' : '' }}>
                                                Persiapkan</option>
                                            <option value="5" {{ old('status_disposisi') === '5' ? 'selected' : '' }}>
                                                Ikuti</option>
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('status_disposisi')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <h6 class="text-primary text-center mb-4">Sortir berdasarkan Tanggal Disposisi
                                </h6>
                            </div>
                            <div class=" col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="tanggal_surat_awal">Dari Tanggal Awal Pembuatan
                                        Disposisi:
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-calendar3"></i>
                                            </div>
                                        </div>
                                        <input type="date"
                                            class="filter form-control tanggal_surat_awal @error('tanggal_surat_awal') is-invalid @enderror"
                                            placeholder="ex: 11/14/2023" value="{{ old('tanggal_surat_awal') }}"
                                            id="tanggal_surat_awal" name="tanggal_surat_awal" style="width: 80%;">
                                    </div>
                                    <span class="text-danger">
                                        @error('tanggal_surat_awal')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class=" col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="tanggal_surat_terakhir">Sampai Tanggal Terakhir
                                        Pembuatan
                                        Disposisi: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-calendar3"></i>
                                            </div>
                                        </div>
                                        <input type="date"
                                            class="form-control tanggal_surat_terakhir @error('tanggal_surat_terakhir') is-invalid @enderror"
                                            placeholder="ex: 11/14/2023" value="{{ old('tanggal_surat_terakhir') }}"
                                            id="tanggal_surat_terakhir" name="tanggal_surat_terakhir"
                                            style="width: 80%;">
                                    </div>
                                    <span class="text-danger">
                                        @error('tanggal_surat_terakhir')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mr-2 mb-1 " id="filtering" title="Filter">
                                <i class="bi bi-funnel mr-1 "></i><span class="bi-text mr-2">Filter Data</span></button>
                            <a type="button" id="reset" href="/disposisi" class="btn btn-secondary mb-1"
                                title="Reset">
                                <i class="bi bi-arrow-clockwise mr-1"></i><span class="bi-text mr-2">Reset
                                    Filter</span></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- end Filter by user --}}

        {{-- Filter all disposisi --}}
        <div class="card d-none" id="filter2">
            <div class="card-header d-flex justify-content-between">
                <div class="col">
                    <h4 class="text-primary">Filter</h4>
                </div>
                <div class="col d-flex justify-content-end">
                    {{-- Button Triger Filter --}}
                    <span data-toggle="tooltip" data-placement="top" title="Klik untuk menu filter data."
                        data-original-title="Filter Data" disabled>
                        <button class="btn btn-info collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"
                            title="Tombol Filter">
                            <i class="bi bi-funnel-fill"></i>
                        </button>
                    </span>
                    {{-- Akhir Button Triger Filter --}}
                </div>
            </div>
            <form action="/disposisi-filter-all" method="get">
                @csrf
                <div class="collapse" id="collapseExample" style="">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="id_user">Pilih Berdasarkan Pengirim: </label>
                                    <div class="input-group">
                                        <select class="filter select2 @error('id_user') is-invalid  @enderror "
                                            id="id_user" name="id_user" style="width: 100%;">
                                            <option selected disabled>Pilih Pengirim</option>
                                            @foreach ($userList as $data)
                                                <option value="{{ $data->id_user }}"
                                                    {{ old('id_user') == $data->id_user ? 'selected' : '' }}>
                                                    {{ $data->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('id_user')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="sifat_disposisi">Pilih Berdasarkan Sifat Disposisi:
                                    </label>
                                    <div class="input-group">
                                        <select class="filter select2 @error('sifat_disposisi') is-invalid  @enderror "
                                            id="sifat_disposisi" name="sifat_disposisi" style="width: 100%;">
                                            <option selected disabled>Pilih Sifat Disposisi</option>
                                            <option value="0" {{ old('sifat_disposisi') === '0' ? 'selected' : '' }}>
                                                Tindaklanjuti</option>
                                            <option value="1" {{ old('sifat_disposisi') === '1' ? 'selected' : '' }}>
                                                Biasa</option>
                                            <option value="2" {{ old('sifat_disposisi') == '2' ? 'selected' : '' }}>
                                                Segera</option>
                                            <option value="3" {{ old('sifat_disposisi') == '3' ? 'selected' : '' }}>
                                                Penting</option>
                                            <option value="4" {{ old('sifat_disposisi') == '4' ? 'selected' : '' }}>
                                                Rahasia</option>
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('sifat_disposisi')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="capitalize" for="status_disposisi">Pilih Status Disposisi: </label>
                                    <div class="input-group">
                                        <select class="filter select2 @error('status_disposisi') is-invalid  @enderror "
                                            id="status_disposisi" name="status_disposisi" style="width: 100%;">
                                            <option selected disabled>Pilih Status Disposisi</option>
                                            <option value="0"
                                                {{ old('status_disposisi') === '0' ? 'selected' : '' }}>
                                                Arsipkan</option>
                                            <option value="1"
                                                {{ old('status_disposisi') === '1' ? 'selected' : '' }}>
                                                Jabarkan</option>
                                            <option value="2"
                                                {{ old('status_disposisi') === '2' ? 'selected' : '' }}>
                                                Umumkan</option>
                                            <option value="3"
                                                {{ old('status_disposisi') === '3' ? 'selected' : '' }}>
                                                Laksanakan</option>
                                            <option value="4"
                                                {{ old('status_disposisi') === '4' ? 'selected' : '' }}>
                                                Persiapkan</option>
                                            <option value="5"
                                                {{ old('status_disposisi') === '5' ? 'selected' : '' }}>
                                                Ikuti</option>
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('status_disposisi')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center row">
                                <div class="col-12 d-flex justify-content-center text-primary">Pilih
                                    Salah
                                    Satu</div>
                                <div class="mt-2">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="jabatan" name="jenis_disposisi"
                                            class="custom-control-input jabatan" onclick="toggleSelects()" checked>
                                        <label class="custom-control-label" for="jabatan">
                                            Sesuai Jabatan</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="personal" name="jenis_disposisi"
                                            class="custom-control-input personal" onclick="toggleSelects()">
                                        <label class="custom-control-label" for="personal">
                                            Sesuai Personal</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-group id_posisi_jabatan_div" id="id_posisi_jabatan_div">
                                    <label class="capitalize" for="id_posisi_jabatan">Berdasarkan Tujuan Disposisi
                                        (Jabatan):
                                    </label>
                                    <div class="input-group">
                                        <select
                                            class="form-control select2 @error('id_posisi_jabatan') is-invalid  @enderror "
                                            id="id_posisi_jabatan" name="id_posisi_jabatan[]" multiple=""
                                            style="width: 100%">
                                            <option disabled>Pilih Posisi Jabatan User</option>
                                            @foreach ($posisiJabatanList as $item)
                                                <option value="{{ $item->id_posisi_jabatan }}"
                                                    {{ old('id_posisi_jabatan') == $item->id_posisi_jabatan ? 'selected' : '' }}>
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
                            <div class="col-12">
                                <div class="form-group id_user_div d-none" id="id_user_div">
                                    <label class="capitalize" for="id_user">Berdasarkan Tujuan Disposisi (Personal):
                                    </label>
                                    <div class="input-group">
                                        <select class="form-control select2  @error('id_user') is-invalid @enderror "
                                            id="id_user" name="id_penerima[]" multiple="" style="width: 100%;">
                                            <option disabled>Pilih Tujuan User</option>
                                            @foreach ($userList as $data)
                                                <option value="{{ $data->id_user }}"
                                                    {{ old('id_user') == $data->id_user ? 'selected' : '' }}>
                                                    {{ $data->nama }} |
                                                    {{ $data->posisiJabatan->nama_posisi_jabatan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('id_penerima')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <h6 class="text-primary text-center mb-4">Sortir berdasarkan Tanggal Disposisi
                                </h6>
                            </div>
                            <div class=" col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="tanggal_surat_awal">Dari Tanggal Awal Pembuatan
                                        Disposisi:
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-calendar3"></i>
                                            </div>
                                        </div>
                                        <input type="date"
                                            class="filter form-control tanggal_surat_awal @error('tanggal_surat_awal') is-invalid @enderror"
                                            placeholder="ex: 11/14/2023" value="{{ old('tanggal_surat_awal') }}"
                                            id="tanggal_surat_awal" name="tanggal_surat_awal" style="width: 80%;">
                                    </div>
                                    <span class="text-danger">
                                        @error('tanggal_surat_awal')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class=" col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="tanggal_surat_terakhir">Sampai Tanggal Terakhir
                                        Pembuatan
                                        Disposisi: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-calendar3"></i>
                                            </div>
                                        </div>
                                        <input type="date"
                                            class="form-control tanggal_surat_terakhir @error('tanggal_surat_terakhir') is-invalid @enderror"
                                            placeholder="ex: 11/14/2023" value="{{ old('tanggal_surat_terakhir') }}"
                                            id="tanggal_surat_terakhir" name="tanggal_surat_terakhir"
                                            style="width: 80%;">
                                    </div>
                                    <span class="text-danger">
                                        @error('tanggal_surat_terakhir')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mr-2 mb-1 " id="filtering" title="Filter">
                                <i class="bi bi-funnel mr-1 "></i><span class="bi-text mr-2">Filter Data</span></button>
                            <a type="button" id="reset" href="/disposisi" class="btn btn-secondary mb-1"
                                title="Reset">
                                <i class="bi bi-arrow-clockwise mr-1"></i><span class="bi-text mr-2">Reset
                                    Filter</span></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- end Filter all disposisi --}}

        @can('admin')
            {{-- Tab --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="col">
                        <ul class="nav nav-pills" id="myTab3" role="tablist">
                            <li class="nav-item w-50 text-center">
                                <a class="nav-link active" id="disposisi-user-login" data-toggle="tab"
                                    href="#disposisi-user" role="tab" aria-controls="belum-terdisposisikan"
                                    aria-selected="true"> <i class="bi bi-person text-success"></i> Disposisi Untuk anda
                                    <span
                                        class="badge badge-transparent-success">{{ $disposisiList1->filter(function ($item) {
                                                return $item->id_posisi_jabatan == Auth::user()->id_posisi_jabatan ||
                                                    $item->id_penerima == Auth::user()->id_user;
                                            })->count() }}</span></a>
                            </li>
                            <li class="nav-item w-50 text-center">
                                <a class="nav-link" id="semua-disposisi" data-toggle="tab" href="#semua-disposisi3"
                                    role="tab" aria-controls="semua-disposisi" aria-selected="false"> <i
                                        class="bi bi-patch-check text-success"></i> Semua data Disposisi<span
                                        class="badge badge-transparent-success">{{ $disposisiList->count() }}</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- Tab --}}
        @endcan

        <div class="section-body">
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <div class="col-lg-11 col-sm-8">
                            <h4 class="text-primary judul-page">List Disposisi @cannot('admin')
                                    Untuk {{ auth()->user()->nama }}
                                @endcannot
                            </h4>
                        </div>
                        @can('admin')
                            <div class="col-lg-1 col-sm-4 btn-group">
                                {{-- Button Tambah Data --}}
                                <a href="/disposisi/create" class="text-white">
                                    <button type="button" class="btn btn-primary" data-toggle="tooltip"
                                        data-placement="top" title="Tambah Data" data-original-title="Tambah Data">
                                        <i class="fa fa-plus-circle btn-tambah-data"></i>
                                    </button>
                                </a>
                                {{-- Akhir Button Tambah Data --}}
                                {{-- Button Export Data --}}
                                <a class="text-white ml-2 tombol-export">
                                    <button type="button" class="btn btn-success tombol-export" data-toggle="tooltip"
                                        data-placement="top" title="Export Data Excel" data-original-title="Export Data">
                                        <i class="fa fa-file-excel btn-tambah-data tombol-export"></i>
                                    </button>
                                </a>
                                {{-- Akhir Button Export Data --}}
                                {{-- Button import Data --}}
                                <span data-toggle="tooltip" data-placement="top" title="Import Data Excel"
                                    data-original-title="Import Data" disabled>
                                    <button type="button" class="btn btn-warning ml-2" data-toggle="modal"
                                        data-target="#importmodal" type="button" class="btn btn-warning text-white ml-2">
                                        <i class="fa fa-file-excel btn-tambah-data "></i>
                                    </button>
                                </span>
                                {{-- Akhir Button import Data --}}
                            </div>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end mb-3">
                                <form action="{{ route('search.disposisi') }}" method="get" id="searchForm">
                                    @csrf
                                    <div class="container-input">
                                        <input type="text" placeholder="Search" name="search" class="search"
                                            id="searchInput">
                                        <i class="bi bi-search-heart search-icon"></i>
                                        <div class="button-search">
                                            <button type="submit"
                                                class="btn btn-primary button-submit-search">Search</button>
                                            <a type="button" href="{{ route('disposisi.index') }}"
                                                class="btn btn-secondary rounded-pill button-reset-search"><span>Reset</span></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12">
                                @can('admin')
                                    {{-- Tab Content --}}
                                    <div class="tab-content" id="myTabContent2">
                                        <div class="tab-pane fade show active" id="disposisi-user" role="tabpanel"
                                            aria-labelledby="disposisi-user-login">
                                            <div class="row">
                                                @if ($disposisiList1->isEmpty())
                                                    <div class="d-flex justify-content-center align-content-center">
                                                        <img src="{{ asset('assets-landing-page/img/No data-rafiki.png') }}"
                                                            class="w-50">
                                                    </div>
                                                @else
                                                    @foreach ($disposisiList1->filter(function ($item) {
                return $item->id_posisi_jabatan == Auth::user()->id_posisi_jabatan || $item->id_penerima == Auth::user()->id_user;
            }) as $data)
                                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                                            <div class="card card-primary card-surat shadow-sm">
                                                                <div class="card-header d-flex justify-content-between">
                                                                    <div class="position-relative">
                                                                        <h4>{{ $data->pengajuan->nomor_agenda }}</h4>
                                                                        <small class="text-primary"
                                                                            style="position: absolute; top: 50%;width: max-content;">Dari
                                                                            {{ $data->user->nama }}
                                                                        </small>
                                                                    </div>
                                                                    <div class="card-header-action btn-group">
                                                                        {{-- Sifat Disposisi BTN --}}
                                                                        <button
                                                                            class="btn-primary btn-status-disposisi tombol-disposisi "
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Status Disposisi - {{ $data->status_disposisi }}"
                                                                            data-original-title="Status Disposisi - {{ $data->status_disposisi }}">
                                                                            <span class="d-flex justify-content-center m-0">
                                                                                {{ $data->status_disposisi }}
                                                                            </span>
                                                                        </button>
                                                                        {{-- End Status Disposisi BTN --}}
                                                                        {{-- Sifat Disposisi BTN --}}
                                                                        <button
                                                                            class="btn-primary btn-sifat-disposisi tombol-disposisi"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Sifat Disposisi - {{ $data->sifat_disposisi }}"
                                                                            data-original-title="Sifat Disposisi - {{ $data->sifat_disposisi }}">
                                                                            <span class="d-flex justify-content-center m-0">
                                                                                {{ $data->sifat_disposisi }}
                                                                            </span>
                                                                        </button>
                                                                        {{-- End Sifat Disposisi BTN --}}
                                                                        <a data-collapse="#mycard-collapse{{ $data->id_disposisi }}"
                                                                            class="btn-icon btn-primary btn-collapse"
                                                                            href="#"><i class="fas fa-minus"
                                                                                style="margin-left: 10px"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="collapse show"
                                                                    id="mycard-collapse{{ $data->id_disposisi }}">
                                                                    <div class="card-body card-body-surat position-relative "
                                                                        style="min-height: 130px">
                                                                        <p class="w-75"> {!! $data->catatan_disposisi !!}</p>
                                                                        <p class="mt-3" style="font-size: .7rem;">
                                                                            --
                                                                            {{ date('d-F-Y', strtotime($data->tanggal_disposisi)) }}
                                                                            --</p>
                                                                        @can('admin')
                                                                            <div class="d-flex flex-column btn-group-action">
                                                                                <a href="{{ route('disposisi.show', Crypt::encryptString($data->id_disposisi)) }}"
                                                                                    data-toggle="tooltip" data-placement="top"
                                                                                    title="Detail data disposisi "
                                                                                    data-original-title="Detail data disposisi "
                                                                                    class="btn btn-info has-icon text-white tombol-detail-card"
                                                                                    href=""><i class="pl-1 bi bi-eye"></i>
                                                                                </a>
                                                                                <a type="button" data-toggle="tooltip"
                                                                                    data-placement="left"
                                                                                    title="Edit data disposisi"
                                                                                    data-original-title="Edit data disposisi"
                                                                                    class="btn btn-warning has-icon text-white tombol-edit-card"
                                                                                    href="{{ route('disposisi.edit', Crypt::encryptString($data->id_disposisi)) }}"><i
                                                                                        class="pl-1  bi bi-pencil-square "></i>
                                                                                </a>
                                                                                <form method="POST"
                                                                                    action="{{ route('disposisi.destroy', Crypt::encryptString($data->id_disposisi)) }}"
                                                                                    class="tombol-hapus">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="button" data-toggle="tooltip"
                                                                                        data-placement="bottom"
                                                                                        title="Hapus data Disposisi"
                                                                                        data-original-title="Hapus data Disposisi"
                                                                                        class="btn btn-danger has-icon text-white tombol-hapus-card tombol-hapus"
                                                                                        href=""><i
                                                                                            class="pl-1  bi bi-trash tombol-hapus"></i>
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        @endcan
                                                                        @can('officer')
                                                                            <a href="{{ route('disposisi.show', Crypt::encryptString($data->id_disposisi)) }}"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title="Detail data disposisi "
                                                                                data-original-title="Detail data disposisi "
                                                                                class="btn btn-info has-icon text-white "
                                                                                href=""><i class="pl-1 bi bi-eye"></i>
                                                                            </a>
                                                                        @endcan
                                                                    </div>
                                                                    <div
                                                                        class="card-footer  d-flex justify-content-between position-relative">
                                                                        <div class="d-flex flex-row ">
                                                                            @if ($data->user->foto_user)
                                                                                <img alt="image"
                                                                                    src="{{ asset('image_save/' . $data->user->foto_user) }}"
                                                                                    style="max-width: 45px;max-height: 45px; border-radius: 50%;aspect-ratio: 1/1"
                                                                                    class="mr-2 border border-primary">
                                                                            @else
                                                                                <img alt="image"
                                                                                    src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                                                                    style="max-width: 45px;max-height: 45px; border-radius: 50%;aspect-ratio: 1/1"
                                                                                    class="mr-2">
                                                                            @endif
                                                                            <div>
                                                                                <div class="user-detail-name">
                                                                                    <span class="text-primary" href="#">
                                                                                        {{ $data->user->nama }}</span>
                                                                                </div>
                                                                                <div class="text-job">
                                                                                    <small style="max-width: max-content">
                                                                                        {{ currencyPhone($data->user->nomor_telpon) }}
                                                                                    </small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-center " style="margin-left: 15%;">
                                                                            <a type="button"
                                                                                class="btn btn-danger btn-scan-pdf"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title="Preview surat (PDF)"
                                                                                data-original-title="Preview surat (PDF)"
                                                                                href="{{ asset('document_save/' . $data->pengajuan->surat->scan_dokumen) }}"
                                                                                target="_blank" title="Read PDF"><i
                                                                                    class="bi bi-file-pdf"
                                                                                    style="font-size: 1.1rem;"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                {{ $disposisiList1->onEachSide(1)->links() }}
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="semua-disposisi3" role="tabpanel"
                                            aria-labelledby="semua-disposisi">
                                            <div class="row">
                                                @if ($disposisiList->isEmpty())
                                                    <div class="d-flex justify-content-center align-content-center">
                                                        <img src="{{ asset('assets-landing-page/img/No data-rafiki.png') }}"
                                                            class="w-50">
                                                    </div>
                                                @else
                                                    @foreach ($disposisiList as $data)
                                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                                            <div class="card card-primary card-surat shadow-sm">
                                                                <div class="card-header d-flex justify-content-between">
                                                                    <div class="position-relative">
                                                                        <h4>{{ $data->pengajuan->nomor_agenda }}</h4>
                                                                        <small class="text-primary"
                                                                            style="position: absolute; top: 50%;width: max-content;">Dari
                                                                            {{ $data->user->nama }}
                                                                        </small>
                                                                    </div>
                                                                    <div class="card-header-action btn-group">
                                                                        {{-- Sifat Disposisi BTN --}}
                                                                        <button
                                                                            class="btn-primary btn-status-disposisi tombol-disposisi "
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Status Disposisi - {{ $data->status_disposisi }}"
                                                                            data-original-title="Status Disposisi - {{ $data->status_disposisi }}">
                                                                            <span class="d-flex justify-content-center m-0">
                                                                                {{ $data->status_disposisi }}
                                                                            </span>
                                                                        </button>
                                                                        {{-- End Status Disposisi BTN --}}
                                                                        {{-- Sifat Disposisi BTN --}}
                                                                        <button
                                                                            class="btn-primary btn-sifat-disposisi tombol-disposisi"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Sifat Disposisi - {{ $data->sifat_disposisi }}"
                                                                            data-original-title="Sifat Disposisi - {{ $data->sifat_disposisi }}">
                                                                            <span class="d-flex justify-content-center m-0">
                                                                                {{ $data->sifat_disposisi }}
                                                                            </span>
                                                                        </button>
                                                                        {{-- End Sifat Disposisi BTN --}}
                                                                        <a data-collapse="#mycard-collapse{{ $data->id_disposisi }}"
                                                                            class="btn-icon btn-primary btn-collapse"
                                                                            href="#"><i class="fas fa-minus"
                                                                                style="margin-left: 10px"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="collapse show"
                                                                    id="mycard-collapse{{ $data->id_disposisi }}">
                                                                    <div class="card-body card-body-surat position-relative "
                                                                        style="min-height: 130px">
                                                                        <p class="w-75"> {!! $data->catatan_disposisi !!}</p>
                                                                        <p class="mt-3" style="font-size: .7rem;">
                                                                            --
                                                                            {{ date('d-F-Y', strtotime($data->tanggal_disposisi)) }}
                                                                            --</p>
                                                                        @can('admin')
                                                                            <div class="d-flex flex-column btn-group-action">
                                                                                <a href="{{ route('disposisi.show', Crypt::encryptString($data->id_disposisi)) }}"
                                                                                    data-toggle="tooltip" data-placement="top"
                                                                                    title="Detail data disposisi "
                                                                                    data-original-title="Detail data disposisi "
                                                                                    class="btn btn-info has-icon text-white tombol-detail-card"
                                                                                    href=""><i class="pl-1 bi bi-eye"></i>
                                                                                </a>
                                                                                <a type="button" data-toggle="tooltip"
                                                                                    data-placement="left"
                                                                                    title="Edit data disposisi"
                                                                                    data-original-title="Edit data disposisi"
                                                                                    class="btn btn-warning has-icon text-white tombol-edit-card"
                                                                                    href="{{ route('disposisi.edit', Crypt::encryptString($data->id_disposisi)) }}"><i
                                                                                        class="pl-1  bi bi-pencil-square "></i>
                                                                                </a>
                                                                                <form method="POST"
                                                                                    action="{{ route('disposisi.destroy', Crypt::encryptString($data->id_disposisi)) }}"
                                                                                    class="tombol-hapus">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="button" data-toggle="tooltip"
                                                                                        data-placement="bottom"
                                                                                        title="Hapus data Disposisi"
                                                                                        data-original-title="Hapus data Disposisi"
                                                                                        class="btn btn-danger has-icon text-white tombol-hapus-card tombol-hapus"
                                                                                        href=""><i
                                                                                            class="pl-1  bi bi-trash tombol-hapus"></i>
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        @endcan
                                                                        @can('officer')
                                                                            <a href="{{ route('disposisi.show', Crypt::encryptString($data->id_disposisi)) }}"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title="Detail data disposisi "
                                                                                data-original-title="Detail data disposisi "
                                                                                class="btn btn-info has-icon text-white "
                                                                                href=""><i class="pl-1 bi bi-eye"></i>
                                                                            </a>
                                                                        @endcan
                                                                    </div>
                                                                    <div
                                                                        class="card-footer  d-flex justify-content-between position-relative">
                                                                        <div class="d-flex flex-row ">
                                                                            @if ($data->user->foto_user)
                                                                                <img alt="image"
                                                                                    src="{{ asset('image_save/' . $data->user->foto_user) }}"
                                                                                    style="max-width: 45px;max-height: 45px; border-radius: 50%;aspect-ratio: 1/1"
                                                                                    class="mr-2 border border-primary">
                                                                            @else
                                                                                <img alt="image"
                                                                                    src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                                                                    style="max-width: 45px;max-height: 45px; border-radius: 50%;aspect-ratio: 1/1"
                                                                                    class="mr-2">
                                                                            @endif
                                                                            <div>
                                                                                <div class="user-detail-name">
                                                                                    <span class="text-primary" href="#">
                                                                                        {{ $data->user->nama }}</span>
                                                                                </div>
                                                                                <div class="text-job">
                                                                                    <small style="max-width: max-content">
                                                                                        {{ currencyPhone($data->user->nomor_telpon) }}
                                                                                    </small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-center " style="margin-left: 15%;">
                                                                            <a type="button"
                                                                                class="btn btn-danger btn-scan-pdf"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title="Preview surat (PDF)"
                                                                                data-original-title="Preview surat (PDF)"
                                                                                href="{{ asset('document_save/' . $data->pengajuan->surat->scan_dokumen) }}"
                                                                                target="_blank" title="Read PDF"><i
                                                                                    class="bi bi-file-pdf"
                                                                                    style="font-size: 1.1rem;"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                {{ $disposisiList->onEachSide(1)->links() }}
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End tap content --}}
                                @endcan
                                @cannot('admin')
                                    <div class="row">
                                        @if ($disposisiList->isEmpty())
                                            <div class="d-flex justify-content-center align-content-center">
                                                <img src="{{ asset('assets-landing-page/img/No data-rafiki.png') }}"
                                                    class="w-50">
                                            </div>
                                        @else
                                            @foreach ($disposisiList as $data)
                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                    <div class="card card-primary card-surat shadow-sm">
                                                        <div class="card-header d-flex justify-content-between">
                                                            <div class="position-relative">
                                                                <h4>{{ $data->pengajuan->nomor_agenda }}</h4>
                                                                <small class="text-primary"
                                                                    style="position: absolute; top: 50%;width: max-content;">Dari
                                                                    {{ $data->user->nama }}
                                                                </small>
                                                            </div>
                                                            <div class="card-header-action btn-group">
                                                                {{-- Sifat Disposisi BTN --}}
                                                                <button
                                                                    class="btn-primary btn-status-disposisi tombol-disposisi "
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Status Disposisi - {{ $data->status_disposisi }}"
                                                                    data-original-title="Status Disposisi - {{ $data->status_disposisi }}">
                                                                    <span class="d-flex justify-content-center m-0">
                                                                        {{ $data->status_disposisi }}
                                                                    </span>
                                                                </button>
                                                                {{-- End Status Disposisi BTN --}}
                                                                {{-- Sifat Disposisi BTN --}}
                                                                <button
                                                                    class="btn-primary btn-sifat-disposisi tombol-disposisi"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Sifat Disposisi - {{ $data->sifat_disposisi }}"
                                                                    data-original-title="Sifat Disposisi - {{ $data->sifat_disposisi }}">
                                                                    <span class="d-flex justify-content-center m-0">
                                                                        {{ $data->sifat_disposisi }}
                                                                    </span>
                                                                </button>
                                                                {{-- End Sifat Disposisi BTN --}}
                                                                <a data-collapse="#mycard-collapse{{ $data->id_disposisi }}"
                                                                    class="btn-icon btn-primary btn-collapse"
                                                                    href="#"><i class="fas fa-minus"
                                                                        style="margin-left: 10px"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="collapse show"
                                                            id="mycard-collapse{{ $data->id_disposisi }}">
                                                            <div class="card-body card-body-surat position-relative "
                                                                style="min-height: 130px">
                                                                <p class="w-75"> {!! $data->catatan_disposisi !!}</p>
                                                                <p class="mt-3" style="font-size: .7rem;">
                                                                    --
                                                                    {{ date('d-F-Y', strtotime($data->tanggal_disposisi)) }}
                                                                    --</p>
                                                                @can('admin')
                                                                    <div class="d-flex flex-column btn-group-action">
                                                                        <a href="{{ route('disposisi.show', Crypt::encryptString($data->id_disposisi)) }}"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Detail data disposisi "
                                                                            data-original-title="Detail data disposisi "
                                                                            class="btn btn-info has-icon text-white tombol-detail-card"
                                                                            href=""><i class="pl-1 bi bi-eye"></i>
                                                                        </a>
                                                                        <a type="button" data-toggle="tooltip"
                                                                            data-placement="left" title="Edit data disposisi"
                                                                            data-original-title="Edit data disposisi"
                                                                            class="btn btn-warning has-icon text-white tombol-edit-card"
                                                                            href="{{ route('disposisi.edit', Crypt::encryptString($data->id_disposisi)) }}"><i
                                                                                class="pl-1  bi bi-pencil-square "></i>
                                                                        </a>
                                                                        <form method="POST"
                                                                            action="{{ route('disposisi.destroy', Crypt::encryptString($data->id_disposisi)) }}"
                                                                            class="tombol-hapus">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="button" data-toggle="tooltip"
                                                                                data-placement="bottom"
                                                                                title="Hapus data Disposisi"
                                                                                data-original-title="Hapus data Disposisi"
                                                                                class="btn btn-danger has-icon text-white tombol-hapus-card tombol-hapus"
                                                                                href=""><i
                                                                                    class="bi bi-trash tombol-hapus"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                @endcan
                                                                @can('officer')
                                                                    <a href="{{ route('disposisi.show', Crypt::encryptString($data->id_disposisi)) }}"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Detail data disposisi "
                                                                        data-original-title="Detail data disposisi "
                                                                        class="btn btn-info has-icon text-white "
                                                                        href=""><i class="mr-1 bi bi-eye"></i>Detail
                                                                        Data
                                                                    </a>
                                                                @endcan
                                                            </div>
                                                            <div
                                                                class="card-footer  d-flex justify-content-between position-relative">
                                                                <div class="d-flex flex-row ">
                                                                    @if ($data->user->foto_user)
                                                                        <img alt="image"
                                                                            src="{{ asset('image_save/' . $data->user->foto_user) }}"
                                                                            style="max-width: 45px;max-height: 45px; border-radius: 50%;aspect-ratio: 1/1"
                                                                            class="mr-2 border border-primary">
                                                                    @else
                                                                        <img alt="image"
                                                                            src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                                                            style="max-width: 45px;max-height: 45px; border-radius: 50%;aspect-ratio: 1/1"
                                                                            class="mr-2">
                                                                    @endif
                                                                    <div>
                                                                        <div class="user-detail-name">
                                                                            <span class="text-primary" href="#">
                                                                                {{ $data->user->nama }}</span>
                                                                        </div>
                                                                        <div class="text-job">
                                                                            <small style="max-width: max-content">
                                                                                {{ currencyPhone($data->user->nomor_telpon) }}
                                                                            </small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="text-center " style="margin-left: 15%;">
                                                                    <a type="button" class="btn btn-danger btn-scan-pdf"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Preview surat (PDF)"
                                                                        data-original-title="Preview surat (PDF)"
                                                                        href="{{ asset('document_save/' . $data->pengajuan->surat->scan_dokumen) }}"
                                                                        target="_blank" title="Read PDF"><i
                                                                            class="bi bi-file-pdf"
                                                                            style="font-size: 1.1rem;"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="col-12">
                                                {{ $disposisiList->onEachSide(1)->links() }}
                                            </div>
                                        @endif
                                    </div>
                                @endcannot
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Import -->
    <div class="modal fade" id="importmodal" aria-labelledby="importmodalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importmodalLabel">Import Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.import') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body py-4 px-4 mt-3 border border-1">
                        <span class="d-block">Unduh Template Import Admin: </span>
                        <a href="/file/Book1.xlsx" class="btn btn-1 px-4 mb-4 mt-1 w-100" type="button"
                            download="Admin-template-import">
                            <span>Template Import Admin</span> <i
                                class="bi bi-file-earmark-excel-fill icon-btn-1 ms-2"></i></a>
                        @csrf
                        <div class="form-group">
                            <label for="import">Masukkan file Yang Ingin di-import: </label>
                            <small class="d-block">Catatan: masukkan file dengan format (XLSX), maksimal 10
                                MB.</small>
                            <input type="file" class="file-filepond-preview @error('file') is-invalid @enderror"
                                id="import" name="file" accept=".xlsx">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-danger"data-dismiss="modal" aria-label="Close">Close <i
                                class="bi bi-x-circle ml-3"></i></button>
                        <button type="submit" value="Import" class="btn btn-primary text-white">
                            Click untuk
                            import <i class="bi bi-clipboard-check-fill ml-3"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal Import --}}
@endsection
@section('script')
    {{-- modules --}}
    <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>x
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/js/filepond.js') }}"></script>

    {{-- handle radio input --}}
    <script>
        function toggleSelects() {
            const jabatanChecked = document.getElementById('jabatan').checked;
            const personalChecked = document.getElementById('personal').checked;

            const posisiJabatanDiv = document.getElementById('id_posisi_jabatan_div');
            const idUserDiv = document.getElementById('id_user_div');

            if (jabatanChecked) {
                posisiJabatanDiv.classList.remove('d-none');
                idUserDiv.classList.add('d-none');
            } else if (personalChecked) {
                posisiJabatanDiv.classList.add('d-none');
                idUserDiv.classList.remove('d-none');
            }
        }
    </script>
    {{-- Handle Filter disposisi --}}
    <script>
        const disposisiUserLogin = document.getElementById('disposisi-user-login');
        const semuaDisposisi = document.getElementById('semua-disposisi');

        const filter1 = document.getElementById('filter1');
        const filter2 = document.getElementById('filter2');



        disposisiUserLogin.addEventListener("click", function(event) {
            const element = event.target;

            filter1.classList.remove('d-none');
            filter2.classList.add('d-none');
            filter2.classList.remove('d-block');
            filter1.classList.add('d-block');

        })

        semuaDisposisi.addEventListener("click", function(event) {
            const element = event.target;

            filter2.classList.remove('d-none');
            filter2.classList.add('d-block');
            filter1.classList.remove('d-block');
            filter1.classList.add('d-none');
        })
    </script>


    <script>
        $(document).ready(function() {
            // Initial form action
            var initialAction = "{{ route('search.disposisi') }}";
            $('#searchForm').attr('action', initialAction);

            // Update form action when a tab is clicked
            $('#myTab3 a').on('click', function(e) {
                e.preventDefault();

                // Get the tab id
                var tabId = $(this).attr('href').substring(1);

                // Define the route for each tab
                var routes = {
                    'disposisi-user': "{{ route('search.disposisi') }}", // Replace with your actual route
                    'semua-disposisi3': "{{ route('search.semua.disposisi') }}" // Replace with your actual route
                    // Add more routes as needed
                };

                // Update form action based on the selected tab
                $('#searchForm').attr('action', routes[tabId]);

            });
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

    @if ($errors->has('file'))
        <script>
            $(document).ready(function() {
                iziToast.error({
                    title: 'Error',
                    message: "{!! implode('', $errors->all('<div>:message</div>')) !!}",
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
    {{-- seweetalert confirmation --}}

    <script>
        document.body.addEventListener("click", function(event) {
            const element = event.target;

            if (element.classList.contains("tombol-hapus")) {
                swal({
                        title: 'Apakah anda yakin?',
                        text: 'Ingin menghapus data Disposisi ini!',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal('Data Disposisi berhasil dihapus!', {
                                icon: 'success',
                            });
                            element.closest('form').submit();
                        } else {
                            swal('Data Disposisi tidak jadi dihapus!');
                        }
                    });
            }

            if (element.classList.contains("tombol-export")) {
                swal({
                        title: 'Apakah anda yakin?',
                        text: 'Ingin export data Disposisi ini?',
                        icon: 'info', // Change the icon to a question mark
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willExport) => {
                        if (willExport) {
                            swal('Data Disposisi berhasil diexport!', {
                                icon: 'success',
                            });

                            // Make an AJAX request to trigger the export
                            fetch('{{ route('disposisi.export') }}', {
                                    method: 'GET',
                                })
                                .then(response => {
                                    // Handle the response here (e.g., trigger the export)
                                    if (response.ok) {
                                        // You can trigger the export here
                                        // For example, you can open the exported file in a new tab
                                        window.open(response.url);
                                    }
                                })
                                .catch(error => {
                                    // Handle any errors here
                                    console.error('Error:', error);
                                });
                        } else {
                            swal('Data Disposisi tidak jadi diexport!');
                        }
                    });
            }
        })
    </script>
@endsection
