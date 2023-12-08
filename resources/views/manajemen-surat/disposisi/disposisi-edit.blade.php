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
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12 d-flex justify-content-center position-relative">
                                <span class="position-absolute" style="top: 15%;left:0;" data-toggle="tooltip"
                                    data-placement="top"
                                    title="Ini adalah data pengajuan dan surat yang akan Didisposisikan."
                                    data-original-title="Ini adalah data surat yang akan Didisposisikan." disabled>
                                    <i class="bi bi-question-circle"></i>
                                </span>
                                <ul class="nav nav-pills" id="myTab3" role="tablist">
                                    <li class="nav-item text-center">
                                        <a class="nav-link active" id="pengajuan-data" data-toggle="tab"
                                            href="#pengajuanData" role="tab" aria-controls="pengajuanData"
                                            aria-selected="true">Pengajuan Data</a>
                                    </li>
                                    <li class="nav-item text-center">
                                        <a class="nav-link" id="surat-data" data-toggle="tab" href="#suratData"
                                            role="tab" aria-controls="suratData" aria-selected="false">Surat Data</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="pengajuanData" role="tabpanel"
                                    aria-labelledby="pengajuan-data">
                                    <div class="col-12">
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
                                                    value=" {{ $editDataDisposisi->pengajuan->nomor_agenda }}"
                                                    id="nomor_agenda" name="nomor_agenda" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
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
                                                    value="{{ $editDataDisposisi->pengajuan->tanggal_terima }}"
                                                    id="tanggal_terima" name="tanggal_terima" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="catatan_pengajuan">Catatan Pengajuan: </label>
                                            <textarea class="summernote-simple summernote-disable @error('catatan_pengajuan') is-invalid @enderror"
                                                placeholder="ex: Perihal rapat paripurna" id="catatan_pengajuan" name="catatan_pengajuan" readonly> {{ $editDataDisposisi->pengajuan->catatan_pengajuan }} </textarea>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="status_pengajuan">Status Pengajuan: </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi  bi-envelope-exclamation-fill"></i>
                                                    </div>
                                                </div>
                                                <select
                                                    class="form-control  @error('status_pengajuan') is-invalid @enderror "
                                                    id="status_pengajuan" name="status_pengajuan" disabled>
                                                    <option selected disabled></option>
                                                    <option value="0"
                                                        {{ $editDataDisposisi->pengajuan->status_pengajuan == 0 ? 'selected' : '' }}>
                                                        Belum Didisposisikan</option>
                                                    <option value="1"
                                                        {{ $editDataDisposisi->pengajuan->status_pengajuan == 1 ? 'selected' : '' }}>
                                                        Sudah Didisposisikan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="id_pengirim_pengajuan">Pengirim Pengajuan: </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi  bi-person-fill"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('id_pengirim_pengajuan') is-invalid @enderror"
                                                    value="{{ $editDataDisposisi->pengajuan->user->nama }}"
                                                    id="id_pengirim_pengajuan" name="id_pengirim_pengajuan" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="suratData" role="tabpanel" aria-labelledby="surat-data">
                                    <div class="col-12 mt-3">
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
                                                    value="{{ $editDataDisposisi->pengajuan->surat->nomor_surat }}"
                                                    id="nomor_surat" name="nomor_surat" readonly>
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
                                                    value="{{ $editDataDisposisi->pengajuan->surat->tanggal_surat }}"
                                                    id="tanggal_surat" name="tanggal_surat" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <label for="isi_surat">Isi Surat: </label>
                                                <a type="button" class="btn btn-danger btn-preview mb-2"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Preview surat (PDF)" data-original-title="Preview surat (PDF)"
                                                    href="{{ asset('document_save/' . $editDataDisposisi->pengajuan->surat->scan_dokumen) }}"
                                                    target="_blank" title="Read PDF"><i class="bi bi-file-pdf"
                                                        style="font-size: 1.1rem;"></i></a>
                                            </div>
                                            <textarea class="summernote-simple summernote-disable @error('isi_surat') is-invalid @enderror"
                                                placeholder="ex: Perihal rapat paripurna" id="isi_surat" name="isi_surat" readonly> {{ $editDataDisposisi->pengajuan->surat->isi_surat }} </textarea>
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
                                                    class="form-control  @error('status_verifikasi') is-invalid @enderror "
                                                    id="status_verifikasi" name="status_verifikasi" disabled>
                                                    <option selected disabled></option>
                                                    <option value="0"
                                                        {{ $editDataDisposisi->pengajuan->surat->status_verifikasi == 0 ? 'selected' : '' }}>
                                                        Belum Terverifikasi</option>
                                                    <option value="1"
                                                        {{ $editDataDisposisi->pengajuan->surat->status_verifikasi == 1 ? 'selected' : '' }}>
                                                        Terverifikasi</option>
                                                    <option value="2"
                                                        {{ $editDataDisposisi->pengajuan->surat->status_verifikasi == 2 ? 'selected' : '' }}>
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
                                            <label for="id_instansi">Pengirim Surat: </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-person-rolodex"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('id_instansi') is-invalid @enderror"
                                                    value="{{ $editDataDisposisi->pengajuan->surat->instansi->nama_instansi }}"
                                                    id="id_instansi" name="id_instansi" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-1 mr-3">
                                    <a href="/disposisi">
                                        <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <div class="col-">
                                    <h4 class="text-primary">Edit Data Disposisi</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <form action="{{ route('disposisi.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class=" col-12">
                                        <div class="form-group ">
                                            <label for="id_pengajuan">Nomor Agenda Yang ingin Didisposisikan:
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-list-ol"></i>
                                                    </div>
                                                </div>
                                                <select
                                                    class="form-control select2  @error('id_pengajuan') is-invalid @enderror "
                                                    id="id_pengajuan" name="id_pengajuan" disabled>
                                                    <option selected disabled>Pilih Nomor Agenda</option>
                                                    @foreach ($pengajuanList as $data)
                                                        <option value="{{ $data->id_pengajuan }}"
                                                            {{ $editDataDisposisi->id_pengajuan == $data->id_pengajuan ? 'selected' : '' }}>
                                                            {{ $data->nomor_agenda }} |
                                                            {{ $data->user->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
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
                                            <label class="capitalize" for="status_disposisi">Status Disposisi:
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi-envelope-exclamation-fill"></i>
                                                    </div>
                                                </div>
                                                <select
                                                    class="form-control select2  @error('status_disposisi') is-invalid @enderror "
                                                    id="status_disposisi" name="status_disposisi" readonly>
                                                    <option selected disabled>Pilih Status Disposisi</option>
                                                    <option value="0"
                                                        {{ $editDataDisposisi->status_disposisi === '0' ? 'selected' : '' }}>
                                                        Arsipkan</option>
                                                    <option value="1"
                                                        {{ $editDataDisposisi->status_disposisi === '1' ? 'selected' : '' }}>
                                                        Jabarkan</option>
                                                    <option value="2"
                                                        {{ $editDataDisposisi->status_disposisi === '2' ? 'selected' : '' }}>
                                                        Umumkan</option>
                                                    <option value="3"
                                                        {{ $editDataDisposisi->status_disposisi === '3' ? 'selected' : '' }}>
                                                        Laksanakan</option>
                                                    <option value="4"
                                                        {{ $editDataDisposisi->status_disposisi === '4' ? 'selected' : '' }}>
                                                        Persiapkan</option>
                                                    <option value="5"
                                                        {{ $editDataDisposisi->status_disposisi === '5' ? 'selected' : '' }}>
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
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi-envelope-exclamation"></i>
                                                    </div>
                                                </div>
                                                <select
                                                    class="form-control select2  @error('sifat_disposisi') is-invalid @enderror "
                                                    id="sifat_disposisi" name="sifat_disposisi" required>
                                                    <option selected disabled>Pilih Sifat Disposisi</option>
                                                    <option value="0"
                                                        {{ $editDataDisposisi->sifat_disposisi === '0' ? 'selected' : '' }}>
                                                        Tindaklanjuti</option>
                                                    <option value="1"
                                                        {{ $editDataDisposisi->sifat_disposisi === '1' ? 'selected' : '' }}>
                                                        Biasa</option>
                                                    <option value="2"
                                                        {{ $editDataDisposisi->sifat_disposisi == '2' ? 'selected' : '' }}>
                                                        Segera</option>
                                                    <option value="3"
                                                        {{ $editDataDisposisi->sifat_disposisi == '3' ? 'selected' : '' }}>
                                                        Penting</option>
                                                    <option value="4"
                                                        {{ $editDataDisposisi->sifat_disposisi == '4' ? 'selected' : '' }}>
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
                                        <div class="col-12 d-flex justify-content-center text-primary">Pilih
                                            Salah
                                            Satu</div>
                                        <div class="mt-2">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="jabatan" name="jenis_disposisi"
                                                    class="custom-control-input jabatan" onclick="toggleSelects()"
                                                    checked>
                                                <label class="custom-control-label" for="jabatan">Kirim
                                                    Sesuai Jabatan</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="personal" name="jenis_disposisi"
                                                    class="custom-control-input personal" onclick="toggleSelects()">
                                                <label class="custom-control-label" for="personal">Kirim
                                                    Sesuai Personal</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="form-group tujuan_disposisi_div" id="tujuan_disposisi_div">
                                            <label class="capitalize" for="tujuan_disposisi">Pilih Tujuan Disposisi
                                                (Jabatan):
                                            </label>
                                            <div class="input-group">
                                                <select
                                                    class="form-control select2  @error('tujuan_disposisi') is-invalid @enderror "
                                                    id="tujuan_disposisi" name="tujuan_disposisi[]" multiple=""
                                                    style="width: 100%;">
                                                    <option disabled>Pilih Tujuan Disposisi</option>
                                                    <option value="0"
                                                        {{ old('tujuan_disposisi') === '0' ? 'selected' : '' }}>
                                                        Kepala Sekolah</option>
                                                    <option value="1"
                                                        {{ old('tujuan_disposisi') === '1' ? 'selected' : '' }}>
                                                        Wakil Kepala Sekolah</option>
                                                    <option value="2"
                                                        {{ old('tujuan_disposisi') == '2' ? 'selected' : '' }}>
                                                        Kurikulum</option>
                                                    <option value="3"
                                                        {{ old('tujuan_disposisi') == '3' ? 'selected' : '' }}>
                                                        Kesiswaan</option>
                                                    <option value="4"
                                                        {{ old('tujuan_disposisi') == '4' ? 'selected' : '' }}>
                                                        Sarana Prasarana</option>
                                                    <option value="5"
                                                        {{ old('tujuan_disposisi') == '5' ? 'selected' : '' }}>
                                                        Kepala Jurusan</option>
                                                    <option value="6"
                                                        {{ old('tujuan_disposisi') == '6' ? 'selected' : '' }}>
                                                        Hubin</option>
                                                    <option value="7"
                                                        {{ old('tujuan_disposisi') == '7' ? 'selected' : '' }}>
                                                        Bimbingan Konseling</option>
                                                    <option value="8"
                                                        {{ old('tujuan_disposisi') == '8' ? 'selected' : '' }}>
                                                        Guru Umum</option>
                                                    <option value="9"
                                                        {{ old('tujuan_disposisi') == '9' ? 'selected' : '' }}>
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
                                        <div class="form-group id_user_div d-none" id="id_user_div">
                                            <label class="capitalize" for="id_user">Pilih Tujuan Disposisi (Personal):
                                            </label>
                                            <div class="input-group">
                                                <select
                                                    class="form-control select2  @error('id_user') is-invalid @enderror "
                                                    id="id_user" name="id_penerima[]" multiple=""
                                                    style="width: 100%;">
                                                    <option disabled>Pilih Tujuan Disposisi</option>
                                                    @foreach ($userList as $data)
                                                        <option value="{{ $data->id_user }}"
                                                            {{ old('id_user') == $data->id_user ? 'selected' : '' }}>
                                                            {{ $data->nama }} |
                                                            {{ jabatanConvert($data->jabatan, 'jabatan') }}
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
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="capitalize" for="tanggal_disposisi">Tanggal Disposisi:
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-calendar3"></i>
                                                    </div>
                                                </div>
                                                <input type="date"
                                                    class="form-control datepicker tanggal_disposisi @error('tanggal_disposisi') is-invalid @enderror"
                                                    placeholder="ex: 11/14/2023"
                                                    value="{{ $editDataDisposisi->tanggal_disposisi }}"
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
                                                placeholder="ex: Perihal rapat paripurna" id="catatan_disposisi" name="catatan_disposisi" required> {{ $editDataDisposisi->catatan_disposisi }} </textarea>
                                            <span class="text-danger">
                                                @error('catatan_disposisi')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <div class="row d-flex justify-content-end">
                                        <div class="ml-2 ">
                                            <a href="/pengajuan-disposisi" class="btn btn-warning  ">
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
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    {{-- handle disable summernote --}}
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
        })
    </script>
@endsection
