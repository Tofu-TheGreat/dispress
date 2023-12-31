@extends('admin.pages.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link href="{{ asset('assets-landing-page/extension/filepond/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link href="{{ asset('assets-landing-page/extension/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
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
                        <div class="breadcrumb-item d-inline">Surat Masuk</div>
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
            <form action="/surat-filter" method="get">
                @csrf
                <div class="collapse" id="collapseExample" style="">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="id_instansi">Pilih Berdasarkan Instansi: </label>
                                    <div class="input-group">
                                        <select class="filter select2 @error('id_instansi') is-invalid  @enderror "
                                            id="id_instansi" name="id_instansi" style="width: 100%;">
                                            <option selected disabled>Pilih Instansi Pengirim</option>
                                            @foreach ($instansiList as $data)
                                                <option value="{{ $data->id_instansi }}"
                                                    {{ old('id_instansi') == $data->id_instansi ? 'selected' : '' }}>
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
                                    <label class="capitalize" for="id_user">Pilih Berdasarkan Penerima: </label>
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
                                    <label class="capitalize" for="status_verifikasi">Pilih Berdasarkan Status Verifikasi:
                                    </label>
                                    <div class="input-group">
                                        <select class="filter select2 @error('status_verifikasi') is-invalid  @enderror "
                                            id="status_verifikasi" name="status_verifikasi" style="width: 100%;">
                                            <option selected disabled>Pilih Status Verifikasi</option>
                                            <option value="0"
                                                {{ $data->status_verifikasi === '0' ? 'selected' : '' }}>
                                                Belum Terverifikasi</option>
                                            <option value="1"
                                                {{ $data->status_verifikasi === '1' ? 'selected' : '' }}>
                                                Terverifikasi</option>
                                            <option value="2"
                                                {{ $data->status_verifikasi === '2' ? 'selected' : '' }}>
                                                Dikembalikan</option>
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('status_verifikasi')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <h6 class="text-primary text-center mb-4">Sortir berdasarkan Tanggal Pembuatan Surat
                                </h6>
                            </div>
                            <div class=" col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="tanggal_surat_awal">Dari Tanggal Awal Pembuatan Surat:
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
                                        Surat: </label>
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
                            <a type="button" id="reset" href="{{ route('surat.index') }}"
                                class="btn btn-secondary mb-1" title="Reset">
                                <i class="bi bi-arrow-clockwise mr-1"></i><span class="bi-text mr-2">Reset
                                    Filter</span></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- Filter --}}

        <div class="section-body">
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <div class="col-lg-11 col-sm-8">
                            <h4 class="text-primary judul-page">List Surat Masuk</h4>
                        </div>
                        <div class="col-lg-1 col-sm-4 btn-group">
                            @can('admin-officer')
                                {{-- Button Tambah Data --}}
                                <a href="/surat/create" class="text-white">
                                    <button type="button" class="btn btn-primary" data-toggle="tooltip"
                                        data-placement="top" title="Tambah Data" data-original-title="Tambah Data">
                                        <i class="fa fa-plus-circle btn-tambah-data"></i>
                                    </button>
                                </a>
                                {{-- Akhir Button Tambah Data --}}
                            @endcan
                            {{-- Button Export Data --}}
                            <a href="#" class="text-white ml-2 tombol-export">
                                <button type="button" class="btn btn-success tombol-export" data-toggle="tooltip"
                                    data-placement="top" title="Export Data Excel" data-original-title="Export Data">
                                    <i class="fa fa-file-excel btn-tambah-data tombol-export"></i>
                                </button>
                            </a>
                            {{-- Akhir Button Export Data --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end mb-3">
                                <form action="{{ route('search.surat') }}" method="post">
                                    @csrf
                                    <div class="container-input">
                                        <input type="text" placeholder="Search" name="search" class="search"
                                            id="searchInput">
                                        <i class="bi bi-search-heart search-icon"></i>
                                        <div class="button-search">
                                            <button type="submit"
                                                class="btn btn-primary button-submit-search">Search</button>
                                            <a type="button" href="{{ route('surat.index') }}"
                                                class="btn btn-secondary rounded-pill button-reset-search"><span>Reset</span></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                <div class="row">
                                    @if ($suratList->isEmpty())
                                        <div class="d-flex justify-content-center align-content-center">
                                            <img src="{{ asset('assets-landing-page/img/No data-rafiki.png') }}"
                                                class="w-50">
                                        </div>
                                    @else
                                        @foreach ($suratList as $data)
                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class="card card-primary card-surat shadow-sm">
                                                    <div class="card-header d-flex justify-content-between">
                                                        <div class="position-relative">
                                                            <h4>{{ $data->nomor_surat }}</h4>
                                                            <small class="text-primary"
                                                                style="position: absolute; top: 50%;width: max-content;">Dari
                                                                {{ $data->instansi->nama_instansi }}
                                                            </small>
                                                        </div>
                                                        <div class="card-header-action btn-group tombol-ajukan">
                                                            @can('admin-officer')
                                                                @if ($data->status_verifikasi == 1)
                                                                    <span class="tombol-ajukan" data-toggle="tooltip"
                                                                        data-placement="top" title="Ajukan untuk Disposisi"
                                                                        data-original-title="Ajukan untuk Disposisi" disabled>
                                                                        <button type="button"
                                                                            class="btn btn-success mr-2 tombol-ajukan"
                                                                            data-toggle="modal"
                                                                            data-target="#ajukan-modal{{ $data->id_surat }}"
                                                                            type="button">
                                                                            Ajukan
                                                                        </button>
                                                                    </span>
                                                                @endif
                                                            @endcan
                                                            <a data-collapse="#mycard-collapse{{ $data->id_surat }}"
                                                                class="btn btn-icon btn-info" href="#"><i
                                                                    class="fas fa-minus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="collapse show" id="mycard-collapse{{ $data->id_surat }}">
                                                        <div class="card-body card-body-surat position-relative "
                                                            style="min-height: 130px">
                                                            <p class="w-75"> {!! $data->isi_surat !!}</p>
                                                            <p class="mt-3" style="font-size: .7rem;">
                                                                -- {{ date('d-F-Y', strtotime($data->tanggal_surat)) }}
                                                                --</p>
                                                            <div class="mt-1 mb-1 tombol-verifikasi">
                                                                @can('admin')
                                                                    <span class="tombol-verifikasi" data-toggle="tooltip"
                                                                        data-placement="right"
                                                                        title="klik Untuk Mengatur verifikasikan"
                                                                        data-original-title="klik Untuk Mengatur verifikasikan"
                                                                        disabled>
                                                                    @endcan
                                                                    @if ($data->status_verifikasi == 0)
                                                                        <button type="button"
                                                                            class="btn btn-primary mr-2 tombol-verifikasi"
                                                                            data-toggle="modal"
                                                                            data-target="#verifikasi-modal{{ $data->id_surat }}"
                                                                            type="button">
                                                                            <i class="bi bi-patch-minus-fill tombol-verifikasi"
                                                                                style="font-size: .8rem;"> Belum
                                                                                Terverifikasi</i>
                                                                        </button>
                                                                    @elseif ($data->status_verifikasi == 1)
                                                                        <button type="button"
                                                                            class="btn btn-success mr-2 tombol-verifikasi"
                                                                            data-toggle="modal"
                                                                            data-target="#verifikasi-modal{{ $data->id_surat }}"
                                                                            type="button">
                                                                            <i class="bi bi-patch-plus-fill tombol-verifikasi"
                                                                                style="font-size: .8rem;">
                                                                                Terverifikasi</i>
                                                                        </button>
                                                                    @else
                                                                        <button type="button"
                                                                            class="btn btn-danger mr-2 tombol-verifikasi"
                                                                            data-toggle="modal"
                                                                            data-target="#verifikasi-modal{{ $data->id_surat }}"
                                                                            type="button">
                                                                            <i class="bi bi-patch-exclamation-fill tombol-verifikasi"
                                                                                style="font-size: .8rem;">
                                                                                Dikembalikan</i>
                                                                        </button>
                                                                    @endif
                                                                    @can('staff')
                                                                        <a href="{{ route('surat.show', Crypt::encryptString($data->id_surat)) }}"
                                                                            data-toggle="tooltip" data-placement="right"
                                                                            title="Detail data surat"
                                                                            data-original-title="Detail data surat"
                                                                            class="btn btn-info has-icon text-white mr-1"
                                                                            href=""><i class="bi bi-eye"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('admin')
                                                                    </span>
                                                                @endcan
                                                                @can('admin-officer')
                                                                    <span class="badge badge-transparent-success"
                                                                        data-toggle="tooltip" data-placement="right"
                                                                        title="{{ $pengajuanCount->where('id_surat', $data->id_surat)->count() }} kali Di ajukan"
                                                                        data-original-title="{{ $pengajuanCount->where('id_surat', $data->id_surat)->count() }} kali Di ajukan">{{ $pengajuanCount->where('id_surat', $data->id_surat)->count() }}
                                                                    </span>
                                                                @endcan
                                                            </div>
                                                            <div class="d-flex flex-column btn-group-action">
                                                                @can('admin-officer')
                                                                    <a href="{{ route('surat.show', Crypt::encryptString($data->id_surat)) }}"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Detail data surat"
                                                                        data-original-title="Detail data surat"
                                                                        class="btn btn-info has-icon text-white tombol-detail-card"
                                                                        href=""><i class="pl-1  bi bi-eye "></i>
                                                                    </a>
                                                                    <a type="button" data-toggle="tooltip"
                                                                        data-placement="left" title="Edit data surat"
                                                                        data-original-title="Edit data surat"
                                                                        class="btn btn-warning has-icon text-white tombol-edit-card"
                                                                        href="{{ route('surat.edit', Crypt::encryptString($data->id_surat)) }}"><i
                                                                            class="pl-1  bi bi-pencil-square "></i>
                                                                    </a>
                                                                    <form method="POST"
                                                                        action="{{ route('surat.destroy', Crypt::encryptString($data->id_surat)) }}"
                                                                        class="tombol-hapus">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="button" data-toggle="tooltip"
                                                                            data-placement="bottom" title="Hapus data surat"
                                                                            data-original-title="Hapus data surat"
                                                                            class="btn btn-danger has-icon text-white tombol-hapus-card tombol-hapus"
                                                                            href=""><i
                                                                                class="pl-1  bi bi-trash tombol-hapus"></i>
                                                                        </button>
                                                                    </form>
                                                                @endcan
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="card-footer d-flex justify-content-between position-relative">
                                                            <div class="d-flex flex-row ">
                                                                <div>
                                                                    <div class="user-detail-name">
                                                                        <span class="text-primary" href="#">
                                                                            {{ $data->instansi->nama_instansi }}</span>
                                                                    </div>
                                                                    <div class="text-job">
                                                                        <small style="max-width: max-content">
                                                                            {{ currencyPhone($data->instansi->nomor_telpon) }}
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center " style="margin-left: 15%;">
                                                                <a type="button" class="btn btn-danger btn-scan-pdf"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Preview surat (PDF)"
                                                                    data-original-title="Preview surat (PDF)"
                                                                    href="{{ asset('document_save/' . $data->scan_dokumen) }}"
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
                                            {{ $suratList->onEachSide(1)->links() }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @can('admin')
        <!-- Modal Verifikasi Surat -->
        @foreach ($suratList as $data)
            <div class="modal fade verifikasi-modal" id="verifikasi-modal{{ $data->id_surat }}"
                aria-labelledby="verifikasi-modal" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered ">
                    <div class="modal-content">
                        <div class="modal-header border-bottom pb-4">
                            <h5 class="modal-title" id="verifikasi-modal">Verifikasi Data surat untuk di Disposisikan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/surat-verifikasi/{{ $data->id_surat }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="id_surat" value="{{ $data->id_surat }}" hidden id="">
                            <input type="text" name="id_klasifikasi" value="{{ $data->id_klasifikasi }}" hidden
                                id="">
                            <div class="row px-4 pt-4">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="id_surat">Nomor Surat: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control capitalize @error('nomor_surat') is-invalid @enderror"
                                                placeholder="ex: 090/1928-TU/2023" value="{{ $data->nomor_surat }}"
                                                id="nomor_surat" name="nomor_surat" readonly>
                                        </div>
                                        <span class="text-danger">
                                            @error('nomor_surat')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="tanggal_surat">Tanggal Surat: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">
                                                    <i class="bi bi-calendar3"></i>
                                                </div>
                                            </div>
                                            <input type="date"
                                                class="form-control @error('tanggal_surat') is-invalid @enderror"
                                                value="{{ $data->tanggal_surat }}" id="tanggal_surat" name="tanggal_surat"
                                                readonly>
                                        </div>
                                        <span class="text-danger">
                                            @error('tanggal_surat')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="isi_surat">Ringkasan Surat: </label>
                                        <textarea class="summernote-simple summernote-disable @error('isi_surat') is-invalid @enderror"
                                            placeholder="ex: Perihal rapat paripurna" id="isi_surat" name="isi_surat" readonly> {{ $data->isi_surat }} </textarea>
                                        <span class="text-danger">
                                            @error('isi_surat')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="id_instansi">Pengirim Surat: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">
                                                    <i class="bi bi-person-rolodex"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('id_instansi') is-invalid @enderror"
                                                value="{{ $data->instansi->nama_instansi }}" id="id_instansi" readonly>
                                            <input type="text" name="id_instansi" value="{{ $data->id_instansi }}" hidden
                                                id="">
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
                                        <label for="id_user">Penerima Surat: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">
                                                    <i class="bi bi-person-rolodex"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control @error('id_user') is-invalid @enderror"
                                                value="{{ $data->user->nama }}" id="id_user" readonly>
                                            <input type="text" name="id_user" value="{{ $data->id_user }}" hidden
                                                id="">

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
                                        <label for="status_verifikasi">Verifikasi Surat: </label>
                                        <div class="input-group">
                                            <select
                                                class="form-control select2  @error('status_verifikasi') is-invalid @enderror "
                                                id="status_verifikasi" name="status_verifikasi" required
                                                style="width: 100%;">
                                                <option selected disabled>Pilih Status Verifikasi Surat</option>
                                                <option value="0"
                                                    {{ $data->status_verifikasi === '0' ? 'selected' : '' }}>
                                                    Belum Terverifikasi</option>
                                                <option value="1"
                                                    {{ $data->status_verifikasi === '1' ? 'selected' : '' }}>
                                                    Terverifikasi</option>
                                                <option value="2"
                                                    {{ $data->status_verifikasi === '2' ? 'selected' : '' }}>
                                                    Dikembalikan</option>
                                            </select>
                                        </div>
                                        <span class="text-danger">
                                            @error('status_verifikasi')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="catatan_verifikasi">Catatan Verifikasi Surat: </label>
                                        <textarea class="summernote-simple @error('catatan_verifikasi') is-invalid @enderror"
                                            placeholder="ex: Perihal rapat paripurna" id="catatan_verifikasi" name="catatan_verifikasi" readonly> {{ $data->catatan_verifikasi }} </textarea>
                                        <span class="text-danger">
                                            @error('catatan_verifikasi')
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
                                    Save Data <i class="bi bi-clipboard-check-fill ml-3"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- End Verifikasi Surat --}}
    @endcan

    <!-- Modal Ajukan Disposisi -->
    @foreach ($suratList as $data)
        <div class="modal fade ajukan-modal" id="ajukan-modal{{ $data->id_surat }}" aria-labelledby="ajukan-modal"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header border-bottom pb-4">
                        <h5 class="modal-title" id="ajukan-modal">Ajukan Data surat untuk Didisposisikan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('pengajuan-disposisi.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id_surat" value="{{ $data->id_surat }}" hidden id="">
                        <input type="text" name="id_user" value="{{ Auth::user()->id_user }}" hidden id="">
                        <div class="row px-4 pt-4">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="id_klasifikasi">Nomor Klasifikasi Surat: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control id_klasifikasi capitalize @error('id_klasifikasi') is-invalid @enderror"
                                            placeholder="ex: 090/1928-TU/2023"
                                            value="{{ $data->klasifikasi->nomor_klasifikasi }} | {{ $data->klasifikasi->nama_klasifikasi }} "
                                            id="id_klasifikasi" disabled>
                                    </div>
                                    <span class="text-danger">
                                        @error('id_klasifikasi')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class=" col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group ">
                                    <label for="id_klasifikasi">Nomor Klasifikasi Agenda: </label>
                                    <div class="input-group">
                                        <select
                                            class="form-control select2 id_klasifikasi @error('id_klasifikasi') is-invalid @enderror "
                                            id="id_klasifikasi_{{ $data->id_surat }}" name="id_klasifikasi"
                                            style="width: 100%" data-id-surat="{{ $data->id_surat }}">
                                            <option selected disabled>Pilih Nomor Klasifikasi</option>
                                            @foreach ($klasifikasiList as $item)
                                                <option value="{{ $item->id_klasifikasi }}"
                                                    {{ old('id_klasifikasi') == $item->id_klasifikasi ? 'selected' : '' }}>
                                                    {{ $item->nama_klasifikasi }} |
                                                    {{ $item->nomor_klasifikasi }}</option>
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
                                    <label for="id_surat">Nomor Surat Disposisi: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control capitalize @error('id_surat') is-invalid @enderror"
                                            placeholder="ex: 090/1928-TU/2023" value="{{ $data->nomor_surat }}"
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
                                            <div class="input-group-text ">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control capitalize nomor_agenda @error('nomor_agenda') is-invalid @enderror"
                                            placeholder="ex: 090/1928-TU/2023" name="nomor_agenda"
                                            value="{{ old('nomor_agenda') }}" id="nomor_agenda_{{ $data->id_surat }}">
                                    </div>
                                    <span class="text-danger">
                                        @error('nomor_agenda')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="id_instansi">Dari: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control capitalize @error('id_instansi') is-invalid @enderror"
                                            placeholder="ex: 090/1928-TU/2023"
                                            value="{{ $data->instansi->nama_instansi }}" id="id_instansi" disabled>
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
                                    <label for="tanggal_terima">Tanggal Diterima: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-calendar3"></i>
                                            </div>
                                        </div>
                                        <input type="date"
                                            class="form-control datepicker capitalize @error('tanggal_terima') is-invalid @enderror"
                                            placeholder="ex:  11/14/2023" value="{{ old('tanggal_terima') }}"
                                            id="tanggal_terima" name="tanggal_terima">
                                    </div>
                                    <span class="text-danger">
                                        @error('tanggal_terima')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tanggal_disposisi">Tanggal Surat: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">
                                                <i class="bi bi-calendar3"></i>
                                            </div>
                                        </div>
                                        <input
                                            class="form-control capitalize @error('tanggal_disposisi') is-invalid @enderror"
                                            placeholder="ex:  11/14/2023"
                                            value="{{ date('d-F-Y', strtotime($data->tanggal_surat)) }}"
                                            id="tanggal_disposisi" name="tanggal_disposisi" disabled>
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
                                    <label for="isi_surat">Perihal Surat: </label>
                                    <textarea class="summernote-simple summernote-disable @error('isi_surat') is-invalid @enderror"
                                        placeholder="ex: Perihal rapat paripurna" id="isi_surat" name="isi_surat" readonly> {{ $data->isi_surat }} </textarea>
                                    <span class="text-danger">
                                        @error('isi_surat')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="capitalize" for="id_user">Pengirim Ajuan: </label>
                                    <div class="input-group">
                                        <select class="form-control select2  @error('id_user') is-invalid @enderror "
                                            id="id_user" name="id_user" required disabled style="width: 100%;">
                                            <option selected disabled>Pilih Pengirim Surat</option>
                                            <option selected value="{{ auth()->user()->id_user }}">
                                                {{ auth()->user()->nama }}</option>
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
                                    <label for="catatan_pengajuan">Catatan Pengajuan: </label>
                                    <textarea class="summernote-simple  @error('catatan_pengajuan') is-invalid @enderror"
                                        placeholder="ex: Perihal rapat paripurna" id="catatan_pengajuan" name="catatan_pengajuan"> {{ $data->catatan_pengajuan }} </textarea>
                                    <span class="text-danger">
                                        @error('catatan_pengajuan')
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
                                Ajukan Data <i class="bi bi-clipboard-check-fill ml-3"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    {{-- End Ajukan Disposisi --}}

@endsection
@section('script')
    {{-- modules --}}
    <script src="{{ asset('assets-landing-page/extension/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/js/filepond.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/input-mask/jquery.inputmask.bundle.min.js') }}"></script>

    <script>
        // Mengambil data klasifikasiList dari PHP
        const klasifikasiList = {!! json_encode($klasifikasiList) !!};

        $(document).ready(function() {
            // Delegasi event change untuk elemen dengan class 'id_klasifikasi'
            $(document).on('change', '.id_klasifikasi', function() {
                const selectedValue = $(this).val();

                // Simpan nilai awal nomor_agenda
                const nomorAgendaInput = $('.nomor_agenda').val();

                // Menggunakan klasifikasiList di sini
                // Contoh: Menampilkan data terkait dengan nilai terpilih
                const selectedKlasifikasi = klasifikasiList.find(function(item) {
                    return item.id_klasifikasi == selectedValue;
                });

                // Ambil tiga angka pertama dari nomor_klasifikasi
                const tigaAngkaPertama = selectedKlasifikasi ? selectedKlasifikasi.nomor_klasifikasi.slice(
                    0, 3) : '';

                // Ganti tiga angka pertama di nomorAgendaInput
                const nomorAgendaBaru = tigaAngkaPertama + nomorAgendaInput.slice(3);

                // Menetapkan nilai ke elemen nomor_agenda yang memiliki ID sesuai dengan data.id_surat
                const idSurat = $(this).data('id-surat');
                $('#nomor_agenda_' + idSurat).val(selectedKlasifikasi ? nomorAgendaBaru : '');
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.phone').inputmask('9999-9999-9999');

            $('#catatan_pengajuan').summernote({
                placeholder: 'ex: Tolong untuk di approve',
                dialogsInBody: true,
                minHeight: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['codeview', 'help']],
                ],
            });

            $('#catatan_verifikasi').summernote({
                placeholder: 'ex: sudah Terverifikasi',
                dialogsInBody: true,
                minHeight: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['codeview', 'help']],
                ],
            });

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
            const noteEditable = document.body.querySelectorAll(".note-editing-area");

            if (element.classList.contains("tombol-hapus")) {
                swal({
                        title: 'Apakah anda yakin?',
                        text: 'Ingin menghapus data Surat ini!',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal('Data Surat berhasil dihapus!', {
                                icon: 'success',
                            });
                            element.closest('form').submit();
                        } else {
                            swal('Data Surat tidak jadi dihapus!');
                        }
                    });
            }

            if (element.classList.contains("tombol-export")) {
                swal({
                        title: 'Apakah anda yakin?',
                        text: 'Ingin export data Surat ini?',
                        icon: 'info', // Change the icon to a question mark
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willExport) => {
                        if (willExport) {
                            swal('Data Surat berhasil diexport!', {
                                icon: 'success',
                            });

                            // Make an AJAX request to trigger the export
                            fetch('{{ route('surat.export') }}', {
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
                            swal('Data Surat tidak jadi diexport!');
                        }
                    });
            }
        })
    </script>
@endsection
