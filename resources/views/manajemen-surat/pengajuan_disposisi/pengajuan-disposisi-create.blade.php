@extends('admin.pages.layout')

@section('css')
    <link href="{{ asset('assets-landing-page/extension/filepond/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.css') }}">
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
                        <h4 class="text-dark judul-page">Manajemen Surat Masuk</h4>
                    </div>
                    {{-- Akhir judul Page --}}
                    {{-- Breadcrumb --}}
                    <div class="col-md-4 col-sm-12 text-center items-center mt-2 ">
                        <div class="breadcrumb-item d-inline active"><a href="/dashboard">Dashboard</a></div>
                        <div class="breadcrumb-item d-inline active"><a href="/pengajuan-disposisi">Pengajuan Disposisi</a>
                        </div>
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
                                <a href="/pengajuan-disposisi">
                                    <i class="bi bi-arrow-left"></i>
                                </a>
                            </div>
                            <div class="col-">
                                <h4 class="text-primary">Tambah Data Pengajuan Disposisi</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <form action="{{ route('pengajuan-disposisi.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class=" col-12">
                                    <div class="form-group ">
                                        <label for="id_surat">Masukkan Nomor Surat Yang ingin Didisposisikan: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <select class="form-control select2  @error('id_surat') is-invalid @enderror "
                                                id="id_surat" name="id_surat" required>
                                                <option selected disabled>Pilih Nomor Surat</option>
                                                @foreach ($suratList as $data)
                                                    <option value="{{ $data->id_surat }}"
                                                        {{ old('id_surat') == $data->id_surat ? 'selected' : '' }}>
                                                        {{ $data->nomor_surat }} | {{ $data->instansi->nama_instansi }}
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
                                <div class=" col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group ">
                                        <label for="id_klasifikasi">Masukkan Nomor Klasifikasi: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <select
                                                class="form-control select2  @error('id_klasifikasi') is-invalid @enderror "
                                                id="id_klasifikasi" name="id_klasifikasi" required>
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
                                <div class=" col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group ">
                                        <label for="nomor_agenda">Masukkan Nomor Agenda: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('nomor_agenda') is-invalid @enderror"
                                                placeholder="ex: 090/1928-TU/2023" value="{{ old('nomor_agenda') }}"
                                                id="nomor_agenda" name="nomor_agenda" required autofocus>
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
                                        <label class="capitalize" for="tanggal_terima">Masukkan Tanggal Terima: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-calendar3"></i>
                                                </div>
                                            </div>
                                            <input type="date"
                                                class="form-control datepicker tanggal_terima @error('tanggal_terima') is-invalid @enderror"
                                                placeholder="ex: 11/14/2023" value="{{ old('tanggal_terima') }}"
                                                id="tanggal_terima" name="tanggal_terima" required>
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
                                        <label class="capitalize" for="tujuan_pengajuan">Kepada:
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                            <select
                                                class="form-control select2  @error('tujuan_pengajuan') is-invalid @enderror "
                                                id="tujuan_pengajuan" name="tujuan_pengajuan" required>
                                                <option disabled>Pilih Tujuan Disposisi</option>
                                                <option value="0"
                                                    {{ old('tujuan_pengajuan') === '0' ? 'selected' : '' }}>
                                                    Kepala Sekolah</option>
                                                <option value="1"
                                                    {{ old('tujuan_pengajuan') === '1' ? 'selected' : '' }}>
                                                    Wakil Kepala Sekolah</option>
                                                <option value="2"
                                                    {{ old('tujuan_pengajuan') == '2' ? 'selected' : '' }}>
                                                    Kurikulum</option>
                                                <option value="3"
                                                    {{ old('tujuan_pengajuan') == '3' ? 'selected' : '' }}>
                                                    Kesiswaan</option>
                                                <option value="4"
                                                    {{ old('tujuan_pengajuan') == '4' ? 'selected' : '' }}>
                                                    Sarana Prasarana</option>
                                                <option value="5"
                                                    {{ old('tujuan_pengajuan') == '5' ? 'selected' : '' }}>
                                                    Kepala Jurusan</option>
                                                <option value="6"
                                                    {{ old('tujuan_pengajuan') == '6' ? 'selected' : '' }}>
                                                    Hubin</option>
                                                <option value="7"
                                                    {{ old('tujuan_pengajuan') == '7' ? 'selected' : '' }}>
                                                    Bimbingan Konseling</option>
                                                <option value="8"
                                                    {{ old('tujuan_pengajuan') == '8' ? 'selected' : '' }}>
                                                    Guru Umum</option>
                                                <option value="9"
                                                    {{ old('tujuan_pengajuan') == '9' ? 'selected' : '' }}>
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
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="catatan_pengajuan">Masukkan Catatan Pengajuan: </label>
                                        <textarea class="summernote-simple @error('catatan_pengajuan') is-invalid @enderror"
                                            placeholder="ex: Perihal rapat paripurna" id="catatan_pengajuan" name="catatan_pengajuan" required> {{ old('catatan_pengajuan') }} </textarea>
                                        <span class="text-danger">
                                            @error('catatan_pengajuan')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <input type="id_user" class="form-control @error('id_user') is-invalid @enderror"
                                    placeholder="ex: contoh@gmail.com" value="{{ Auth::user()->id_user }}"
                                    id="id_user" name="id_user" hidden>
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
    </section>
@endsection
@section('script')
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/js/filepond.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <script>
        // Mengambil data klasifikasiList dari PHP
        const klasifikasiList = {!! json_encode($klasifikasiList) !!};

        $(document).ready(function() {
            // Delegasi event change untuk elemen dengan ID 'id_klasifikasi' di dalam modal
            $(document).on('change', '#id_klasifikasi', function() {
                const selectedValue = $(this).val();

                // Menggunakan klasifikasiList di sini
                // Contoh: Menampilkan data terkait dengan nilai terpilih
                const selectedKlasifikasi = klasifikasiList.find(function(item) {
                    return item.id_klasifikasi == selectedValue;
                });

                // Contoh: Menetapkan nilai ke elemen dengan ID 'nomor_agenda'
                $('#nomor_agenda').val(selectedKlasifikasi ? selectedKlasifikasi.nomor_klasifikasi : '');
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.phone').inputmask('9999-9999-99999');

            $('#nip').inputmask('999999999999999999');
        });
    </script>
@endsection
