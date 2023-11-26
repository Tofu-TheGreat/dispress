@extends('admin.pages.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link href="{{ asset('assets-landing-page/extension/filepond/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex">
                    {{-- judul Page --}}
                    <div class="col-md-9 col-sm-8">
                        <h4 class="text-dark judul-page">Manajemen Surat</h4>
                    </div>
                    {{-- Akhir judul Page --}}
                    {{-- Breadcrumb --}}
                    <div class="col-md-3 col-sm-4 text-center items-center mt-2 ">
                        <div class="breadcrumb-item d-inline active"><a href="/dashboard">Dashboard</a></div>
                        <div class="breadcrumb-item d-inline">Disposisi</div>
                    </div>
                    {{-- Akhir Breadcrumb --}}
                </div>
            </div>
        </div>

        {{-- Filter --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="col">
                    <h4 class="text-primary">Filter</h4>
                </div>
                <div class="col d-flex justify-content-end">
                    {{-- Button Triger Filter --}}
                    <span data-toggle="tooltip" data-placement="top" title="Klik untuk menu filter data."
                        data-original-title="Filter Data" disabled>
                        <button class="btn btn-info collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"
                            title="Tombol Filter">
                            <i class="bi bi-funnel-fill"></i>
                        </button>
                    </span>
                    {{-- Akhir Button Triger Filter --}}
                </div>
            </div>
            <form action="/surat-filter" method="get">
                @csrf
                <div class="collapse" id="collapseExample" style="">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="id_user">Pilih Pengirim: </label>
                                    <div class="input-group">
                                        <select class="filter select2 @error('id_user') is-invalid  @enderror "
                                            id="id_user" name="id_user" style="width: 100%;">
                                            <option value="">Pilih Pengirim</option>
                                            @foreach ($userList as $data)
                                                <option value="{{ $data->id_user }}"
                                                    {{ old('id_user') == $data->id_user ? 'selected' : '' }}>
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
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="tujuan_disposisi">Pilih Tujuan Disposisi: </label>
                                    <div class="input-group">
                                        <select class="filter select2 @error('tujuan_disposisi') is-invalid  @enderror "
                                            id="tujuan_disposisi" name="tujuan_disposisi" style="width: 100%;">
                                            <option value="">Pilih Tujuan Disposisi</option>
                                            @foreach ($disposisiList as $item)
                                                <option value="0"
                                                    {{ $item->tujuan_disposisi == '0' ? 'selected' : '' }}>
                                                    Kepala Sekolah</option>
                                                <option value="1"
                                                    {{ $item->tujuan_disposisi == '1' ? 'selected' : '' }}>
                                                    Wakil Kepala Sekolah</option>
                                                <option value="2"
                                                    {{ $item->tujuan_disposisi == '2' ? 'selected' : '' }}>
                                                    Kurikulum</option>
                                                <option value="3"
                                                    {{ $item->tujuan_disposisi == '3' ? 'selected' : '' }}>
                                                    Kesiswaan</option>
                                                <option value="4"
                                                    {{ $item->tujuan_disposisi == '4' ? 'selected' : '' }}>
                                                    Sarana Prasarana</option>
                                                <option value="5"
                                                    {{ $item->tujuan_disposisi == '5' ? 'selected' : '' }}>
                                                    Kepala Jurusan</option>
                                                <option value="6"
                                                    {{ $item->tujuan_disposisi == '6' ? 'selected' : '' }}>
                                                    Hubin</option>
                                                <option value="7"
                                                    {{ $item->tujuan_disposisi == '7' ? 'selected' : '' }}>
                                                    Bimbingan Konseling</option>
                                                <option value="8"
                                                    {{ $item->tujuan_disposisi == '8' ? 'selected' : '' }}>
                                                    Guru Umum</option>
                                                <option value="9"
                                                    {{ $item->tujuan_disposisi == '9' ? 'selected' : '' }}>
                                                    Tata Usaha</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('tujuan_disposisi')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="sifat_disposisi">Pilih Sifat Disposisi: </label>
                                    <div class="input-group">
                                        <select class="filter select2 @error('sifat_disposisi') is-invalid  @enderror "
                                            id="sifat_disposisi" name="sifat_disposisi" style="width: 100%;">
                                            <option value="">Pilih Sifat Disposisi</option>
                                            @foreach ($disposisiList as $item)
                                                <option value="0"
                                                    {{ $item->sifat_disposisi === '0' ? 'selected' : '' }}>
                                                    Biasa</option>
                                                <option value="1"
                                                    {{ $item->sifat_disposisi === '1' ? 'selected' : '' }}>
                                                    Prioritas</option>
                                                <option value="2"
                                                    {{ $item->sifat_disposisi === '2' ? 'selected' : '' }}>
                                                    Rahasia</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('sifat_disposisi')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="status_disposisi">Pilih Status Disposisi: </label>
                                    <div class="input-group">
                                        <select class="filter select2 @error('status_disposisi') is-invalid  @enderror "
                                            id="status_disposisi" name="status_disposisi" style="width: 100%;">
                                            <option value="">Pilih Status Disposisi</option>
                                            @foreach ($disposisiList as $item)
                                                <option value="0"
                                                    {{ $item->status_disposisi === '0' ? 'selected' : '' }}>
                                                    Belum ditindak</option>
                                                <option value="1"
                                                    {{ $item->status_disposisi === '1' ? 'selected' : '' }}>
                                                    Diajukan</option>
                                                <option value="2"
                                                    {{ $item->status_disposisi === '2' ? 'selected' : '' }}>
                                                    Diterima</option>
                                                <option value="3"
                                                    {{ $item->status_disposisi === '3' ? 'selected' : '' }}>
                                                    Dikembalikan</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('status_disposisi')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <h6 class="text-primary text-center mb-5">Sortir berdasarkan Tanggal Pembuatan Surat
                                </h6>
                            </div>
                            <div class=" col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="tanggal_surat_awal">Dari Tanggal Awal Pembuatan Surat:
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-calendar3"></i>
                                            </div>
                                        </div>
                                        <input type="date"
                                            class="filter form-control tanggal_surat_awal @error('tanggal_surat_awal') is-invalid @enderror"
                                            placeholder="ex: 11/14/2023" value="{{ old('tanggal_surat_awal') }}"
                                            id="tanggal_surat_awal" name="tanggal_surat_awal" style="width: 80%;">
                                    </div>
                                    <span class="text-danger">
                                        @error('tanggal_surat_awal')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class=" col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="tanggal_surat_terakhir">Sampai Tanggal Terakhir
                                        Pembuatan
                                        Surat: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-calendar3"></i>
                                            </div>
                                        </div>
                                        <input type="date"
                                            class="form-control tanggal_surat_terakhir @error('tanggal_surat_terakhir') is-invalid @enderror"
                                            placeholder="ex: 11/14/2023" value="{{ old('tanggal_surat_terakhir') }}"
                                            id="tanggal_surat_terakhir" name="tanggal_surat_terakhir"
                                            style="width: 80%;">
                                    </div>
                                    <span class="text-danger">
                                        @error('tanggal_surat_terakhir')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mr-2 mb-1 " id="filtering" title="Filter">
                                <i class="bi bi-funnel mr-1 "></i><span class="bi-text mr-2">Filter Data</span></button>
                            <button type="button" id="reset" href="/admin" class="btn btn-secondary mb-1"
                                title="Reset">
                                <i class="bi bi-arrow-clockwise mr-1"></i><span class="bi-text mr-2">Reset
                                    Filter</span></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- Filter --}}

        <div class="section-body">
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <div class="col-lg-11 col-sm-8">
                            <h4 class="text-primary judul-page">List Disposisi</h4>
                        </div>
                        <div class="col-lg-1 col-sm-4 btn-group">
                            {{-- Button Tambah Data --}}
                            <a href="/disposisi/create" class="text-white">
                                <button type="button" class="btn btn-primary" data-toggle="tooltip"
                                    data-placement="top" title="Tambah Data" data-original-title="Tambah Data">
                                    <i class="fa fa-plus-circle btn-tambah-data"></i>
                                </button>
                            </a>
                            {{-- Akhir Button Tambah Data --}}
                            {{-- Button Export Data --}}
                            <a href="#" class="text-white ml-2 tombol-export">
                                <button type="button" class="btn btn-success tombol-export" data-toggle="tooltip"
                                    data-placement="top" title="Export Data Excel" data-original-title="Export Data">
                                    <i class="fa fa-file-excel btn-tambah-data tombol-export"></i>
                                </button>
                            </a>
                            {{-- Akhir Button Export Data --}}
                            {{-- Button import Data --}}
                            <span data-toggle="tooltip" data-placement="top" title="Import Data Excel"
                                data-original-title="Import Data" disabled>
                                <button type="button" class="btn btn-warning ml-2" data-toggle="modal"
                                    data-target="#importmodal" type="button" class="btn btn-warning text-white ml-2">
                                    <i class="fa fa-file-excel btn-tambah-data "></i>
                                </button>
                            </span>
                            {{-- Akhir Button import Data --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    @if ($disposisiList->isEmpty())
                                        <div class="d-flex justify-content-center align-content-center">
                                            <img src="{{ asset('assets-landing-page/img/No data-rafiki.png') }}"
                                                class="w-50">
                                        </div>
                                    @else
                                        @foreach ($disposisiList as $data)
                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class="card card-primary card-surat shadow-sm">
                                                    <div class="card-header d-flex justify-content-between">
                                                        <div class="position-relative">
                                                            <h4>{{ $data->surat->nomor_surat }}</h4>
                                                            <small
                                                                style="position: absolute; top: 50%;width: max-content;">Dari
                                                                {{ $data->user->nama }}
                                                            </small>
                                                        </div>
                                                        <div class="card-header-action btn-group">
                                                            @if ($data->sifat_disposisi == 'Biasa')
                                                                <button class="btn btn-primary tombol-disposisi mr-2"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Bersifat {{ $data->sifat_disposisi }}"
                                                                    data-original-title="Bersifat {{ $data->sifat_disposisi }}"
                                                                    disabled>
                                                                    <span
                                                                        class="d-flex justify-content-center m-0">{{ $data->sifat_disposisi }}</span>
                                                                </button>
                                                            @elseif ($data->sifat_disposisi == 'Prioritas')
                                                                <button class="btn btn-warning tombol-disposisi mr-2"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Bersifat {{ $data->sifat_disposisi }}"
                                                                    data-original-title="Bersifat {{ $data->sifat_disposisi }}"
                                                                    disabled>
                                                                    <span
                                                                        class="d-flex justify-content-center m-0">{{ $data->sifat_disposisi }}</span>
                                                                </button>
                                                            @elseif ($data->sifat_disposisi == 'Rahasia')
                                                                <button class="btn btn-danger tombol-disposisi mr-2"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Bersifat {{ $data->sifat_disposisi }}"
                                                                    data-original-title="Bersifat {{ $data->sifat_disposisi }}"
                                                                    disabled>
                                                                    <span
                                                                        class="d-flex justify-content-center m-0">{{ $data->sifat_disposisi }}</span>
                                                                </button>
                                                            @endif
                                                            <a data-collapse="#mycard-collapse{{ $data->id_disposisi }}"
                                                                class="btn btn-icon btn-info" href="#"><i
                                                                    class="fas fa-minus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="collapse show"
                                                        id="mycard-collapse{{ $data->id_disposisi }}">
                                                        <div class="card-body card-body-surat position-relative "
                                                            style="min-height: 130px">
                                                            <p class="w-75"> {!! $data->catatan_disposisi !!}</p>
                                                            <div class="mt-1">
                                                                <a class="text-white mr-2 tombol-disposisi rounded-pill">
                                                                    <button type="button"
                                                                        class="btn btn-success tombol-disposisi"
                                                                        data-toggle="tooltip" data-placement="right"
                                                                        title="Klik untuk Mendisposisikan"
                                                                        data-original-title="Klik untuk Mendisposisikan">
                                                                        Disposisi<span
                                                                            class="badge badge-transparent">4</span>
                                                                    </button>
                                                                </a>
                                                            </div>
                                                            <div class="d-flex flex-column btn-group-action">
                                                                <a href="{{ route('disposisi.show', Crypt::encryptString($data->id_disposisi)) }}"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Detail data disposisi"
                                                                    data-original-title="Detail data disposisi"
                                                                    class="btn btn-info has-icon text-white tombol-detail-card"
                                                                    href=""><i class="pl-1  bi bi-eye "></i>
                                                                </a>
                                                                <a type="button" data-toggle="tooltip"
                                                                    data-placement="left" title="Edit data disposisi"
                                                                    data-original-title="Edit data disposisi"
                                                                    class="btn btn-warning has-icon text-white tombol-edit-card"
                                                                    href="{{ route('disposisi.edit', Crypt::encryptString($data->id_disposisi)) }}"><i
                                                                        class="pl-1  bi bi-pencil-square "></i>
                                                                </a>
                                                                <form method="POST"
                                                                    action="{{ route('disposisi.destroy', Crypt::encryptString($data->id_disposisi)) }}"
                                                                    class="tombol-hapus">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" data-toggle="tooltip"
                                                                        data-placement="bottom"
                                                                        title="Hapus data disposisi"
                                                                        data-original-title="Hapus data disposisi"
                                                                        class="btn btn-danger has-icon text-white tombol-hapus-card tombol-hapus"
                                                                        href=""><i
                                                                            class="pl-1  bi bi-trash tombol-hapus"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="card-footer d-flex justify-content-between position-relative">
                                                            <div class="d-flex flex-row ">
                                                                <div>
                                                                    <div class="user-detail-name">
                                                                        <span class="text-primary" href="#">
                                                                            {{ $data->status_disposisi }}</span>
                                                                    </div>
                                                                    <div class="text-job">
                                                                        <small style="max-width: max-content">
                                                                            {{ date('d-F-Y', strtotime($data->tanggal_disposisi)) }}
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center " style="margin-left: 15%;">
                                                                <a type="button" class="btn btn-danger btn-scan-pdf"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Preview surat (PDF)"
                                                                    data-original-title="Preview surat (PDF)"
                                                                    href="{{ asset('document_save/' . $data->surat->scan_dokumen) }}"
                                                                    target="_blank" title="Read PDF"><i
                                                                        class="bi bi-file-pdf"
                                                                        style="font-size: 1.1rem;"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-12 m-auto d-flex justify-content-center">
                                            {{ $disposisiList->onEachSide(1)->links() }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Import -->
    <div class="modal fade" id="importmodal" aria-labelledby="importmodalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importmodalLabel">Import Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.import') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body py-4 px-4 mt-3 border border-1">
                        <span class="d-block">Unduh Template Import Admin: </span>
                        <a href="/file/Book1.xlsx" class="btn btn-1 px-4 mb-4 mt-1 w-100" type="button"
                            download="Admin-template-import">
                            <span>Template Import Admin</span> <i
                                class="bi bi-file-earmark-excel-fill icon-btn-1 ms-2"></i></a>
                        @csrf
                        <div class="form-group">
                            <label for="import">Masukkan file Yang Ingin di-import: </label>
                            <small class="d-block">Catatan: masukkan file dengan format (XLSX), maksimal 10
                                MB.</small>
                            <input type="file" class="file-filepond-preview @error('file') is-invalid @enderror"
                                id="import" name="file" accept=".xlsx">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-danger"data-dismiss="modal" aria-label="Close">Close <i
                                class="bi bi-x-circle ml-3"></i></button>
                        <button type="submit" value="Import" class="btn btn-primary text-white">
                            Click untuk
                            import <i class="bi bi-clipboard-check-fill ml-3"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal Import --}}
@endsection
@section('script')
    {{-- modules --}}
    <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>x
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/js/filepond.js') }}"></script>

    {{-- Toast --}}
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

    @if ($errors->has('file'))
        <script>
            $(document).ready(function() {
                iziToast.error({
                    title: 'Error',
                    message: "{!! implode('', $errors->all('<div>:message</div>')) !!}",
                    position: 'topRight'
                })
            });
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            $(document).ready(function() {
                iziToast.error({
                    title: 'Error',
                    message: "{{ Session::get('error') }} Import",
                    position: 'topRight'
                })
            });
        </script>
    @endif
    {{-- seweetalert confirmation --}}

    <script>
        document.body.addEventListener("click", function(event) {
            const element = event.target;

            if (element.classList.contains("tombol-hapus")) {
                swal({
                        title: 'Apakah anda yakin?',
                        text: 'Ingin menghapus data Disposisi ini!',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal('Data Disposisi berhasil dihapus!', {
                                icon: 'success',
                            });
                            element.closest('form').submit();
                        } else {
                            swal('Data Disposisi tidak jadi dihapus!');
                        }
                    });
            }

            if (element.classList.contains("tombol-export")) {
                swal({
                        title: 'Apakah anda yakin?',
                        text: 'Ingin export data Disposisi ini?',
                        icon: 'info', // Change the icon to a question mark
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willExport) => {
                        if (willExport) {
                            swal('Data Disposisi berhasil diexport!', {
                                icon: 'success',
                            });

                            // Make an AJAX request to trigger the export
                            fetch('{{ route('disposisi.export') }}', {
                                    method: 'GET',
                                })
                                .then(response => {
                                    // Handle the response here (e.g., trigger the export)
                                    if (response.ok) {
                                        // You can trigger the export here
                                        // For example, you can open the exported file in a new tab
                                        window.open(response.url);
                                    }
                                })
                                .catch(error => {
                                    // Handle any errors here
                                    console.error('Error:', error);
                                });
                        } else {
                            swal('Data Disposisi tidak jadi diexport!');
                        }
                    });
            }
        })
    </script>
@endsection
