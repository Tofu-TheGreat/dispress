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
                    <div class="col-md-8 col-sm-7">
                        <h4 class="text-dark judul-page">Manajemen Surat</h4>
                    </div>
                    {{-- Akhir judul Page --}}
                    {{-- Breadcrumb --}}
                    <div class="col-md-4 col-sm-5 text-center items-center mt-2 ">
                        <div class="breadcrumb-item d-inline active"><a href="/dashboard">Dashboard</a></div>
                        <div class="breadcrumb-item d-inline">Pengajuan Disposisi</div>
                    </div>
                    {{-- Akhir Breadcrumb --}}
                </div>
            </div>
        </div>

        {{-- Filter --}}
        <div class="card">
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
            <form action="/pengajuan-filter" method="get">
                @csrf
                <div class="collapse" id="collapseExample" style="">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group ">
                                    <label for="id_klasifikasi">Pilih Berdasarkan Nomor Klasifikasi: </label>
                                    <div class="input-group">
                                        <select
                                            class="filter form-control select2  @error('id_klasifikasi') is-invalid @enderror "
                                            id="id_klasifikasi" name="id_klasifikasi" style="width: 100%;" required>
                                            <option selected disabled>Pilih Nomor Klasifikasi</option>
                                            @foreach ($klasifikasiList as $data)
                                                <option value="{{ $data->id_klasifikasi }}"
                                                    {{ old('id_klasifikasi') == $data->id_klasifikasi ? 'selected' : '' }}>
                                                    {{ $data->nomor_klasifikasi }} | {{ $data->nama_klasifikasi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('id_klasifikasi')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="id_user">Pilih Berdasarkan Pengirim: </label>
                                    <div class="input-group">
                                        <select class="filter select2 @error('id_user') is-invalid  @enderror "
                                            id="id_user" name="id_user" style="width: 100%;">
                                            <option selected disabled>Pilih Penerima</option>
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
                                    <label class="capitalize" for="tujuan_pengajuan">Pilih Berdasarkan Tujuan Pengajuan:
                                    </label>
                                    <div class="input-group">
                                        <select class="filter select2 @error('tujuan_pengajuan') is-invalid  @enderror "
                                            id="tujuan_pengajuan" name="tujuan_pengajuan" style="width: 100%;">
                                            <option selected disabled>Pilih Tujuan Pengajuan</option>
                                            <option value="0" {{ old('tujuan_pengajuan') === '0' ? 'selected' : '' }}>
                                                Kepala Sekolah</option>
                                            <option value="1" {{ old('tujuan_pengajuan') === '1' ? 'selected' : '' }}>
                                                Wakil Kepala Sekolah</option>
                                            <option value="2" {{ old('tujuan_pengajuan') == '2' ? 'selected' : '' }}>
                                                Kurikulum</option>
                                            <option value="3" {{ old('tujuan_pengajuan') == '3' ? 'selected' : '' }}>
                                                Kesiswaan</option>
                                            <option value="4" {{ old('tujuan_pengajuan') == '4' ? 'selected' : '' }}>
                                                Sarana Prasarana</option>
                                            <option value="5" {{ old('tujuan_pengajuan') == '5' ? 'selected' : '' }}>
                                                Kepala Jurusan</option>
                                            <option value="6" {{ old('tujuan_pengajuan') == '6' ? 'selected' : '' }}>
                                                Hubin</option>
                                            <option value="7" {{ old('tujuan_pengajuan') == '7' ? 'selected' : '' }}>
                                                Bimbingan Konseling</option>
                                            <option value="8" {{ old('tujuan_pengajuan') == '8' ? 'selected' : '' }}>
                                                Guru Umum</option>
                                            <option value="9" {{ old('tujuan_pengajuan') == '9' ? 'selected' : '' }}>
                                                Tata Usaha</option>
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('tujuan_pengajuan')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <h6 class="text-primary text-center mb-4">Sortir berdasarkan Tanggal Pengajuan Disposisi
                                </h6>
                            </div>
                            <div class=" col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="tanggal_pengajuan_awal">Dari Tanggal Awal Pengajuan
                                        Disposisi:
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-calendar3"></i>
                                            </div>
                                        </div>
                                        <input type="date"
                                            class="filter form-control tanggal_pengajuan_awal @error('tanggal_pengajuan_awal') is-invalid @enderror"
                                            placeholder="ex: 11/14/2023" value="{{ old('tanggal_pengajuan_awal') }}"
                                            id="tanggal_pengajuan_awal" name="tanggal_pengajuan_awal" style="width: 80%;">
                                    </div>
                                    <span class="text-danger">
                                        @error('tanggal_pengajuan_awal')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class=" col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="tanggal_pengajuan_terakhir">Sampai Tanggal Terakhir
                                        Pengajuan Disposisi: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-calendar3"></i>
                                            </div>
                                        </div>
                                        <input type="date"
                                            class="form-control tanggal_pengajuan_terakhir @error('tanggal_pengajuan_terakhir') is-invalid @enderror"
                                            placeholder="ex: 11/14/2023" value="{{ old('tanggal_pengajuan_terakhir') }}"
                                            id="tanggal_pengajuan_terakhir" name="tanggal_pengajuan_terakhir"
                                            style="width: 80%;">
                                    </div>
                                    <span class="text-danger">
                                        @error('tanggal_pengajuan_terakhir')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mr-2 mb-1 " id="filtering" title="Filter">
                                <i class="bi bi-funnel mr-1 "></i><span class="bi-text mr-2">Filter Data</span></button>
                            <a type="button" id="reset" href="{{ route('pengajuan-disposisi.index') }}"
                                class="btn btn-secondary mb-1" title="Reset">
                                <i class="bi bi-arrow-clockwise mr-1"></i><span class="bi-text mr-2">Reset
                                    Filter</span></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- Filter --}}

        {{-- Tab --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="col">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item w-50 text-center">
                            <a class="nav-link active" id="belum-terdisposisikan-tab3" data-toggle="tab"
                                href="#belum-terdisposisikan3" role="tab" aria-controls="belum-terdisposisikan"
                                aria-selected="true"> <i class="bi bi-patch-minus text-danger"></i> Belum
                                Didisposisikan
                                <span class="badge badge-transparent-danger">{{ $pengajuanList0->count() }}</span></a>
                        </li>
                        <li class="nav-item w-50 text-center">
                            <a class="nav-link" id="terdisposisikan-tab3" data-toggle="tab" href="#terdisposisikan3"
                                role="tab" aria-controls="terdisposisikan" aria-selected="false"> <i
                                    class="bi bi-patch-check text-success"></i> Sudah
                                Didisposisikan<span
                                    class="badge badge-transparent-success">{{ $pengajuanList1->count() }}</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Tab --}}

        <div class="section-body">
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <div class="col-lg-11 col-sm-8">
                            <h4 class="text-primary judul-page">List Pengajuan Disposisi</h4>
                        </div>
                        <div class="col-lg-1 col-sm-4 btn-group">
                            {{-- Button Tambah Data --}}
                            <a href="/pengajuan-disposisi/create" class="text-white">
                                <button type="button" class="btn btn-primary" data-toggle="tooltip"
                                    data-placement="top" title="Tambah Data" data-original-title="Tambah Data">
                                    <i class="fa fa-plus-circle btn-tambah-data"></i>
                                </button>
                            </a>
                            {{-- Akhir Button Tambah Data --}}
                            {{-- Button Export Data --}}
                            <a href="{{ route('pengajuan.export') }}" class="text-white ml-2 tombol-export">
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
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end mb-3">
                                <form action="{{ route('search.pengajuan') }}" method="post">
                                    @csrf
                                    <div class="container-input">
                                        <input type="text" placeholder="Search" name="search" class="search"
                                            id="searchInput">
                                        <i class="bi bi-search-heart search-icon"></i>
                                        <div class="button-search">
                                            <button type="submit"
                                                class="btn btn-primary button-submit-search">Search</button>
                                            <a type="button" href="{{ route('pengajuan-disposisi.index') }}"
                                                class="btn btn-secondary rounded-pill button-reset-search"><span>Reset</span></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12">
                                {{-- Tab Content --}}
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="belum-terdisposisikan3" role="tabpanel"
                                        aria-labelledby="belum-terdisposisikan-tab3">
                                        <div class="row">
                                            @if ($pengajuanList0->isEmpty())
                                                <div class="d-flex justify-content-center align-content-center">
                                                    <img src="{{ asset('assets-landing-page/img/No data-rafiki.png') }}"
                                                        class="w-50">
                                                </div>
                                            @else
                                                @foreach ($pengajuanList0 as $data)
                                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                                        <div class="card card-primary card-surat shadow-sm">
                                                            <div class="card-header d-flex justify-content-between">
                                                                <div class="position-relative">
                                                                    <h4>{{ $data->surat->nomor_surat }}</h4>
                                                                    <small class="text-primary"
                                                                        style="position: absolute; top: 50%;width: max-content;">Dari
                                                                        {{ $data->user->nama }}
                                                                    </small>
                                                                </div>
                                                                <div class="card-header-action btn-group">
                                                                    @if ($data->status_pengajuan == '0')
                                                                        <button
                                                                            class="btn btn-danger tombol-disposisi mr-2"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Belum Didisposisikan"
                                                                            data-original-title="Belum Didisposisikan"
                                                                            disabled>
                                                                            <span
                                                                                class="d-flex justify-content-center m-0"><i
                                                                                    class="bi bi bi-patch-minus"></i></span>
                                                                        </button>
                                                                    @elseif ($data->status_pengajuan == '1')
                                                                        <button
                                                                            class="btn btn-success tombol-disposisi mr-2"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Sudah Didisposisikan"
                                                                            data-original-title="Sudah Didisposisikan"
                                                                            disabled>
                                                                            <span
                                                                                class="d-flex justify-content-center m-0"><i
                                                                                    class="bi bi bi-patch-check"></i></span>
                                                                        </button>
                                                                    @endif
                                                                    <a data-collapse="#mycard-collapse{{ $data->id_pengajuan }}"
                                                                        class="btn btn-icon btn-info" href="#"><i
                                                                            class="fas fa-minus"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="collapse show"
                                                                id="mycard-collapse{{ $data->id_pengajuan }}">
                                                                <div class="card-body card-body-surat position-relative "
                                                                    style="min-height: 130px">
                                                                    <p class="w-75"> {!! $data->catatan_pengajuan !!}</p>
                                                                    <p class="mt-3" style="font-size: .7rem;">
                                                                        --
                                                                        {{ date('d-F-Y', strtotime($data->tanggal_terima)) }}
                                                                        --</p>
                                                                    @can('admin')
                                                                        <div class="mt-1 mb-1 tombol-disposisi">
                                                                            <span class="tombol-disposisi"
                                                                                data-toggle="tooltip" data-placement="right"
                                                                                title="klik Untuk Mendisposisikan"
                                                                                data-original-title="klik Untuk Mendisposisikan"
                                                                                disabled>
                                                                                <button type="button"
                                                                                    class="btn btn-success mr-2 tombol-disposisi"
                                                                                    data-toggle="modal"
                                                                                    data-target="#disposisi-modal{{ $data->id_pengajuan }}"
                                                                                    type="button">
                                                                                    Disposisi
                                                                                </button>
                                                                            </span>
                                                                        </div>
                                                                    @endcan
                                                                    <div class="d-flex flex-column btn-group-action">
                                                                        <a href="{{ route('pengajuan-disposisi.show', Crypt::encryptString($data->id_pengajuan)) }}"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Detail data pengajuan disposisi"
                                                                            data-original-title="Detail data pengajuan disposisi"
                                                                            class="btn btn-info has-icon text-white tombol-detail-card"
                                                                            href=""><i class="pl-1 bi bi-eye"></i>
                                                                        </a>
                                                                        <a type="button" data-toggle="tooltip"
                                                                            data-placement="left"
                                                                            title="Edit data disposisi"
                                                                            data-original-title="Edit data disposisi"
                                                                            class="btn btn-warning has-icon text-white tombol-edit-card"
                                                                            href="{{ route('pengajuan-disposisi.edit', Crypt::encryptString($data->id_pengajuan)) }}"><i
                                                                                class="pl-1  bi bi-pencil-square "></i>
                                                                        </a>
                                                                        <form method="POST"
                                                                            action="{{ route('pengajuan-disposisi.destroy', Crypt::encryptString($data->id_pengajuan)) }}"
                                                                            class="tombol-hapus">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="button" data-toggle="tooltip"
                                                                                data-placement="bottom"
                                                                                title="Hapus data Pengajuan"
                                                                                data-original-title="Hapus data Pengajuan"
                                                                                class="btn btn-danger has-icon text-white tombol-hapus-card tombol-hapus"
                                                                                href=""><i
                                                                                    class="pl-1  bi bi-trash tombol-hapus"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="card-footer d-flex justify-content-between position-relative">
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
                                                                            <small
                                                                                style="max-width: max-content; position: absolute; top: 45%;">
                                                                                {{ currencyPhone($data->user->nomor_telpon) }}
                                                                            </small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-center " style="margin-left: 15%;">
                                                                        <a type="button"
                                                                            class="btn btn-danger btn-scan-pdf"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Preview surat (PDF)"
                                                                            data-original-title="Preview surat (PDF)"
                                                                            href="{{ asset('document_save/' . $data->surat->scan_dokumen) }}"
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
                                            {{ $pengajuanList0->onEachSide(1)->links() }}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="terdisposisikan3" role="tabpanel"
                                        aria-labelledby="terdisposisikan-tab3">
                                        <div class="row">
                                            @if ($pengajuanList1->isEmpty())
                                                <div class="d-flex justify-content-center align-content-center">
                                                    <img src="{{ asset('assets-landing-page/img/No data-rafiki.png') }}"
                                                        class="w-50">
                                                </div>
                                            @else
                                                @foreach ($pengajuanList1 as $data)
                                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                                        <div class="card card-primary card-surat shadow-sm">
                                                            <div class="card-header d-flex justify-content-between">
                                                                <div class="position-relative">
                                                                    <h4>{{ $data->surat->nomor_surat }}</h4>
                                                                    <small class="text-primary"
                                                                        style="position: absolute; top: 50%;width: max-content;">Dari
                                                                        {{ $data->user->nama }}
                                                                    </small>
                                                                </div>
                                                                <div class="card-header-action btn-group">
                                                                    @if ($data->status_pengajuan == '0')
                                                                        <button
                                                                            class="btn btn-danger tombol-disposisi mr-2"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Belum Didisposisikan"
                                                                            data-original-title="Belum Didisposisikan"
                                                                            disabled>
                                                                            <span
                                                                                class="d-flex justify-content-center m-0"><i
                                                                                    class="bi bi bi-patch-minus"></i></span>
                                                                        </button>
                                                                    @elseif ($data->status_pengajuan == '1')
                                                                        <button
                                                                            class="btn btn-success tombol-disposisi mr-2"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Sudah Didisposisikan"
                                                                            data-original-title="Sudah Didisposisikan"
                                                                            disabled>
                                                                            <span
                                                                                class="d-flex justify-content-center m-0"><i
                                                                                    class="bi bi bi-patch-check"></i></span>
                                                                        </button>
                                                                    @endif
                                                                    <a data-collapse="#mycard-collapse{{ $data->id_pengajuan }}"
                                                                        class="btn btn-icon btn-info" href="#"><i
                                                                            class="fas fa-minus"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="collapse show"
                                                                id="mycard-collapse{{ $data->id_pengajuan }}">
                                                                <div class="card-body card-body-surat position-relative "
                                                                    style="min-height: 130px">
                                                                    <p class="w-75"> {!! $data->catatan_pengajuan !!}</p>
                                                                    <p class="mt-3" style="font-size: .7rem;">
                                                                        --
                                                                        {{ date('d-F-Y', strtotime($data->tanggal_terima)) }}
                                                                        --</p>
                                                                    <div class="d-flex flex-column btn-group-action">
                                                                        <a href="{{ route('pengajuan-disposisi.show', Crypt::encryptString($data->id_pengajuan)) }}"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Detail data pengajuan disposisi"
                                                                            data-original-title="Detail data pengajuan disposisi"
                                                                            class="btn btn-info has-icon text-white tombol-detail-card"
                                                                            href=""><i class="pl-1 bi bi-eye"></i>
                                                                        </a>
                                                                        <a type="button" data-toggle="tooltip"
                                                                            data-placement="left"
                                                                            title="Edit data disposisi"
                                                                            data-original-title="Edit data disposisi"
                                                                            class="btn btn-warning has-icon text-white tombol-edit-card"
                                                                            href="{{ route('pengajuan-disposisi.edit', Crypt::encryptString($data->id_pengajuan)) }}"><i
                                                                                class="pl-1  bi bi-pencil-square "></i>
                                                                        </a>
                                                                        <form method="POST"
                                                                            action="{{ route('pengajuan-disposisi.destroy', Crypt::encryptString($data->id_pengajuan)) }}"
                                                                            class="tombol-hapus">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="button" data-toggle="tooltip"
                                                                                data-placement="bottom"
                                                                                title="Hapus data Pengajuan"
                                                                                data-original-title="Hapus data Pengajuan"
                                                                                class="btn btn-danger has-icon text-white tombol-hapus-card tombol-hapus"
                                                                                href=""><i
                                                                                    class="pl-1  bi bi-trash tombol-hapus"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
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
                                                                            <small
                                                                                style="max-width: max-content; position: absolute; top: 45%;">
                                                                                {{ currencyPhone($data->user->nomor_telpon) }}
                                                                            </small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-center " style="margin-left: 15%;">
                                                                        <a type="button"
                                                                            class="btn btn-danger btn-scan-pdf"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Preview surat (PDF)"
                                                                            data-original-title="Preview surat (PDF)"
                                                                            href="{{ asset('document_save/' . $data->surat->scan_dokumen) }}"
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
                                            {{ $pengajuanList1->onEachSide(1)->links() }}
                                        </div>
                                    </div>
                                </div>
                                {{-- End tap content --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    @can('admin')
        <!-- Modal Disposisi -->
        @foreach ($pengajuanList0 as $data)
            <div class="modal fade disposisi-modal" id="disposisi-modal{{ $data->id_pengajuan }}"
                aria-labelledby="disposisi-modal" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered ">
                    <div class="modal-content">
                        <div class="modal-header border-bottom pb-4">
                            <h5 class="modal-title" id="disposisi-modal">Disposisikan Data Surat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/disposisi" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="id_pengajuan" value="{{ $data->id_pengajuan }}" hidden
                                id="">
                            <input type="text" name="id_user" value="{{ Auth::user()->id_user }}" hidden id="">
                            <div class="row px-4 pt-4">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="id_surat">Nomor Surat Yang Akan Didisposisikan: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control capitalize @error('id_surat') is-invalid @enderror"
                                                placeholder="ex: 090/1928-TU/2023" value="{{ $data->surat->nomor_surat }}"
                                                id="id_surat" disabled>
                                        </div>
                                        <span class="text-danger">
                                            @error('id_surat')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="nomor_agenda">Nomor Agenda: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control capitalize @error('nomor_agenda') is-invalid @enderror"
                                                value="{{ $data->nomor_agenda }} " id="nomor_agenda" name="nomor_agenda"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="id_instansi">Instansi Yang mengirim Surat: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control capitalize @error('id_instansi') is-invalid @enderror"
                                                placeholder="ex: 090/1928-TU/2023"
                                                value="{{ $data->surat->instansi->nama_instansi }}" id="id_instansi"
                                                disabled>
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
                                        <label for="tanggal_terima">Tanggal Terima: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">
                                                    <i class="bi bi-calendar3"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('tanggal_terima') is-invalid @enderror"
                                                value="{{ date('d-F-Y', strtotime($data->tanggal_terima)) }}"
                                                id="tanggal_terima" name="tanggal_terima" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="tanggal_surat">Tanggal Surat: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">
                                                    <i class="bi bi-calendar3"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('tanggal_surat') is-invalid @enderror"
                                                value="{{ date('d-F-Y', strtotime($data->surat->tanggal_surat)) }}"
                                                id="tanggal_surat" name="tanggal_surat" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="isi_surat" style="font-weight: bold;">Perihal Surat: </label>
                                            <a type="button" class="btn btn-danger mb-2" data-toggle="tooltip"
                                                data-placement="top" title="Preview surat (PDF)"
                                                data-original-title="Preview surat (PDF)"
                                                href="{{ asset('document_save/' . $data->surat->scan_dokumen) }}"
                                                target="_blank" title="Read PDF"><i class="bi bi-file-pdf"
                                                    style="font-size: 1.1rem;"></i></a>
                                        </div>
                                        <textarea class="summernote-simple summernote-disable @error('isi_surat') is-invalid @enderror"
                                            placeholder="ex: Perihal rapat paripurna" id="isi_surat" name="isi_surat" readonly> {{ $data->surat->isi_surat }} </textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="capitalize" for="status_disposisi">Status Disposisi:
                                        </label>
                                        <div class="input-group">
                                            <select
                                                class="form-control select2  @error('status_disposisi') is-invalid @enderror "
                                                id="status_disposisi" name="status_disposisi" readonly style="width: 100%;">
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
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="capitalize" for="sifat_disposisi">Sifat Disposisi: </label>
                                        <div class="input-group">
                                            <select
                                                class="form-control select2  @error('sifat_disposisi') is-invalid @enderror "
                                                id="sifat_disposisi" name="sifat_disposisi" required style="width: 100%;">
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
                                <div class="col-12 d-flex justify-content-center row">
                                    <div class="col-12 d-flex justify-content-center text-primary section-title">Pilih Salah
                                        Satu</div>
                                    <div class="mt-2">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="jabatan{{ $data->id_pengajuan }}"
                                                name="jenis_disposisi" class="custom-control-input jabatan"
                                                onclick="toggleSelects({{ $data->id_pengajuan }})" checked>
                                            <label class="custom-control-label" for="jabatan{{ $data->id_pengajuan }}">Kirim
                                                Sesuai Jabatan</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="personal{{ $data->id_pengajuan }}"
                                                name="jenis_disposisi" class="custom-control-input personal"
                                                onclick="toggleSelects({{ $data->id_pengajuan }})">
                                            <label class="custom-control-label" for="personal{{ $data->id_pengajuan }}">Kirim
                                                Sesuai Personal</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="form-group id_posisi_jabatan_div"
                                        id="id_posisi_jabatan_div{{ $data->id_pengajuan }}">
                                        <label class="capitalize" for="id_posisi_jabatan">Pilih Tujuan Disposisi (Jabatan):
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
                                    <div class="form-group id_user_div d-none" id="id_user_div{{ $data->id_pengajuan }}">
                                        <label class="capitalize" for="id_user">Pilih Tujuan Disposisi (Personal):
                                        </label>
                                        <div class="input-group">
                                            <select class="form-control select2 @error('id_user') is-invalid  @enderror "
                                                id="id_user" name="id_penerima[]" multiple="" style="width: 100%">
                                                <option disabled>Pilih User</option>
                                                @foreach ($userList as $data)
                                                    <option value="{{ $data->id_user }}"
                                                        {{ old('id_penerima') == $data->id_user ? 'selected' : '' }}>
                                                        {{ $data->nama }} |
                                                        {{ $data->posisiJabatan->nama_posisi_jabatan }}
                                                    </option>
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
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="capitalize" for="tanggal_disposisi">Masukkan Tanggal Disposisi:
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-calendar3"></i>
                                                </div>
                                            </div>
                                            <input type="date"
                                                class="form-control datepicker tanggal_disposisi @error('tanggal_disposisi') is-invalid @enderror"
                                                placeholder="ex: 11/14/2023" value="{{ old('tanggal_disposisi') }}"
                                                id="tanggal_disposisi" name="tanggal_disposisi" required>
                                        </div>
                                        <span class="text-danger">
                                            @error('tanggal_disposisi')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="catatan_disposisi">Catatan Disposisi: </label>
                                        <textarea class="summernote-simple @error('catatan_disposisi') is-invalid @enderror"
                                            placeholder="ex: Perihal rapat paripurna" id="catatan_disposisi" name="catatan_disposisi" required> {{ old('catatan_disposisi') }} </textarea>
                                        <span class="text-danger">
                                            @error('catatan_disposisi')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between border-top pt-3">
                                <button type="button" class="btn btn-danger"data-dismiss="modal" aria-label="Close">Close <i
                                        class="bi bi-x-circle ml-3"></i></button>
                                <button type="submit" value="Import" class="btn btn-primary text-white">
                                    Disposisikan Data <i class="bi bi-clipboard-check-fill ml-3"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- End Disposisi --}}
    @endcan

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

    {{-- script mengatur tujuan disposisi --}}
    <script>
        function toggleSelects(id) {
            const jabatanChecked = document.getElementById('jabatan' + id).checked;
            const personalChecked = document.getElementById('personal' + id).checked;

            const posisiJabatanDiv = document.getElementById('id_posisi_jabatan_div' + id);
            const idUserDiv = document.getElementById('id_user_div' + id);

            if (jabatanChecked) {
                posisiJabatanDiv.classList.remove('d-none');
                idUserDiv.classList.add('d-none');
            } else if (personalChecked) {
                posisiJabatanDiv.classList.add('d-none');
                idUserDiv.classList.remove('d-none');
            }
        }
    </script>

    {{-- summernote --}}
    <script>
        $(document).ready(function() {
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

            $('.note-editor').addClass('d-flex flex-column');
        })
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
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                @foreach ($errors->all() as $error)
                    iziToast.error({
                        title: 'Error',
                        message: "{{ $error }}",
                        position: 'topRight'
                    });
                @endforeach
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
                        text: 'Ingin menghapus data Pengajuan ini!',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal('Data Pengajuan berhasil dihapus!', {
                                icon: 'success',
                            });
                            element.closest('form').submit();
                        } else {
                            swal('Data Pengajuan tidak jadi dihapus!');
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
