@extends('admin.pages.layout')

@section('css')
    <link href="{{ asset('assets-landing-page/extension/filepond/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link href="{{ asset('assets-landing-page/extension/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
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
                        <div class="breadcrumb-item d-inline active"><a href="/surat-tugas">Surat Tugas</a></div>
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
                                <a href="/surat-tugas">
                                    <i class="bi bi-arrow-left"></i>
                                </a>
                            </div>
                            <div class="col-">
                                <h4 class="text-primary">Tambah Data Surat Tugas</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <form action="{{ route('surat-tugas.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="id_user" id="" hidden value="{{ Auth::user()->id_user }}">

                            <div class="row">
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
                                        <label for="nomor_surat_tugas">Masukkan Nomor Surat: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('nomor_surat_tugas') is-invalid @enderror"
                                                placeholder="ex: 090/1928-TU/2023" value="{{ old('nomor_surat_tugas') }}"
                                                id="nomor_surat_tugas" name="nomor_surat_tugas" required autofocus>
                                        </div>
                                        <span class="text-danger">
                                            @error('nomor_surat_tugas')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class=" col-12">
                                    <div class="form-group ">
                                        <label for="id_surat">Nomor Surat Masuk (optional): </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <select class="form-control select2  @error('id_surat') is-invalid @enderror "
                                                id="id_surat" name="id_surat">
                                                <option selected disabled>Pilih Nomor Surat Masuk</option>
                                                @foreach ($suratMasukList as $data)
                                                    <option value="{{ $data->id_surat }}"
                                                        {{ old('id_surat') == $data->id_surat ? 'selected' : '' }}>
                                                        {{ $data->nomor_surat }} | {{ $data->isi_surat }}
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
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="dasar">Masukkan Dasar/Perihal tugas: </label>
                                        <textarea class="summernote @error('dasar') is-invalid @enderror" placeholder="ex: Perihal rapat paripurna"
                                            id="dasar" name="dasar" required> {{ old('dasar') }} </textarea>
                                        <span class="text-danger">
                                            @error('dasar')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="capitalize" for="id_user_penerima">Pilih Penerima Tugas :
                                        </label>
                                        <div class="input-group">
                                            <select
                                                class="form-control select2  @error('id_user_penerima') is-invalid @enderror "
                                                id="id_user_penerima" name="id_user_penerima[]" multiple=""
                                                style="width: 100%;">
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
                                            @error('id_user_penerima')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group ">
                                        <label for="tujuan_pelaksanaan">Masukkan Tujuan Pelaksanaan Tugas: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('tujuan_pelaksanaan') is-invalid @enderror"
                                                placeholder="ex: Undangan Rapat" value="{{ old('tujuan_pelaksanaan') }}"
                                                id="tujuan_pelaksanaan" name="tujuan_pelaksanaan" required autofocus>
                                        </div>
                                        <span class="text-danger">
                                            @error('tujuan_pelaksanaan')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="tempat_pelaksanaan">Masukkan Tempat Pelaksanaan Tugas: </label>
                                        <textarea class="summernote @error('tempat_pelaksanaan') is-invalid @enderror"
                                            placeholder="ex: Perihal rapat paripurna" id="tempat_pelaksanaan" name="tempat_pelaksanaan" required> {{ old('tempat_pelaksanaan') }} </textarea>
                                        <span class="text-danger">
                                            @error('tempat_pelaksanaan')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <!-- Formulir untuk kolom 'tanggal_selesai' -->
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="capitalize" for="tanggal_mulai">Masukkan Tanggal Mulai Tugas:
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="date"
                                                class="form-control datepicker tanggal_mulai @error('tanggal_mulai') is-invalid @enderror"
                                                placeholder="ex: 11/14/2023" value="{{ old('tanggal_mulai') }}"
                                                id="tanggal_mulai" name="tanggal_mulai" required>
                                        </div>
                                        <span class="text-danger">
                                            @error('tanggal_mulai')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <!-- Formulir untuk kolom 'tempat_pelaksanaan' -->
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="capitalize" for="tanggal_selesai">Masukkan Tanggal Mulai Tugas:
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-calendar3"></i>
                                                </div>
                                            </div>
                                            <input type="date"
                                                class="form-control datepicker tanggal_selesai @error('tanggal_selesai') is-invalid @enderror"
                                                placeholder="ex: 11/14/2023" value="{{ old('tanggal_selesai') }}"
                                                id="tanggal_selesai" name="tanggal_selesai" required>
                                        </div>
                                        <span class="text-danger">
                                            @error('tanggal_selesai')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <!-- Formulir untuk kolom 'tembusan' -->
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="capitalize" for="waktu_mulai">Masukkan Waktu Mulai Tugas:
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-clock-fill"></i>
                                                </div>
                                            </div>
                                            <input type="time"
                                                class="form-control waktu_mulai @error('waktu_mulai') is-invalid @enderror"
                                                placeholder="ex: 10:20 AM" value="{{ old('waktu_mulai') }}"
                                                id="waktu_mulai" name="waktu_mulai" required>
                                        </div>
                                        <span class="text-danger">
                                            @error('waktu_mulai')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="capitalize" for="waktu_selesai">Masukkan Waktu Mulai Tugas:
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-clock-fill"></i>
                                                </div>
                                            </div>
                                            <input type="time"
                                                class="form-control waktu_selesai @error('waktu_selesai') is-invalid @enderror"
                                                placeholder="ex: 12:20 PM" value="{{ old('waktu_selesai') }}"
                                                id="waktu_selesai" name="waktu_selesai" required>
                                        </div>
                                        <span class="text-danger">
                                            @error('waktu_selesai')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="tembusan">Masukkan Tembusan: </label>
                                        <textarea class="summernote @error('tembusan') is-invalid @enderror" placeholder="ex: Perihal rapat paripurna"
                                            id="tembusan" name="tembusan" required> {{ old('tembusan') }} </textarea>
                                        <span class="text-danger">
                                            @error('tembusan')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>


                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <div class="row d-flex justify-content-end">
                                    <div class="ml-2 ">
                                        <a href="/surat-tugas" class="btn btn-warning  ">
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
    <script src="{{ asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>

    <script>
        // Mengambil data klasifikasiList dari PHP
        const klasifikasiList = {!! json_encode($klasifikasiList) !!};

        $(document).ready(function() {

            // Delegasi event change untuk elemen dengan ID 'id_klasifikasi' di dalam modal
            $(document).on('change', '#id_klasifikasi', function() {
                const selectedValue = $(this).val();

                // Simpan nilai awal nomor_surat_tugas
                const nomorSuratInput = $('#nomor_surat_tugas').val();

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

                // Contoh: Menetapkan nilai ke elemen dengan ID 'nomor_surat_tugas'
                $('#nomor_surat_tugas').val(selectedKlasifikasi ? nomorSuratBaru : '');
            });

            // Mengambil data suratMasukList dari PHP
            const suratMasukList = {!! json_encode($suratMasukList) !!};

            // Handle pengisian field 'Dasar' setelah pilih surat masuk
            $(document).on('change', '#id_surat', function() {
                const selectedValue = $(this).val();

                // Simpan nilai awal field 'dasar'
                const dasarSummernoteField = $('#dasar').val();

                // Menggunakan suratMasukList di sini
                // Contoh: Menampilkan data terkait dengan nilai terpilih
                const selectedSuratMasuk = suratMasukList.find(function(item) {
                    return item.id_surat == selectedValue;
                });

                const pengirim = selectedSuratMasuk ? selectedSuratMasuk.instansi.nama_instansi : '';
                const nomorSurat = selectedSuratMasuk ? selectedSuratMasuk.nomor_surat : '';
                const tanggalSurat = selectedSuratMasuk ? selectedSuratMasuk.tanggal_surat : '';
                const perihal = selectedSuratMasuk ? selectedSuratMasuk.isi_surat : '';

                const dasarBaru =
                    `Surat dari ${pengirim}, nomor ${nomorSurat}, tanggal ${moment(tanggalSurat).format('DD-MMMM-YYYY')}, perihal: ${perihal},  untuk`;

                $('#dasar').summernote('code', dasarBaru);

                const tempatPelaksanaan = selectedSuratMasuk ? selectedSuratMasuk.instansi.alamat_instansi :
                    '';
                $('#tempat_pelaksanaan').summernote('code', tempatPelaksanaan);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.phone').inputmask('9999-9999-99999');

            // Tambahkan placeholder setelah inisialisasi
            // Inisialisasi Summernote
            $('#dasar').summernote({
                placeholder: 'ex: <br> Surat dari Badan Pengelolaan Keuangan dan Aset Daerah Provinsi Banten, nomor 005/1474/IPKAD 04/2023, tanggal 9 Oktober 2023,perihal: Persediaan Triwulan III Tahun 2023, untuk kepentingan dinas Kepala Sekolah SMKN 1 Tangerang',
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

            $('#tempat_pelaksanaan').summernote({
                placeholder: 'ex: <br> Jl. Veteran No.1A, RT.005/RW.002, Babakan, Kec. Tangerang, Kota Tangerang, Banten 15118',
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

        });
    </script>
@endsection
