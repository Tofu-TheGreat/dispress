@extends('admin.pages.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link href="{{ asset('assets-landing-page/extension/filepond/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex">
                    {{-- judul Page --}}
                    <div class="col-md-9 col-sm-8">
                        <h4 class="text-dark judul-page">Manajemen perusahaan</h4>
                    </div>
                    {{-- Akhir judul Page --}}
                    {{-- Breadcrumb --}}
                    <div class="col-md-3 col-sm-4 text-center items-center mt-2 ">
                        <div class="breadcrumb-item d-inline active"><a href="/dashboard">Dashboard</a></div>
                        <div class="breadcrumb-item d-inline">perusahaan Masuk</div>
                    </div>
                    {{-- Akhir Breadcrumb --}}
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <div class="col-lg-11 col-sm-8">
                            <h4 class="text-primary judul-page">List Perusahaan</h4>
                        </div>
                        <div class="col-lg-1 col-sm-4 btn-group">
                            {{-- Button Tambah Data --}}
                            <span data-toggle="tooltip" data-placement="top" title="Tambah Data Perusahaan"
                                data-original-title="Import Data" disabled>
                                <button type="button" class="btn btn-primary ml-2" data-toggle="modal"
                                    data-target="#tambah-modal" type="button" class="btn btn-primary text-white ml-2">
                                    <i class="fa fa-plus-circle btn-tambah-data"></i>
                                </button>
                            </span>
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
                                    @if ($perusahaanList->isEmpty())
                                        <div class="d-flex justify-content-center align-content-center">
                                            <img src="{{ asset('assets-landing-page/img/No data-rafiki.png') }}"
                                                class="w-50">
                                        </div>
                                    @else
                                        <div class="row row-cols-2 row-cols-md-3 g-3 ">
                                            @foreach ($perusahaanList as $data)
                                                <div class="col mx-1">
                                                    <div class="card shadow shadow-sm" style="max-width: 360px;">
                                                        <div class="position-relative">
                                                            <img src="{{ asset('assets-landing-page/img/Building-bro.png') }}"
                                                                class="card-img-top bg-primary img-perusahaan"
                                                                alt="foto perusahaan" style="min-width: 200px">
                                                            <div
                                                                class="d-flex flex-row justify-content-center align-content-center btn-group-action-perusahaan ">
                                                                <div class="mr-2">
                                                                    <span data-toggle="tooltip" data-placement="top"
                                                                        title="Detail Data Perusahaan"
                                                                        data-original-title="Detail data perusahaan"
                                                                        disabled>
                                                                        <button type="button" data-toggle="modal"
                                                                            data-target="#detail-modal{{ $data->id_perusahaan }}"
                                                                            type="button"
                                                                            class="rounded-circle btn btn-info tombol-detail-perusahaan">
                                                                            <i class="bi bi-eye "></i>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                                <div class="mr-2">
                                                                    <span data-toggle="tooltip" data-placement="top"
                                                                        title="Edit Data Perusahaan"
                                                                        data-original-title="Edit data perusahaan" disabled>
                                                                        <button type="button" data-toggle="modal"
                                                                            data-target="#edit-modal{{ $data->id_perusahaan }}"
                                                                            type="button"
                                                                            class="rounded-circle btn btn-warning tombol-edit-perusahaan">
                                                                            <i class="bi bi-pencil-square "></i>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                                <form method="POST"
                                                                    action="{{ route('perusahaan.destroy', Crypt::encryptString($data->id_perusahaan)) }}"
                                                                    class="tombol-hapus">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" data-toggle="tooltip"
                                                                        data-placement="top" title="Hapus data perusahaan"
                                                                        data-original-title="Hapus data perusahaan"
                                                                        class="rounded-circle btn btn-danger has-icon text-white tombol-hapus-perusahaan tombol-hapus"
                                                                        href=""><i
                                                                            class="bi bi-trash tombol-hapus"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <b class="card-title pt-3 d-block">
                                                                {{ $data->nama_perusahaan }}</b>
                                                            <small class="card-text">{!! $data->alamat_perusahaan !!}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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

    @foreach ($perusahaanList as $item)
        <!-- Modal Detail Perusahaan -->
        <div class="modal fade" id="detail-modal{{ $item->id_perusahaan }}" aria-labelledby="detail-modal"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header border-bottom pb-4">
                        <h5 class="modal-title" id="detail-modal">Detail Data Perusahaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="row px-4 pt-4">
                        <div class="col-12">
                            @if ($item->foto_perusahaan)
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('image_save/' . $item->foto_perusahaan) }}"
                                        alt="foto {{ $item->perusahaan }}" class="foto-perusahaan">
                                </div>
                            @else
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('assets-landing-page/img/Building-bro.png') }}"
                                        alt="foto {{ $item->perusahaan }}" class="foto-perusahaan bg-primary">
                                </div>
                            @endif
                        </div>
                        <div class=" col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group ">
                                <label for="nama_perusahaan">Nama Perusahaan: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend ">
                                        <div class="input-group-text bg-secondary">
                                            <i class="fas fa-building"></i>
                                        </div>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('nama_perusahaan') is-invalid @enderror"
                                        placeholder="ex: PT Gayuh Net" value="{{ $item->nama_perusahaan }}"
                                        id="nama_perusahaan" name="nama_perusahaan" readonly>
                                </div>
                                <span class="text-danger">
                                    @error('nama_perusahaan')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="nomor_telpon">Nomor Telepon Perusahaan: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-secondary">
                                            <i class="bi bi-telephone-fill"></i>
                                        </div>
                                    </div>
                                    <input type="text"
                                        class="form-control phone @error('nomor_telpon') is-invalid @enderror"
                                        placeholder="ex: 0878-2730-3388" value="{{ $item->nomor_telpon }}"
                                        id="nomor_telpon" name="nomor_telpon" readonly>
                                </div>
                                <span class="text-danger">
                                    @error('nomor_telpon')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="alamat_perusahaan">Masukkan Alamat Perusahaan: </label>
                                <textarea class="summernote-simple summernote-disable @error('alamat_perusahaan') is-invalid @enderror"
                                    id="alamat_perusahaan" name="alamat_perusahaan" readonly> {{ $item->alamat_perusahaan }} </textarea>
                                <span class="text-danger">
                                    @error('alamat_perusahaan')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end border-top pt-3">
                        <button type="button" class="btn btn-danger"data-dismiss="modal" aria-label="Close">Close <i
                                class="bi bi-x-circle ml-3"></i></button>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Detail Perusahaan --}}
    @endforeach

    @foreach ($perusahaanList as $item)
        <!-- Modal Edit Perusahaan -->
        <div class="modal fade" id="edit-modal{{ $item->id_perusahaan }}" aria-labelledby="edit-modal"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header border-bottom pb-4">
                        <h5 class="modal-title" id="edit-modal">Edit Data Perusahaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/perusahaan/{{ $item->id_perusahaan }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="text" name="id_perusahaan" value="{{ $item->id_perusahaan }}" hidden>
                        <div class="row px-4 pt-4">
                            <div class=" col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group ">
                                    <label for="nama_perusahaan">Nama Perusahaan: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-building"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control @error('nama_perusahaan') is-invalid @enderror"
                                            placeholder="ex: PT Gayuh Net" value="{{ $item->nama_perusahaan }}"
                                            id="nama_perusahaan" name="nama_perusahaan" required autofocus>
                                    </div>
                                    <span class="text-danger">
                                        @error('nama_perusahaan')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="nomor_telpon">Nomor Telepon Perusahaan: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-telephone-fill"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control phone @error('nomor_telpon') is-invalid @enderror"
                                            placeholder="ex: 0878-2730-3388" value="{{ $item->nomor_telpon }}"
                                            id="nomor_telpon" name="nomor_telpon" required>
                                    </div>
                                    <span class="text-danger">
                                        @error('nomor_telpon')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="alamat_perusahaan">Masukkan Alamat Perusahaan: </label>
                                    <textarea class="summernote-simple @error('alamat_perusahaan') is-invalid @enderror" id="alamat_perusahaan"
                                        name="alamat_perusahaan" required> {{ $item->alamat_perusahaan }} </textarea>
                                    <span class="text-danger">
                                        @error('alamat_perusahaan')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group px-4">
                            <label for="foto_perusahaan ">Masukkan foto Perusahaan: </label>
                            <small class="d-block">Catatan: masukkan foto dengan format (JPEG, PNG,
                                JPG),
                                maksimal 10
                                MB.</small>
                            <input type="file"
                                class="img-filepond-preview @error('foto_perusahaan') is-invalid @enderror"
                                id="foto_perusahaan" name="foto_perusahaan" accept="jpg,jpeg,png,svg">
                            <span class="text-danger">
                                @error('foto_perusahaan')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="modal-footer d-flex justify-content-between border-top pt-3">
                            <button type="button" class="btn btn-danger"data-dismiss="modal" aria-label="Close">Close <i
                                    class="bi bi-x-circle ml-3"></i></button>
                            <button type="submit" value="Import" class="btn btn-primary text-white">
                                Save Data <i class="bi bi-clipboard-check-fill ml-3"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Edit Perusahaan --}}
    @endforeach

    <!-- Modal Tambah Perusahaan -->
    <div class="modal fade" id="tambah-modal" aria-labelledby="tambah-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header border-bottom pb-4">
                    <h5 class="modal-title" id="tambah-modal">Tambah Data Perusahaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('perusahaan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row px-4 pt-4">
                        <div class=" col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group ">
                                <label for="nama_perusahaan">Masukkan Nama Perusahaan: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-building"></i>
                                        </div>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('nama_perusahaan') is-invalid @enderror"
                                        placeholder="ex: PT Gayuh Net" value="{{ old('nama_perusahaan') }}"
                                        id="nama_perusahaan" name="nama_perusahaan" required autofocus>
                                </div>
                                <span class="text-danger">
                                    @error('nama_perusahaan')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="nomor_telpon">Masukkan Nomor Telepon Perusahaan: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="bi bi-telephone-fill"></i>
                                        </div>
                                    </div>
                                    <input type="text"
                                        class="form-control phone @error('nomor_telpon') is-invalid @enderror"
                                        placeholder="ex: 0878-2730-3388" value="{{ old('nomor_telpon') }}"
                                        id="nomor_telpon" name="nomor_telpon" required>
                                </div>
                                <span class="text-danger">
                                    @error('nomor_telpon')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="alamat_perusahaan">Masukkan Alamat Perusahaan: </label>
                                <textarea class="summernote-simple @error('alamat_perusahaan') is-invalid @enderror" id="alamat_perusahaan"
                                    name="alamat_perusahaan" required> {{ old('alamat_perusahaan') }} </textarea>
                                <span class="text-danger">
                                    @error('alamat_perusahaan')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group px-4">
                        <label for="foto_perusahaan ">Masukkan foto Perusahaan: </label>
                        <small class="d-block">Catatan: masukkan foto dengan format (JPEG, PNG,
                            JPG),
                            maksimal 10
                            MB.</small>
                        <input type="file" class="img-filepond-preview @error('foto_perusahaan') is-invalid @enderror"
                            id="foto_perusahaan" name="foto_perusahaan" accept="jpg,jpeg,png,svg">
                        <span class="text-danger">
                            @error('foto_perusahaan')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="modal-footer d-flex justify-content-between border-top pt-3">
                        <button type="button" class="btn btn-danger"data-dismiss="modal" aria-label="Close">Close <i
                                class="bi bi-x-circle ml-3"></i></button>
                        <button type="submit" value="Import" class="btn btn-primary text-white">
                            Save Data <i class="bi bi-clipboard-check-fill ml-3"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Tambah Perusahaan --}}

    <!-- Modal Import -->
    <div class="modal fade" id="importmodal" aria-labelledby="importmodalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importmodalLabel">Import Perusahaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('perusahaan.import') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body py-4 px-4 mt-3 border border-1">
                        <span class="d-block">Unduh Template Import Perusahaan: </span>
                        <a href="/file/Book2.xlsx" class="btn btn-1 px-4 mb-4 mt-1 w-100" type="button"
                            download="Perusahaan-template-import">
                            <span>Template Import Perusahaan</span> <i
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
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>x
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/js/filepond.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/input-mask/jquery.inputmask.bundle.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.phone').inputmask('9999-9999-9999');

            $(document).on("show.bs.modal", '.modal', function(event) {
                var zIndex = 100000 + (10 * $(".modal:visible").length);
                $(this).css("z-index", zIndex);
                setTimeout(function() {
                    $(".modal-backdrop").not(".modal-stack").first().css("z-index", zIndex - 1)
                        .addClass("modal-stack");
                }, 0);
            }).on("hidden.bs.modal", '.modal', function(event) {
                $(".modal:visible").length && $("body").addClass("modal-open");
            });
            $(document).on('inserted.bs.tooltip', function(event) {
                var zIndex = 100000 + (10 * $(".modal:visible").length);
                var tooltipId = $(event.target).attr("aria-describedby");
                $("#" + tooltipId).css("z-index", zIndex);
            });
            $(document).on('inserted.bs.popover', function(event) {
                var zIndex = 100000 + (10 * $(".modal:visible").length);
                var popoverId = $(event.target).attr("aria-describedby");
                $("#" + popoverId).css("z-index", zIndex);
            });

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
        });
    </script>


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

            if (element.classList.contains("note-editable")) {
                element.classList.add("d-block");
            }

            if (element.classList.contains("tombol-hapus")) {
                swal({
                        title: 'Apakah anda yakin?',
                        text: 'Ingin menghapus data Perusahaan ini!',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal('Data Perusahaan berhasil dihapus!', {
                                icon: 'success',
                            });
                            element.closest('form').submit();
                        } else {
                            swal('Data Perusahaan tidak jadi dihapus!');
                        }
                    });
            }

            if (element.classList.contains("tombol-export")) {
                swal({
                        title: 'Apakah anda yakin?',
                        text: 'Ingin export data Perusahaan ini?',
                        icon: 'info', // Change the icon to a question mark
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willExport) => {
                        if (willExport) {
                            swal('Data Perusahaan berhasil diexport!', {
                                icon: 'success',
                            });

                            // Make an AJAX request to trigger the export
                            fetch('{{ route('perusahaan.export') }}', {
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
                            swal('Data Perusahaan tidak jadi diexport!');
                        }
                    });
            }
        })
    </script>
@endsection
