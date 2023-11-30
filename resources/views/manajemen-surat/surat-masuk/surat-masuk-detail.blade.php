@extends('admin.pages.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
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
                        <div class="breadcrumb-item d-inline active"><a href="/surat">Surat Masuk</a></div>
                        <div class="breadcrumb-item d-inline">Detail Surat</div>
                    </div>
                    {{-- Akhir Breadcrumb --}}
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="row card-header">
                    <div class="col-lg-11 col-sm-8">
                        <div class="row">
                            <a href="/surat" title="Kembali">
                                <i class="bi bi-arrow-left mr-3"></i>
                            </a>
                            <h4 class="text-primary judul-page">Detail Surat Masuk</h4>
                        </div>
                    </div>
                    <div class="col-lg-1 col-sm-4 btn-group">
                        <a class="tombol-verifikasi" data-toggle="tooltip" data-placement="top"
                            title="klik Untuk Mengatur verifikasikan"
                            data-original-title="klik Untuk Mengatur verifikasikan" disabled>
                            @if ($detailDataSurat->status_verifikasi == 0)
                                <button type="button" class="btn btn-primary tombol-verifikasi" data-toggle="modal"
                                    data-target="#verifikasi-modal{{ $detailDataSurat->id_surat }}" type="button">
                                    <i class="bi bi-patch-minus-fill tombol-verifikasi" style="font-size: .8rem;"> Belum
                                        Terverifikasi</i>
                                </button>
                            @elseif ($detailDataSurat->status_verifikasi == 1)
                                <button type="button" class="btn btn-success tombol-verifikasi" data-toggle="modal"
                                    data-target="#verifikasi-modal{{ $detailDataSurat->id_surat }}" type="button">
                                    <i class="bi bi-patch-plus-fill tombol-verifikasi" style="font-size: .8rem;">
                                        Terverifikasi</i>
                                </button>
                            @else
                                <button type="button" class="btn btn-danger tombol-verifikasi" data-toggle="modal"
                                    data-target="#verifikasi-modal{{ $detailDataSurat->id_surat }}" type="button">
                                    <i class="bi bi-patch-exclamation-fill tombol-verifikasi" style="font-size: .8rem;">
                                        Dikembalikan</i>
                                </button>
                            @endif
                        </a>
                        <span class="tombol-ajukan" data-toggle="tooltip" data-placement="top"
                            title="Ajukan untuk Disposisi" data-original-title="Ajukan untuk Disposisi" disabled>
                            <button type="button" class="btn btn-success ml-2 tombol-ajukan" data-toggle="modal"
                                data-target="#ajukan-modal{{ $detailDataSurat->id_surat }}" type="button">
                                Ajukan
                            </button>
                        </span>
                        <a href="{{ route('surat.edit', Crypt::encryptString($detailDataSurat->id_surat)) }}"
                            class="text-white ml-2">
                            <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                title="Edit Data Surat Masuk" data-original-title="Edit Data Surat Masuk">
                                <i class="bi bi-pencil btn-tambah-data"></i>
                            </button>
                        </a>
                        <form method="POST"
                            action="{{ route('surat.destroy', Crypt::encryptString($detailDataSurat->id_surat)) }}"
                            class="tombol-hapus">
                            @csrf
                            @method('DELETE')
                            <a href="#" class="text-white ml-2 tombol-hapus">
                                <button type="button" class="btn btn-danger tombol-hapus" data-toggle="tooltip"
                                    data-placement="top" title="Hapus Data Surat Masuk"
                                    data-original-title="Hapus Data Surat Masuk">
                                    <i class="bi bi-trash btn-tambah-data tombol-hapus"></i>
                                </button>
                            </a>
                        </form>
                    </div>
                </div>
                <div class="card-body ">
                    <form action="/surat" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class=" col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group ">
                                            <label for="id_klasifikasi">Nomor Klasifikasi: </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-list-ol"></i>
                                                    </div>
                                                </div>
                                                <select
                                                    class="form-control select2  @error('id_klasifikasi') is-invalid @enderror "
                                                    id="id_klasifikasi" name="id_klasifikasi" disabled>
                                                    <option selected disabled>Pilih Nomor Klasifikasi</option>
                                                    <option value="{{ $detailDataSurat->id_klasifikasi }}" selected>
                                                        {{ $detailDataSurat->klasifikasi->nama_klasifikasi }} |
                                                        {{ $detailDataSurat->klasifikasi->nomor_klasifikasi }}
                                                    </option>
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
                                            <label for="nomor_surat">Nomor Surat: </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-list-ol"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control capitalize @error('nomor_surat') is-invalid @enderror"
                                                    value="{{ $detailDataSurat->nomor_surat }}" id="nomor_surat"
                                                    name="nomor_surat" readonly>
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
                                                    value="{{ $detailDataSurat->tanggal_surat }}" id="tanggal_surat"
                                                    name="tanggal_surat" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="isi_surat">Isi Surat: </label>
                                            <textarea class="summernote-simple summernote-disable @error('isi_surat') is-invalid @enderror"
                                                placeholder="ex: Perihal rapat paripurna" id="isi_surat" name="isi_surat" readonly> {{ $detailDataSurat->isi_surat }} </textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group ">
                                            <label for="status_verifikasi">Verifikasi Surat: </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend ">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-patch-question-fill"></i>
                                                    </div>
                                                </div>
                                                <select
                                                    class="form-control select2  @error('status_verifikasi') is-invalid @enderror "
                                                    id="status_verifikasi" name="status_verifikasi" disabled>
                                                    <option selected disabled>Pilih Sifat Surat</option>
                                                    <option value="0"
                                                        {{ $detailDataSurat->status_verifikasi === '0' ? 'selected' : '' }}>
                                                        Belum Terverifikasi</option>
                                                    <option value="1"
                                                        {{ $detailDataSurat->status_verifikasi === '1' ? 'selected' : '' }}>
                                                        Terverifikasi</option>
                                                    <option value="2"
                                                        {{ $detailDataSurat->status_verifikasi == '2' ? 'selected' : '' }}>
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
                                            <textarea class="summernote-simple summernote-disable @error('catatan_verifikasi') is-invalid @enderror"
                                                placeholder="ex: Perihal rapat paripurna" id="catatan_verifikasi" name="catatan_verifikasi" required> {{ $detailDataSurat->catatan_verifikasi }} </textarea>
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
                                                    value="{{ $instansiList->nama_instansi }}" id="id_instansi"
                                                    name="id_instansi" readonly>
                                            </div>
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
                                                <input type="text"
                                                    class="form-control @error('id_user') is-invalid @enderror"
                                                    value="{{ $detailDataSurat->user->nama }} | {{ $detailDataSurat->user->jabatan }}"
                                                    id="id_user" name="id_user" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <div class=" ">
                                    <a type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                        title="Preview surat (PDF)" data-original-title="Preview surat (PDF)"
                                        href="{{ asset('document_save/' . $detailDataSurat->scan_dokumen) }}"
                                        target="_blank" title="Read PDF"><i class="bi bi-file-pdf"
                                            style="font-size: 1.1rem;"></i></a>
                                    <a href="/surat" class="btn btn-warning  ">
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

    <!-- Modal Verifikasi Surat -->
    <div class="modal fade verifikasi-modal" id="verifikasi-modal{{ $detailDataSurat->id_surat }}"
        aria-labelledby="verifikasi-modal{{ $detailDataSurat->id_surat }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header border-bottom pb-4">
                    <h5 class="modal-title" id="verifikasi-modal">Verifikasi Data surat untuk di Disposisikan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/surat-verifikasi/{{ $detailDataSurat->id_surat }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id_surat" value="{{ $detailDataSurat->id_surat }}" hidden
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
                                        placeholder="ex: 090/1928-TU/2023" value="{{ $detailDataSurat->nomor_surat }}"
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
                                        class="form-control capitalize @error('tanggal_surat') is-invalid @enderror"
                                        placeholder="ex:  11/14/2023" value="{{ $detailDataSurat->tanggal_surat }}"
                                        id="tanggal_surat" name="tanggal_surat" readonly>
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
                                    placeholder="ex: Perihal rapat paripurna" id="isi_surat" name="isi_surat" readonly> {{ $detailDataSurat->isi_surat }} </textarea>
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
                                    <input type="text" class="form-control @error('id_instansi') is-invalid @enderror"
                                        value="{{ $detailDataSurat->instansi->nama_instansi }}" id="id_instansi"
                                        readonly>
                                    <input type="text" name="id_instansi" value="{{ $detailDataSurat->id_instansi }}"
                                        hidden id="">
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
                                        value="{{ $detailDataSurat->user->nama }}" id="id_user" readonly>
                                    <input type="text" name="id_user" value="{{ $detailDataSurat->id_user }}" hidden
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
                                        id="status_verifikasi" name="status_verifikasi" required style="width: 100%;">
                                        <option selected disabled>Pilih Sifat Surat</option>
                                        <option value="0"
                                            {{ $detailDataSurat->status_verifikasi === '0' ? 'selected' : '' }}>
                                            Belum Terverifikasi</option>
                                        <option value="1"
                                            {{ $detailDataSurat->status_verifikasi === '1' ? 'selected' : '' }}>
                                            Terverifikasi</option>
                                        <option value="2"
                                            {{ $detailDataSurat->status_verifikasi == '2' ? 'selected' : '' }}>
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
                                    placeholder="ex: Perihal rapat paripurna" id="catatan_verifikasi" name="catatan_verifikasi" readonly> {{ $detailDataSurat->catatan_verifikasi }} </textarea>
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
    {{-- End Verifikasi Surat --}}

    <!-- Modal Ajukan Instansi -->
    <div class="modal fade ajukan-modal" id="ajukan-modal{{ $detailDataSurat->id_surat }}"
        aria-labelledby="ajukan-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header border-bottom pb-4">
                    <h5 class="modal-title" id="ajukan-modal">Ajukan Data surat untuk di Disposisikan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('disposisi.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id_surat" value="{{ $detailDataSurat->id_surat }}" hidden
                        id="">
                    <input type="text" name="id_user" value="{{ Auth::user()->id_user }}" hidden id="">
                    <div class="row px-4 pt-4">
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
                                        placeholder="ex: 090/1928-TU/2023" value="{{ $detailDataSurat->nomor_surat }}"
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
                                        placeholder="ex: 090/1928-TU/2023" value="{{ old('nomor_agenda') }}"
                                        id="nomor_agenda">
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
                                        value="{{ $detailDataSurat->instansi->nama_instansi }}" id="id_instansi"
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
                                <label for="tanggal_terima">Tanggal Diterima: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-secondary">
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
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="tanggal_disposisi">Tanggal Surat: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-secondary">
                                            <i class="bi bi-calendar3"></i>
                                        </div>
                                    </div>
                                    <input type="date"
                                        class="form-control capitalize @error('tanggal_disposisi') is-invalid @enderror"
                                        placeholder="ex:  11/14/2023" value="{{ $detailDataSurat->tanggal_surat }}"
                                        id="tanggal_disposisi" name="tanggal_disposisi" disabled>
                                </div>
                                <span class="text-danger">
                                    @error('tanggal_disposisi')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="capitalize" for="tujuan_disposisi">Kepada:
                                </label>
                                <div class="input-group">
                                    <select class="form-control select2  @error('tujuan_disposisi') is-invalid @enderror "
                                        id="tujuan_disposisi" name="tujuan_disposisi" required style="width: 100%;">
                                        <option disabled>Pilih Tujuan Disposisi</option>
                                        <option value="0" {{ old('tujuan_disposisi') === '0' ? 'selected' : '' }}>
                                            Kepala Sekolah</option>
                                        <option value="1" {{ old('tujuan_disposisi') === '1' ? 'selected' : '' }}>
                                            Wakil Kepala Sekolah</option>
                                        <option value="2" {{ old('tujuan_disposisi') == '2' ? 'selected' : '' }}>
                                            Kurikulum</option>
                                        <option value="3" {{ old('tujuan_disposisi') == '3' ? 'selected' : '' }}>
                                            Kesiswaan</option>
                                        <option value="4" {{ old('tujuan_disposisi') == '4' ? 'selected' : '' }}>
                                            Sarana Prasarana</option>
                                        <option value="5" {{ old('tujuan_disposisi') == '5' ? 'selected' : '' }}>
                                            Kepala Jurusan</option>
                                        <option value="6" {{ old('tujuan_disposisi') == '6' ? 'selected' : '' }}>
                                            Hubin</option>
                                        <option value="7" {{ old('tujuan_disposisi') == '7' ? 'selected' : '' }}>
                                            Bimbingan Konseling</option>
                                        <option value="8" {{ old('tujuan_disposisi') == '8' ? 'selected' : '' }}>
                                            Guru Umum</option>
                                        <option value="9" {{ old('tujuan_disposisi') == '9' ? 'selected' : '' }}>
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
                        <div class="col-12">
                            <div class="form-group">
                                <label for="isi_surat">Perihal Surat: </label>
                                <textarea class="summernote-simple summernote-disable @error('isi_surat') is-invalid @enderror"
                                    placeholder="ex: Perihal rapat paripurna" id="isi_surat" name="isi_surat" readonly> {{ $detailDataSurat->isi_surat }} </textarea>
                                <span class="text-danger">
                                    @error('isi_surat')
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
                                    <select class="form-control select2  @error('status_disposisi') is-invalid @enderror "
                                        id="status_disposisi" name="status_disposisi" readonly style="width: 100%;">
                                        <option selected disabled>Pilih Status Surat</option>
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
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="capitalize" for="sifat_disposisi">Sifat Disposisi: </label>
                                <div class="input-group">
                                    <select class="form-control select2  @error('sifat_disposisi') is-invalid @enderror "
                                        id="sifat_disposisi" name="sifat_disposisi" required style="width: 100%;">
                                        <option selected disabled>Pilih Sifat Surat</option>
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
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="capitalize" for="tujuan_disposisi">Tujuan Disposisi:
                                </label>
                                <div class="input-group">
                                    <select class="form-control select2  @error('tujuan_disposisi') is-invalid @enderror "
                                        id="tujuan_disposisi" name="tujuan_disposisi[]" multiple="" required
                                        style="width: 100%;">
                                        <option disabled>Pilih Tujuan Disposisi</option>
                                        <option value="0" {{ old('tujuan_disposisi') === '0' ? 'selected' : '' }}>
                                            Kepala Sekolah</option>
                                        <option value="1" {{ old('tujuan_disposisi') === '1' ? 'selected' : '' }}>
                                            Wakil Kepala Sekolah</option>
                                        <option value="2" {{ old('tujuan_disposisi') == '2' ? 'selected' : '' }}>
                                            Kurikulum</option>
                                        <option value="3" {{ old('tujuan_disposisi') == '3' ? 'selected' : '' }}>
                                            Kesiswaan</option>
                                        <option value="4" {{ old('tujuan_disposisi') == '4' ? 'selected' : '' }}>
                                            Sarana Prasarana</option>
                                        <option value="5" {{ old('tujuan_disposisi') == '5' ? 'selected' : '' }}>
                                            Kepala Jurusan</option>
                                        <option value="6" {{ old('tujuan_disposisi') == '6' ? 'selected' : '' }}>
                                            Hubin</option>
                                        <option value="7" {{ old('tujuan_disposisi') == '7' ? 'selected' : '' }}>
                                            Bimbingan Konseling</option>
                                        <option value="8" {{ old('tujuan_disposisi') == '8' ? 'selected' : '' }}>
                                            Guru Umum</option>
                                        <option value="9" {{ old('tujuan_disposisi') == '9' ? 'selected' : '' }}>
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
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="capitalize" for="id_user">Pengirim Ajuan: </label>
                                <div class="input-group">
                                    <select class="form-control select2  @error('id_user') is-invalid @enderror "
                                        id="id_user" name="id_user" required readonly style="width: 100%;">
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
                            Ajukan Data <i class="bi bi-clipboard-check-fill ml-3"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Ajukan Instansi --}}
@endsection


@section('script')
    <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>

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

        document.body.addEventListener("click", function(event) {
            const element = event.target;

            if (element.classList.contains("tombol-hapus")) {
                swal({
                        title: 'Apakah anda yakin?',
                        text: 'Ingin menghapus data surat ini?',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            swal('Data surat berhasil dihapus!', {
                                icon: 'success',
                            });
                            element.closest('form').submit();
                        } else {
                            swal('Data surat tidak jadi dihapus!');
                        }
                    })
                    .catch(error => {
                        // Handle any errors here
                        console.error('Error:', error);
                    });
            }
        });
    </script>
@endsection
