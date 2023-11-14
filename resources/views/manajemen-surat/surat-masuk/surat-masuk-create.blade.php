@extends('admin.pages.layout')

@section('css')
    <link href="{{ asset('assets-landing-page/extension/filepond/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.css') }}">
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
                        <h4 class="text-dark judul-page">Manajemen Surat Masuk</h4>
                    </div>
                    {{-- Akhir judul Page --}}
                    {{-- Breadcrumb --}}
                    <div class="col-md-4 col-sm-12 text-center items-center mt-2 ">
                        <div class="breadcrumb-item d-inline active"><a href="/dashboard">Dashboard</a></div>
                        <div class="breadcrumb-item d-inline active"><a href="/surat-masuk">Surat Masuk</a></div>
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
                                <a href="/surat-masuk">
                                    <i class="bi bi-arrow-left"></i>
                                </a>
                            </div>
                            <div class="col-">
                                <h4 class="text-primary">Tambah Data Surat Masuk</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <form action="{{ route('surat.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class=" col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group ">
                                        <label for="nomor_surat">Masukkan Nomor Surat: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('nomor_surat') is-invalid @enderror"
                                                placeholder="ex: 090/1928-TU/2023" value="{{ old('nomor_surat') }}"
                                                id="nomor_surat" name="nomor_surat" required autofocus>
                                        </div>
                                        <span class="text-danger">
                                            @error('nomor_surat')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class=" col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="capitalize" for="tanggal_surat">Masukkan Tanggal Surat: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-calendar3"></i>
                                                </div>
                                            </div>
                                            <input type="date"
                                                class="form-control datepicker tanggal_surat @error('tanggal_surat') is-invalid @enderror"
                                                placeholder="ex: 11/14/2023" value="{{ old('tanggal_surat') }}"
                                                id="tanggal_surat" name="tanggal_surat" required>
                                        </div>
                                        <span class="text-danger">
                                            @error('tanggal_surat')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="isi_surat">Masukkan Isi Surat: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-envelope-paper-fill"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('isi_surat') is-invalid @enderror"
                                                placeholder="ex: Perihal rapat paripurna" value="{{ old('isi_surat') }}"
                                                id="isi_surat" name="isi_surat" required>
                                        </div>
                                        <span class="text-danger">
                                            @error('isi_surat')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="capitalize" for="id_perusahaan">Pengirim Surat: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-person-rolodex"></i>
                                                </div>
                                            </div>
                                            <select
                                                class="form-control select2  @error('id_perusahaan') is-invalid @enderror "
                                                id="id_perusahaan" name="id_perusahaan" required>
                                                <option selected disabled>Pilih Pengirim Surat</option>
                                                @foreach ($perusahaanList as $data)
                                                    <option value="{{ $data->id_perusahaan }}"
                                                        {{ old('id_perusahaan') == $data->id_perusahaan ? 'selected' : '' }}>
                                                        {{ $data->nama_perusahaan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class="text-danger">
                                            @error('level')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <input type="id_user" class="form-control @error('id_user') is-invalid @enderror"
                                    placeholder="ex: contoh@gmail.com" value="{{ Auth::user()->id_user }}" id="id_user"
                                    name="id_user" hidden>
                            </div>
                            <div class="form-group">
                                <label for="foto">Masukkan Scan Dokumen Surat: </label>
                                <small class="d-block">Catatan: masukkan foto dengan format (PDF),
                                    maksimal 10
                                    MB.</small>
                                <input type="file"
                                    class="img-filepond-preview @error('scan_dokumen') is-invalid @enderror"
                                    id="scan_dokumen" name="scan_dokumen" accept="pdf">
                                <span class="text-danger">
                                    @error('scan_dokumen')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <div class="row d-flex justify-content-end">
                                    <div class="ml-2 ">
                                        <a href="/surat-masuk" class="btn btn-warning  ">
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
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.phone').inputmask('9999-9999-99999');

            $('#nip').inputmask('999999999999999999');
        });
    </script>
@endsection
