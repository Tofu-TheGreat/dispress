@extends('admin.pages.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex">
                    {{-- judul Page --}}
                    <div class="col-md-8 col-sm-12">
                        <h4 class="text-dark judul-page">Manajemen Surat</h4>
                    </div>
                    {{-- Akhir judul Page --}}
                    {{-- Breadcrumb --}}
                    <div class="col-md-4 col-sm-12 text-center items-center mt-2 ">
                        <div class="breadcrumb-item d-inline active"><a href="/dashboard">Dashboard</a></div>
                        <div class="breadcrumb-item d-inline active"><a href="/disposisi">Diposisi</a></div>
                        <div class="breadcrumb-item d-inline">Edit Data</div>
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
                                <a href="/disposisi">
                                    <i class="bi bi-arrow-left"></i>
                                </a>
                            </div>
                            <div class="col-">
                                <h4 class="text-primary">Edit Data Diposisi</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <form action="/disposisi/{{ $editDataDisposisi->id_disposisi }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="text" name="id_surat" value="{{ $editDataDisposisi->id_surat }}" id=""
                                hidden>
                            <input type="text" name="id_user" value="{{ $editDataDisposisi->id_user }}" id=""
                                hidden>
                            <div class="row">
                                <div class="col">
                                    <div class="row">
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
                                                        placeholder="ex: 090/1928-TU/2023"
                                                        value="{{ $editDataDisposisi->surat->nomor_surat }}" id="id_surat"
                                                        disabled>
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
                                                <label for="tanggal_disposisi">Tanggal Disposisi: </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-secondary">
                                                            <i class="bi bi-calendar3"></i>
                                                        </div>
                                                    </div>
                                                    <input type="date"
                                                        class="form-control datepicker capitalize @error('tanggal_disposisi') is-invalid @enderror"
                                                        placeholder="ex:  11/14/2023"
                                                        value="{{ $editDataDisposisi->tanggal_disposisi }}"
                                                        id="tanggal_disposisi" name="tanggal_disposisi">
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
                                                    placeholder="ex: Perihal rapat paripurna" id="catatan_disposisi" name="catatan_disposisi" required> {{ $editDataDisposisi->catatan_disposisi }} </textarea>
                                                <span class="text-danger">
                                                    @error('catatan_disposisi')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="capitalize" for="sifat_disposisi">Sifat Disposisi: </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <div class="input-group-text bg-secondary">
                                                            <i class="bi bi-envelope-exclamation"></i>
                                                        </div>
                                                    </div>
                                                    <select
                                                        class="form-control select2  @error('sifat_disposisi') is-invalid @enderror "
                                                        id="sifat_disposisi" name="sifat_disposisi" required>
                                                        <option selected disabled>Pilih Sifat Surat</option>
                                                        <option value="0"
                                                            {{ $editDataDisposisi->sifat_disposisi === '0' ? 'selected' : '' }}>
                                                            Biasa</option>
                                                        <option value="1"
                                                            {{ $editDataDisposisi->sifat_disposisi === '1' ? 'selected' : '' }}>
                                                            Prioritas</option>
                                                        <option value="2"
                                                            {{ $editDataDisposisi->sifat_disposisi == '2' ? 'selected' : '' }}>
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
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="capitalize" for="status_disposisi">Status Disposisi:
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <div class="input-group-text bg-secondary">
                                                            <i class="bi bi-envelope-exclamation-fill"></i>
                                                        </div>
                                                    </div>
                                                    <select
                                                        class="form-control select2  @error('status_disposisi') is-invalid @enderror "
                                                        id="status_disposisi" name="status_disposisi" required>
                                                        <option selected disabled>Pilih Sifat Surat</option>
                                                        <option value="0"
                                                            {{ $editDataDisposisi->status_disposisi === '0' ? 'selected' : '' }}>
                                                            Belum ditindak</option>
                                                        <option value="1"
                                                            {{ $editDataDisposisi->status_disposisi === '1' ? 'selected' : '' }}>
                                                            Diajukan</option>
                                                        <option value="2"
                                                            {{ $editDataDisposisi->status_disposisi == '2' ? 'selected' : '' }}>
                                                            Diterima</option>
                                                        <option value="3"
                                                            {{ $editDataDisposisi->status_disposisi == '3' ? 'selected' : '' }}>
                                                            Dikembalikan</option>
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
                                                <label class="capitalize" for="id_user">Pengirim Surat: </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <div class="input-group-text bg-secondary">
                                                            <i class="bi bi-person-rolodex "></i>
                                                        </div>
                                                    </div>
                                                    <select
                                                        class="form-control select2  @error('id_user') is-invalid @enderror "
                                                        id="id_user" name="id_user" required>
                                                        <option selected disabled>Pilih Pengirim Surat</option>
                                                        @foreach ($userList as $data)
                                                            <option value="{{ $data->id_user }}"
                                                                {{ $editDataDisposisi->id_user == $data->id_user ? 'selected' : '' }}>
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
                                                <label class="capitalize" for="tujuan_disposisi">Tujuan Disposisi:
                                                </label>
                                                <div class="input-group">
                                                    <select
                                                        class="form-control select2  @error('tujuan_disposisi') is-invalid @enderror "
                                                        id="tujuan_disposisi" name="tujuan_disposisi" multiple=""
                                                        required>
                                                        <option disabled>Pilih Tujuan Disposisi</option>
                                                        <option value="0"
                                                            {{ $editDataDisposisi->tujuan_disposisi === '0' ? 'selected' : '' }}>
                                                            Kepala Sekolah</option>
                                                        <option value="1"
                                                            {{ $editDataDisposisi->tujuan_disposisi === '1' ? 'selected' : '' }}>
                                                            Wakil Kepala Sekolah</option>
                                                        <option value="2"
                                                            {{ $editDataDisposisi->tujuan_disposisi == '2' ? 'selected' : '' }}>
                                                            Kurikulum</option>
                                                        <option value="3"
                                                            {{ $editDataDisposisi->tujuan_disposisi == '3' ? 'selected' : '' }}>
                                                            Kesiswaan</option>
                                                        <option value="4"
                                                            {{ $editDataDisposisi->tujuan_disposisi == '4' ? 'selected' : '' }}>
                                                            Sarana Prasarana</option>
                                                        <option value="5"
                                                            {{ $editDataDisposisi->tujuan_disposisi == '5' ? 'selected' : '' }}>
                                                            Kepala Jurusan</option>
                                                        <option value="6"
                                                            {{ $editDataDisposisi->tujuan_disposisi == '6' ? 'selected' : '' }}>
                                                            Hubin</option>
                                                        <option value="7"
                                                            {{ $editDataDisposisi->tujuan_disposisi == '7' ? 'selected' : '' }}>
                                                            Bimbingan Konseling</option>
                                                        <option value="8"
                                                            {{ $editDataDisposisi->tujuan_disposisi == '8' ? 'selected' : '' }}>
                                                            Guru Umum</option>
                                                        <option value="9"
                                                            {{ $editDataDisposisi->tujuan_disposisi == '9' ? 'selected' : '' }}>
                                                            Tata Usaha</option>
                                                    </select>
                                                </div>
                                                <span class="text-danger">
                                                    @error('tujuan_disposisi')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <div class="row d-flex justify-content-end">
                                    <div class="ml-2 ">
                                        <a href="/disposisi" class="btn btn-warning  ">
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
                                    <a type="button" class="btn btn-danger mb-2 ml-2" data-toggle="tooltip"
                                        data-placement="top" title="Preview surat (PDF)"
                                        data-original-title="Preview surat (PDF)"
                                        href="{{ asset('document_save/' . $editDataDisposisi->surat->scan_dokumen) }}"
                                        target="_blank" title="Read PDF"><i class="bi bi-file-pdf"></i></a>
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
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
@endsection