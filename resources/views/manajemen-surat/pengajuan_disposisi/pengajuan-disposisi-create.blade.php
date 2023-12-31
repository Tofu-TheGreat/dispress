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
                    <div class="col-md-7 col-sm-12">
                        <h4 class="text-dark judul-page">Manajemen Surat Masuk</h4>
                    </div>
                    {{-- Akhir judul Page --}}
                    {{-- Breadcrumb --}}
                    <div class="col-md-5 col-sm-12 text-center items-center mt-2 ">
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
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <span data-toggle="tooltip" data-placement="top"
                                title="Ini adalah data surat yang akan Didisposisikan."
                                data-original-title="Ini adalah data surat yang akan Didisposisikan." disabled>
                                <i class="bi bi-question-circle"></i>
                            </span>
                            <div class="col">
                                <h4 class="text-primary">Data Surat</h4>
                            </div>
                            <div class="col d-flex justify-content-end btn-group">
                                {{-- Button Triger Filter --}}
                                <span data-toggle="tooltip" data-placement="top" title="Detail Surat."
                                    data-original-title="Detail Surat." disabled>
                                    <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                                            class="fas fa-minus"></i></a>
                                </span>
                                {{-- Akhir Button Triger Filter --}}
                            </div>
                        </div>
                        <div class="collapse show " id="mycard-collapse">
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
                                            value="" id="nomor_surat" name="nomor_surat" readonly>
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
                                            class="form-control @error('tanggal_surat') is-invalid @enderror" value=""
                                            id="tanggal_surat" name="tanggal_surat" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="isi_surat">Isi Surat: </label>
                                        <a type="button" class="btn btn-danger btn-preview mb-2" data-toggle="tooltip"
                                            data-placement="top" title="Preview surat (PDF)"
                                            data-original-title="Preview surat (PDF)" href="" target="_blank"
                                            title="Read PDF"><i class="bi bi-file-pdf" style="font-size: 1.1rem;"></i></a>
                                    </div>
                                    <textarea class="summernote-simple summernote-disable @error('isi_surat') is-invalid @enderror"
                                        placeholder="ex: Perihal rapat paripurna" id="isi_surat" name="isi_surat" readonly>  </textarea>
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
                                        <select class="form-control  @error('status_verifikasi') is-invalid @enderror "
                                            id="status_verifikasi" name="status_verifikasi" disabled>
                                            <option selected disabled></option>
                                            <option value="0">
                                                Belum Terverifikasi</option>
                                            <option value="1">
                                                Terverifikasi</option>
                                            <option value="2">
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
                                            class="form-control @error('id_instansi') is-invalid @enderror" value=""
                                            id="id_instansi" name="id_instansi" readonly>
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
                                                <select
                                                    class="form-control select2  @error('id_surat') is-invalid @enderror "
                                                    id="id_surat" name="id_surat" required>
                                                    <option selected disabled>Pilih Nomor Surat</option>
                                                    @foreach ($suratList as $data)
                                                        <option value="{{ $data->id_surat }}"
                                                            {{ old('id_surat') == $data->id_surat ? 'selected' : '' }}>
                                                            {{ $data->nomor_surat }} |
                                                            {{ $data->instansi->nama_instansi }}
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
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="capitalize" for="tanggal_terima">Masukkan Tanggal Terima:
                                            </label>
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
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="catatan_pengajuan">Masukkan Catatan Pengajuan: </label>
                                            <textarea class="summernote-simple @error('catatan_pengajuan') is-invalid @enderror" id="catatan_pengajuan"
                                                name="catatan_pengajuan" required> {{ old('catatan_pengajuan') }} </textarea>
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
        $(document).ready(function() {
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

            $('.summernote-simple').summernote({
                dialogsInBody: true,
                minHeight: 120,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['para', ['paragraph']]
                ]
            });

            $('.summernote-disable').next().find(".note-editable").attr("contenteditable", false);

            // Delegasi event change untuk elemen dengan ID 'id_surat'
            $(document).on('change', '#id_surat', function() {
                // Mendapatkan nilai yang dipilih dari dropdown
                const selectedValue = $(this).val();

                // Mendapatkan data terkait dari dropdown yang dipilih
                const selectedSurat = {!! json_encode($suratList) !!}.find(function(item) {
                    return item.id_surat == selectedValue;
                });

                // Mengisi nilai pada elemen dengan ID 'nomor_surat' dan 'tanggal_surat'
                $('#nomor_surat').val(selectedSurat ? selectedSurat.nomor_surat : '');
                var tanggalSuratValue = selectedSurat ? selectedSurat.tanggal_surat : '';

                // Format the date using moment.js
                var formattedTanggalSurat = moment(tanggalSuratValue).format('DD-MMMM-YYYY');

                // Set the formatted date to the textarea
                $('#tanggal_surat').val(formattedTanggalSurat);

                // Menetapkan nilai pada elemen dengan ID 'isi_surat', 'status_verifikasi', dan 'id_instansi'
                const isiSuratValue = selectedSurat ? selectedSurat.isi_surat : '';
                $('#isi_surat').summernote('code', isiSuratValue);

                $('#status_verifikasi').val(selectedSurat ? selectedSurat.status_verifikasi : '').trigger(
                    'change');
                $('#id_instansi').val(selectedSurat && selectedSurat.instansi ? selectedSurat.instansi
                    .nama_instansi : '');

                // Menetapkan href pada elemen dengan class 'btn-danger'
                const fileSurat = selectedSurat ? selectedSurat.scan_dokumen : '';

                const suratURL = `{{ asset('document_save/') }}/${fileSurat}`;

                $('.btn-preview').attr('href', fileSurat ? suratURL : '#');
            });
        });
    </script>

    <script>
        // Mendapatkan elemen dengan class tertentu
        const mycardCollapse = document.querySelector(".collapse");

        // Menghapus kelas 'show' jika lebar layar kurang dari atau sama dengan 991px
        if (window.innerWidth <= 991) {
            mycardCollapse.classList.toggle("show");
        }

        // Mengambil data klasifikasiList dari PHP
        const klasifikasiList = {!! json_encode($klasifikasiList) !!};

        $(document).ready(function() {

            // Delegasi event change untuk elemen dengan ID 'id_klasifikasi' di dalam modal
            $(document).on('change', '#id_klasifikasi', function() {
                const selectedValue = $(this).val();

                // Simpan nilai awal nomor_agenda
                const nomorAgendaInput = $('#nomor_agenda').val();

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

                // Contoh: Menetapkan nilai ke elemen dengan ID 'nomor_agenda'
                $('#nomor_agenda').val(selectedKlasifikasi ? nomorAgendaBaru : '');
            });
        });

        $(document).ready(function() {
            $('.phone').inputmask('9999-9999-99999');

            $('#nip').inputmask('999999999999999999');
        });
    </script>
@endsection
