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
                        <div class="breadcrumb-item d-inline active"><a href="/surat-tugas">Surat Tugas</a></div>
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
                            <h4 class="text-primary judul-page">Detail Surat Tugas</h4>
                        </div>
                    </div>
                    <div class="col-lg-1 col-sm-4 btn-group">
                        @can('admin-officer')
                            <a href="{{ route('cetak.surat-tugas', Crypt::encryptString($detailDataSuratTugas->id_surat_tugas)) }}"
                                class="text-white ml-2" target="_blank">
                                <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                    title="Cetak Data Surat Tugas" data-original-title="Cetak Data Surat Tugas">
                                    <i class="bi bi-printer-fill btn-tambah-data"></i>
                                </button>
                            </a>
                            <a href="{{ route('surat-tugas.edit', Crypt::encryptString($detailDataSuratTugas->id_surat_tugas)) }}"
                                class="text-white ml-2">
                                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                    title="Edit Data Surat Tugas" data-original-title="Edit Data Surat Tugas">
                                    <i class="bi bi-pencil btn-tambah-data"></i>
                                </button>
                            </a>
                            <form method="POST"
                                action="{{ route('surat-tugas.destroy', Crypt::encryptString($detailDataSuratTugas->id_surat_tugas)) }}"
                                class="tombol-hapus">
                                @csrf
                                @method('DELETE')
                                <a href="#" class="text-white ml-2 tombol-hapus">
                                    <button type="button" class="btn btn-danger tombol-hapus" data-toggle="tooltip"
                                        data-placement="top" title="Hapus Data Surat Tugas"
                                        data-original-title="Hapus Data Surat Tugas">
                                        <i class="bi bi-trash btn-tambah-data tombol-hapus"></i>
                                    </button>
                                </a>
                            </form>
                        @endcan
                    </div>
                </div>
                <div class="card-body ">
                    <form action="{{ route('surat-tugas.update', $detailDataSuratTugas->id_surat_tugas) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id_user" id="" hidden value="{{ Auth::user()->id_user }}">
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
                                        <select class="form-control select2  @error('id_klasifikasi') is-invalid @enderror "
                                            id="id_klasifikasi" name="id_klasifikasi" disabled>
                                            <option selected disabled>Pilih Nomor Klasifikasi</option>
                                            @foreach ($klasifikasiList as $data)
                                                <option value="{{ $data->id_klasifikasi }}"
                                                    {{ $detailDataSuratTugas->id_klasifikasi == $data->id_klasifikasi ? 'selected' : '' }}>
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
                                    <label for="nomor_surat_tugas">Nomor Surat: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control @error('nomor_surat_tugas') is-invalid @enderror"
                                            placeholder="ex: 090/1928-TU/2023"
                                            value="{{ $detailDataSuratTugas->nomor_surat_tugas }}" id="nomor_surat_tugas"
                                            name="nomor_surat_tugas" disabled autofocus>
                                    </div>
                                    <span class="text-danger">
                                        @error('nomor_surat_tugas')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="dasar">Masukkan Dasar/Perihal tugas: </label>
                                    <textarea class="summernote-simple summernote-disable @error('dasar') is-invalid @enderror"
                                        placeholder="ex: Perihal rapat paripurna" id="dasar" name="dasar" disabled> {{ $detailDataSuratTugas->dasar }} </textarea>
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
                                            class="form-control select2 summernote-disable @error('id_user_penerima') is-invalid @enderror "
                                            id="id_user_penerima" name="id_user_penerima[]" multiple=""
                                            style="width: 100%;" disabled>
                                            <option disabled>Pilih Tujuan User</option>
                                            @foreach ($userList as $data)
                                                <option value="{{ $data->id_user }}"
                                                    {{ $detailDataSuratTugas->id_user_penerima == $data->id_user ? 'selected' : '' }}>
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
                            <div class=" col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group ">
                                    <label for="tujuan_pelaksanaan">Tujuan Pelaksanaan Tugas: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control @error('tujuan_pelaksanaan') is-invalid @enderror"
                                            placeholder="ex: Undangan Rapat"
                                            value="{{ $detailDataSuratTugas->tujuan_pelaksanaan }}"
                                            id="tujuan_pelaksanaan" name="tujuan_pelaksanaan" disabled autofocus>
                                    </div>
                                    <span class="text-danger">
                                        @error('tujuan_pelaksanaan')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group ">
                                    <label for="tembusan">Masukkan Tembusan: (optional) </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">
                                                <i class="bi bi-person-fill-exclamation"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control @error('tembusan') is-invalid @enderror"
                                            placeholder="ex: Sekretaris Dinas"
                                            value="{{ $detailDataSuratTugas->tembusan }}" id="tembusan" name="tembusan"
                                            autofocus disabled>
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
                                    <label for="tempat_pelaksanaan">Masukkan Tempat Pelaksanaan Tugas: </label>
                                    <textarea class="summernote-simple summernote-disable @error('tempat_pelaksanaan') is-invalid @enderror"
                                        placeholder="ex: Perihal rapat paripurna" id="tempat_pelaksanaan" name="tempat_pelaksanaan" disabled> {{ $detailDataSuratTugas->tempat_pelaksanaan }} </textarea>
                                    <span class="text-danger">
                                        @error('tempat_pelaksanaan')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="tanggal_mulai">Masukkan Tanggal Mulai Tugas:
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">
                                                <i class="bi bi-calendar3"></i>
                                            </div>
                                        </div>
                                        <input type="date"
                                            class="form-control datepicker tanggal_mulai @error('tanggal_mulai') is-invalid @enderror"
                                            placeholder="ex: 11/14/2023"
                                            value="{{ $detailDataSuratTugas->tanggal_mulai }}" id="tanggal_mulai"
                                            name="tanggal_mulai" disabled>
                                    </div>
                                    <span class="text-danger">
                                        @error('tanggal_mulai')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="tanggal_selesai">Masukkan Tanggal Mulai Tugas:
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">
                                                <i class="bi bi-calendar3"></i>
                                            </div>
                                        </div>
                                        <input type="date"
                                            class="form-control datepicker tanggal_selesai @error('tanggal_selesai') is-invalid @enderror"
                                            placeholder="ex: 11/14/2023"
                                            value="{{ $detailDataSuratTugas->tanggal_selesai }}" id="tanggal_selesai"
                                            name="tanggal_selesai" disabled>
                                    </div>
                                    <span class="text-danger">
                                        @error('tanggal_selesai')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="waktu_mulai">Masukkan Waktu Mulai Tugas:
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">
                                                <i class="bi bi-clock-fill"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control timepicker waktu_mulai @error('waktu_mulai') is-invalid @enderror"
                                            placeholder="ex: 10:20 AM" value="{{ $detailDataSuratTugas->waktu_mulai }}"
                                            id="waktu_mulai" name="waktu_mulai" disabled>
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
                                            <div class="input-group-text bg-secondary">
                                                <i class="bi bi-clock-fill"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control timepicker waktu_selesai @error('waktu_selesai') is-invalid @enderror"
                                            placeholder="ex: 12:20 PM" value="{{ $detailDataSuratTugas->waktu_selesai }}"
                                            id="waktu_selesai" name="waktu_selesai" disabled>
                                    </div>
                                    <span class="text-danger">
                                        @error('waktu_selesai')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <input type="id_user" class="form-control @error('id_user') is-invalid @enderror"
                                placeholder="ex: contoh@gmail.com" value="{{ Auth::user()->id_user }}" id="id_user"
                                name="id_user" hidden>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <div class="row d-flex justify-content-end">
                                <div class="ml-2 ">
                                    <a href="/surat-tugas" class="btn btn-warning  ">
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
@endsection


@section('script')
    <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>

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
