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
                        <div class="breadcrumb-item d-inline active"><a href="/surat-keluar">Surat Keluar</a></div>
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
                            <h4 class="text-primary judul-page">Detail Surat Keluar</h4>
                        </div>
                    </div>
                    <div class="col-lg-1 col-sm-4 btn-group">
                        @can('admin-officer')
                            <a href="{{ route('surat-keluar.edit', Crypt::encryptString($detailDataSuratKeluar->id_surat_keluar)) }}"
                                class="text-white ml-2">
                                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                    title="Edit Data Surat Keluar" data-original-title="Edit Data Surat Keluar">
                                    <i class="bi bi-pencil btn-tambah-data"></i>
                                </button>
                            </a>
                            <form method="POST"
                                action="{{ route('surat-keluar.destroy', Crypt::encryptString($detailDataSuratKeluar->id_surat_keluar)) }}"
                                class="tombol-hapus">
                                @csrf
                                @method('DELETE')
                                <a href="#" class="text-white ml-2 tombol-hapus">
                                    <button type="button" class="btn btn-danger tombol-hapus" data-toggle="tooltip"
                                        data-placement="top" title="Hapus Data Surat Keluar"
                                        data-original-title="Hapus Data Surat Keluar">
                                        <i class="bi bi-trash btn-tambah-data tombol-hapus"></i>
                                    </button>
                                </a>
                            </form>
                        @endcan
                    </div>
                </div>
                <div class="card-body ">
                    <form action="{{ route('surat-keluar.update', $detailDataSuratKeluar->id_surat_keluar) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id_user" id="" hidden value="{{ Auth::user()->id_user }}">
                        <div class="row">
                            <div class=" col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group ">
                                    <label for="header_surat_keluar">Masukkan Header Surat (optional) :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control @error('header_surat_keluar') is-invalid @enderror"
                                            placeholder="ex: KEMENTRIAN WISATA REPUBLIK INDONESIA"
                                            value="{{ $detailDataSuratKeluar->header_surat_keluar }}"
                                            id="header_surat_keluar" name="header_surat_keluar" readonly autofocus>
                                    </div>
                                    <span class="text-danger">
                                        @error('header_surat_keluar')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

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
                                            placeholder="ex: 1..2" value="{{ $detailDataSuratKeluar->jumlah_lampiran }}"
                                            id="jumlah_lampiran" name="jumlah_lampiran" readonly autofocus>
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
                                        <select class="form-control select2  @error('id_klasifikasi') is-invalid @enderror "
                                            id="id_klasifikasi" name="id_klasifikasi" disabled>
                                            <option selected disabled>Pilih Nomor Klasifikasi</option>
                                            @foreach ($klasifikasiList as $data)
                                                <option value="{{ $data->id_klasifikasi }}"
                                                    {{ $detailDataSuratKeluar->id_klasifikasi == $data->id_klasifikasi ? 'selected' : '' }}>
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
                                            placeholder="ex: 090/1928-TU/2023"
                                            value="{{ $detailDataSuratKeluar->nomor_surat_keluar }}"
                                            id="nomor_surat_keluar" name="nomor_surat_keluar" disabled autofocus>
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
                                        <input type="text" class="form-control @error('perihal') is-invalid @enderror"
                                            placeholder="ex: Undangan Rapat"
                                            value="{{ $detailDataSuratKeluar->perihal }}" id="perihal" name="perihal"
                                            disabled autofocus>
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
                                            placeholder="ex: 11/14/2023"
                                            value="{{ $detailDataSuratKeluar->tanggal_surat_keluar }}"
                                            id="tanggal_surat_keluar" name="tanggal_surat_keluar" disabled>
                                    </div>
                                    <span class="text-danger">
                                        @error('tanggal_surat_keluar')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="isi_surat">Masukkan Isi Surat: </label>
                                    <textarea class="summernote-simple summernote-disable @error('isi_surat') is-invalid @enderror"
                                        placeholder="ex: Perihal rapat paripurna" id="isi_surat" name="isi_surat" readonly> {{ $detailDataSuratKeluar->isi_surat }} </textarea>
                                    <span class="text-danger">
                                        @error('isi_surat')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="id_instansi_penerima">Tujuan Pengiriman Surat:
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-person-rolodex"></i>
                                            </div>
                                        </div>
                                        <select
                                            class="form-control select2  @error('id_instansi_penerima') is-invalid @enderror "
                                            id="id_instansi_penerima" name="id_instansi_penerima" disabled>
                                            <option selected disabled>Pilih Tujuan Pengiriman Surat</option>
                                            @foreach ($instansiList as $data)
                                                <option value="{{ $data->id_instansi }}"
                                                    {{ $detailDataSuratKeluar->id_instansi_penerima == $data->id_instansi ? 'selected' : '' }}>
                                                    {{ $data->nama_instansi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('id_instansi_penerima')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group ">
                                    <label for="tembusan">Masukkan Tembusan: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-person-fill-exclamation"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control @error('tembusan') is-invalid @enderror"
                                            placeholder="ex: Sekretaris Dinas"
                                            value="{{ $detailDataSuratKeluar->tembusan }}" id="tembusan"
                                            name="tembusan" disabled autofocus>
                                    </div>
                                    <span class="text-danger">
                                        @error('tembusan')
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
                                    <a href="/surat-keluar" class="btn btn-warning  ">
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
