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

                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="nomor_surat_tugas">Nomor Surat Tugas:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('nomor_surat_tugas') is-invalid @enderror"
                                                placeholder="ex: 090/1928-TU/2023" placeholder="Nomor Surat Tugas"
                                                value="{{ old('nomor_surat_tugas') }}" id="nomor_surat_tugas"
                                                name="nomor_surat_tugas" required autofocus>
                                        </div>
                                        <span class="text-danger">
                                            @error('nomor_surat_tugas')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <!-- Formulir untuk kolom 'id_user_penerima' (array) -->
                                <div class="col-12 ">
                                    <div class="form-group">
                                        <label for="id_user_penerima">Orang yang ditugaskan:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <select
                                                class="form-control select2  @error('id_user_penerima') is-invalid @enderror "
                                                id="id_user_penerima" multiple="" name="id_user_penerima[]" required>
                                                <option disabled>Pilih User</option>
                                                @foreach ($userList as $data)
                                                    <option value="{{ $data->id_user }}"
                                                        {{ old('id_user_penerima') == $data->id_user ? 'selected' : '' }}>
                                                        {{ $data->nama }}</option>
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

                                <!-- Formulir untuk kolom 'tanggal_mulai' -->
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="tanggal_mulai">Tanggal Mulai:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="date"
                                                class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                                placeholder="Tanggal Mulai" value="{{ old('tanggal_mulai') }}"
                                                id="tanggal_mulai" name="tanggal_mulai">
                                        </div>
                                        <span class="text-danger">
                                            @error('tanggal_mulai')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <!-- Formulir untuk kolom 'tanggal_selesai' -->
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="tanggal_selesai">Tanggal Selesai:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="date"
                                                class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                                placeholder="Tanggal Selesai" value="{{ old('tanggal_selesai') }}"
                                                id="tanggal_selesai" name="tanggal_selesai">
                                        </div>
                                        <span class="text-danger">
                                            @error('tanggal_selesai')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <!-- Formulir untuk kolom 'waktu_mulai' -->
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="waktu_mulai">Waktu Mulai:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="time"
                                                class="form-control @error('waktu_mulai') is-invalid @enderror"
                                                placeholder="Waktu Mulai" value="{{ old('waktu_mulai') }}"
                                                id="waktu_mulai" name="waktu_mulai">
                                        </div>
                                        <span class="text-danger">
                                            @error('waktu_mulai')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <!-- Formulir untuk kolom 'waktu_selesai' -->
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="waktu_selesai">Waktu Selesai:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="time"
                                                class="form-control @error('waktu_selesai') is-invalid @enderror"
                                                placeholder="Waktu Selesai" value="{{ old('waktu_selesai') }}"
                                                id="waktu_selesai" name="waktu_selesai">
                                        </div>
                                        <span class="text-danger">
                                            @error('waktu_selesai')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <!-- Formulir untuk kolom 'tempat_pelaksanaan' -->
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="tempat_pelaksanaan">Tempat Pelaksanaan:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('tempat_pelaksanaan') is-invalid @enderror"
                                                placeholder="Tempat Pelaksanaan" value="{{ old('tempat_pelaksanaan') }}"
                                                id="tempat_pelaksanaan" name="tempat_pelaksanaan">
                                        </div>
                                        <span class="text-danger">
                                            @error('tempat_pelaksanaan')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <!-- Formulir untuk kolom 'tembusan' -->
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="tembusan">Tembusan:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('tembusan') is-invalid @enderror"
                                                placeholder="Tembusan" value="{{ old('tembusan') }}" id="tembusan"
                                                name="tembusan">
                                        </div>
                                        <span class="text-danger">
                                            @error('tembusan')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="tujuan_pelaksanaan">Masukkan Tujuan Pelaksanaan: </label>
                                        <textarea class="summernote-simple @error('tujuan_pelaksanaan') is-invalid @enderror"
                                            placeholder="ex: Perihal rapat paripurna" id="tujuan_pelaksanaan" name="tujuan_pelaksanaan" required> {{ old('tujuan_pelaksanaan') }} </textarea>
                                        <span class="text-danger">
                                            @error('tujuan_pelaksanaan')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="dasar">Masukkan Dasar Surat(optional): </label>
                                        <textarea class="summernote-simple @error('dasar') is-invalid @enderror" placeholder="ex: Perihal rapat paripurna"
                                            id="dasar" name="dasar" required> {{ old('dasar') }} </textarea>
                                        <span class="text-danger">
                                            @error('dasar')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>


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
        $(document).ready(function() {
            $('.phone').inputmask('9999-9999-99999');

            $('#nip').inputmask('999999999999999999');
        });
    </script>
@endsection
