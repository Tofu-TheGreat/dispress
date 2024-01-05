@extends('admin.pages.layout')

@section('css')
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
                        <div class="breadcrumb-item d-inline active"><a href="/pengajuan-disposisi">Pengajuan Diposisi</a>
                        </div>
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
                                    <a data-collapse="#mycard-collapse{{ $editDataPengajuan->id_pengajuan }}"
                                        class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                                </span>
                                {{-- Akhir Button Triger Filter --}}
                            </div>
                        </div>
                        <div class="collapse show " id="mycard-collapse{{ $editDataPengajuan->id_pengajuan }}">
                            <div class="col-12 ">
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
                                            value="{{ $editDataPengajuan->surat->nomor_surat }}" id="nomor_surat"
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
                                            value="{{ date('d-F-Y', strtotime($editDataPengajuan->surat->tanggal_surat)) }}"
                                            id="tanggal_surat" name="tanggal_surat" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="isi_surat">Isi Surat: </label>
                                        <a type="button" class="btn btn-danger mb-2" data-toggle="tooltip"
                                            data-placement="top" title="Preview surat (PDF)"
                                            data-original-title="Preview surat (PDF)"
                                            href="{{ asset('document_save/' . $editDataPengajuan->surat->scan_dokumen) }}"
                                            target="_blank" title="Read PDF"><i class="bi bi-file-pdf"
                                                style="font-size: 1.1rem;"></i></a>
                                    </div>
                                    <textarea class="summernote-simple summernote-disable @error('isi_surat') is-invalid @enderror"
                                        placeholder="ex: Perihal rapat paripurna" id="isi_surat" name="isi_surat" readonly> {{ $editDataPengajuan->surat->isi_surat }} </textarea>
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
                                            <option selected disabled>Pilih Sifat Surat</option>
                                            <option value="0"
                                                {{ $editDataPengajuan->surat->status_verifikasi === '0' ? 'selected' : '' }}>
                                                Belum Terverifikasi</option>
                                            <option value="1"
                                                {{ $editDataPengajuan->surat->status_verifikasi === '1' ? 'selected' : '' }}>
                                                Terverifikasi</option>
                                            <option value="2"
                                                {{ $editDataPengajuan->surat->status_verifikasi == '2' ? 'selected' : '' }}>
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
                                            value="{{ $editDataPengajuan->surat->instansi->nama_instansi }}"
                                            id="id_instansi" name="id_instansi" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-8">
                    <div class="card">
                        <div class="row card-header">
                            <div class="col-lg-11 col-sm-8">
                                <div class="row">
                                    <a href="/pengajuan-disposisi" title="Kembali">
                                        <i class="bi bi-arrow-left mr-3"></i>
                                    </a>
                                    <h4 class="text-primary" style="max-width: max-content;">Edit Pengajuan Disposisi
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="/pengajuan-disposisi/{{ $editDataPengajuan->id_pengajuan }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="text" name="id_pengajuan" value="{{ $editDataPengajuan->id_pengajuan }}"
                                    id="" hidden>
                                <input type="text" name="id_user" value="{{ $editDataPengajuan->id_user }}"
                                    id="" hidden>
                                <input type="text" name="id_surat" value="{{ $editDataPengajuan->id_surat }}"
                                    id="" hidden>
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
                                                            id="id_klasifikasi" name="id_klasifikasi" required>
                                                            <option selected disabled>Pilih Nomor Klasifikasi</option>
                                                            @foreach ($klasifikasiList as $data)
                                                                <option value="{{ $data->id_klasifikasi }}"
                                                                    {{ $editDataPengajuan->id_klasifikasi == $data->id_klasifikasi ? 'selected' : '' }}>
                                                                    {{ $data->nama_klasifikasi }} |
                                                                    {{ $data->nomor_klasifikasi }}</option>
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
                                                    <label for="nomor_agenda">Nomor Agenda: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi bi-list-ol"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control capitalize @error('nomor_agenda') is-invalid @enderror"
                                                            placeholder="ex: 090/1928-TU/2023"
                                                            value="{{ $editDataPengajuan->nomor_agenda }}"
                                                            id="nomor_agenda" name="nomor_agenda">
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
                                                    <label for="tanggal_terima">Tanggal Terima: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi bi-calendar3"></i>
                                                            </div>
                                                        </div>
                                                        <input type="date"
                                                            class="form-control datepicker capitalize @error('tanggal_terima') is-invalid @enderror"
                                                            placeholder="ex:  11/14/2023"
                                                            value="{{ $editDataPengajuan->tanggal_terima }}"
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
                                                    <label for="catatan_pengajuan">Catatan Pengajuan: </label>
                                                    <textarea class="summernote-simple @error('catatan_pengajuan') is-invalid @enderror"
                                                        placeholder="ex: Perihal rapat paripurna" id="catatan_pengajuan" name="catatan_pengajuan" required> {{ $editDataPengajuan->catatan_pengajuan }} </textarea>
                                                    <span class="text-danger">
                                                        @error('catatan_pengajuan')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group ">
                                                    <label for="status_pengajuan">Status Pengajuan: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend ">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi bi-envelope-exclamation-fill"></i>
                                                            </div>
                                                        </div>
                                                        <select
                                                            class="form-control select2  @error('status_pengajuan') is-invalid @enderror "
                                                            id="status_pengajuan" name="status_pengajuan" required>
                                                            <option selected disabled>Pilih Status Pengajuan</option>
                                                            <option value="0"
                                                                {{ $editDataPengajuan->status_pengajuan === 'Belum Terdisposisikan' ? 'selected' : '' }}>
                                                                Belum Terdisposisikan</option>
                                                            <option value="1"
                                                                {{ $editDataPengajuan->status_pengajuan === 'Terdisposisikan' ? 'selected' : '' }}>
                                                                Sudah Terdisposisikan</option>
                                                        </select>
                                                    </div>
                                                    <span class="text-danger">
                                                        @error('status_pengajuan')
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
                                                                <i class="bi bi-person-fill "></i>
                                                            </div>
                                                        </div>
                                                        <select
                                                            class="form-control select2  @error('id_user') is-invalid @enderror "
                                                            id="id_user" name="id_user" required disabled>
                                                            <option selected disabled>Pilih Pengirim Surat</option>
                                                            @foreach ($userList as $data)
                                                                <option value="{{ $data->id_user }}"
                                                                    {{ $editDataPengajuan->id_user == $data->id_user ? 'selected' : '' }}>
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
                                                <i class="bi bi-clipboard-check-fill fs-6 mr-1"></i>
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
    <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

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
            // Simpan nilai awal nomor_agenda
            const nomorAgendaInput = $('#nomor_agenda').val();

            // Delegasi event change untuk elemen dengan ID 'id_klasifikasi' di dalam modal
            $(document).on('change', '#id_klasifikasi', function() {
                const selectedValue = $(this).val();

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
    </script>

    <script>
        $(document).ready(function() {
            $('#catatan_pengajuan').summernote({
                placeholder: 'ex: Laksanakan Rapat',
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
        })
    </script>
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
@endsection
