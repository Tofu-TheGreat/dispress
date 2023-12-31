@extends('admin.pages.layout')

@section('css')
    <link href="{{ asset('assets-landing-page/extension/filepond/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link href="{{ asset('assets-landing-page/extension/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
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
                        <div class="breadcrumb-item d-inline active"><a href="/surat-keluar">Surat Keluar</a></div>
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
                                <a href="/surat-keluar">
                                    <i class="bi bi-arrow-left"></i>
                                </a>
                            </div>
                            <div class="col-">
                                <h4 class="text-primary">Tambah Data Surat Keluar</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <form action="{{ route('surat-keluar.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="id_user" id="" hidden value="{{ Auth::user()->id_user }}">

                            <div class="row">
                                <div class=" col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group ">
                                        <label for="jumlah_lampiran">Masukkan Jumlah Lampiran:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('jumlah_lampiran') is-invalid @enderror"
                                                placeholder="ex: 1..2" value="{{ old('jumlah_lampiran') }}"
                                                id="jumlah_lampiran" name="jumlah_lampiran" required autofocus>
                                        </div>
                                        <span class="text-danger">
                                            @error('jumlah_lampiran')
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
                                        <label for="nomor_surat_keluar">Masukkan Nomor Surat: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('nomor_surat_keluar') is-invalid @enderror"
                                                placeholder="ex: 090/1928-TU/2023" value="{{ old('nomor_surat_keluar') }}"
                                                id="nomor_surat_keluar" name="nomor_surat_keluar" required autofocus>
                                        </div>
                                        <span class="text-danger">
                                            @error('nomor_surat_keluar')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class=" col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group ">
                                        <label for="perihal">Masukkan Perihal Surat: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('perihal') is-invalid @enderror"
                                                placeholder="ex: Undangan Rapat" value="{{ old('perihal') }}"
                                                id="perihal" name="perihal" required autofocus>
                                        </div>
                                        <span class="text-danger">
                                            @error('perihal')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="capitalize" for="tanggal_surat_keluar">Masukkan Tanggal Surat:
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-calendar3"></i>
                                                </div>
                                            </div>
                                            <input type="date"
                                                class="form-control datepicker tanggal_surat_keluar @error('tanggal_surat_keluar') is-invalid @enderror"
                                                placeholder="ex: 11/14/2023" value="{{ old('tanggal_surat_keluar') }}"
                                                id="tanggal_surat_keluar" name="tanggal_surat_keluar" required>
                                        </div>
                                        <span class="text-danger">
                                            @error('tanggal_surat_keluar')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group ">
                                        <label for="sifat_surat_keluar">Masukkan Sifat Surat: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-envelope-exclamation-fill"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('sifat_surat_keluar') is-invalid @enderror"
                                                placeholder="ex: Penting" value="{{ old('sifat_surat_keluar') }}"
                                                id="sifat_surat_keluar" name="sifat_surat_keluar" required>
                                        </div>
                                        <span class="text-danger">
                                            @error('sifat_surat_keluar')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="tujuan_surat_keluar">Masukkan Tujuan Surat: </label>
                                        <textarea class="summernote @error('tujuan_surat_keluar') is-invalid @enderror"
                                            placeholder="ex: Kepala sekolah SMMPN 1 Cimahi" id="tujuan_surat_keluar" name="tujuan_surat_keluar" required> {{ old('tujuan_surat_keluar') }} </textarea>
                                        <span class="text-danger">
                                            @error('tujuan_surat_keluar')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="isi_surat">Masukkan Isi Surat: </label>
                                        <textarea class="summernote @error('isi_surat') is-invalid @enderror" placeholder="ex: Perihal rapat paripurna"
                                            id="isi_surat" name="isi_surat" required> {{ old('isi_surat') }} </textarea>
                                        <span class="text-danger">
                                            @error('isi_surat')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="tembusan">Masukkan Tembusan (optional): </label>
                                        <textarea class="summernote @error('tembusan') is-invalid @enderror" placeholder="ex: Perihal rapat paripurna"
                                            id="tembusan" name="tembusan"> {{ old('tembusan') }} </textarea>
                                        <span class="text-danger">
                                            @error('tembusan')
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
                                        <a href="/surat-keluar" class="btn btn-warning  ">
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
    <script src="{{ asset('assets-landing-page/extension/summernote/summernote-bs4.min.js') }}"></script>
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

                // Simpan nilai awal nomor_surat_keluar
                const nomorSuratInput = $('#nomor_surat_keluar').val();

                // Menggunakan klasifikasiList di sini
                // Contoh: Menampilkan data terkait dengan nilai terpilih
                const selectedKlasifikasi = klasifikasiList.find(function(item) {
                    return item.id_klasifikasi == selectedValue;
                });

                // Ambil tiga angka pertama dari nomor_klasifikasi
                const tigaAngkaPertama = selectedKlasifikasi ? selectedKlasifikasi.nomor_klasifikasi.slice(
                    0, 3) : '';

                // Ganti tiga angka pertama di nomorSuratInput
                const nomorSuratBaru = tigaAngkaPertama + nomorSuratInput.slice(3);

                // Contoh: Menetapkan nilai ke elemen dengan ID 'nomor_surat_keluar'
                $('#nomor_surat_keluar').val(selectedKlasifikasi ? nomorSuratBaru : '');
            });
        });
    </script>

    <script>
        $('#tujuan_surat_keluar').summernote({
            placeholder: 'ex: <br> Kepala Sekolah SMKN 3 Tangerang <br> Di Tempat.',
            height: 120,
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

        $('#isi_surat').summernote({
            placeholder: 'ex: <br> Dengan hormat, Kami mengundang Anda untuk menghadiri rapat yang akan diselenggarakan oleh SMKN 4. Mohon konfirmasi kehadiran Anda pada rapat ini. Jika Anda tidak dapat hadir, harap memberitahu kami sebelumnya agar kami dapat mengatur ulang jadwal atau menyediakan materi tambahan jika diperlukan',
            height: 120,
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

        $('#tembusan').summernote({
            placeholder: 'ex: <br> 1. Kepala Sekolah <br> 2. Wakil Kepala Sekolah',
            tabsize: 2,
            height: 120,
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
    </script>

    <script>
        $(document).ready(function() {
            $('.phone').inputmask('9999-9999-99999');

            $('#nip').inputmask('999999999999999999');
        });
    </script>
@endsection
