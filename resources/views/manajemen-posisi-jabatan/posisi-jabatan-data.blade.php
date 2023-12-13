@extends('admin.pages.layout')

@section('css')
    <link href="{{ asset('assets/modules/datatables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex">
                    {{-- judul Page --}}
                    <div class="col-md-9 col-sm-8">
                        <h4 class="text-dark judul-page">Manajemen Posisi Jabatan</h4>
                    </div>
                    {{-- Akhir judul Page --}}
                    {{-- Breadcrumb --}}
                    <div class="col-md-3 col-sm-4 text-center items-center mt-2 ">
                        <div class="breadcrumb-item d-inline active"><a href="/dashboard">Dashboard</a></div>
                        <div class="breadcrumb-item d-inline">Posisi Jabatan</div>
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

            <div class="collapse" id="collapseExample" style="">
                <div class="p-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="capitalize" for="tingkat_jabatan">Pilih Berdasarkan Tingkat Jabatan:
                                </label>
                                <div class="input-group">
                                    <select class="filter select2 @error('tingkat_jabatan') is-invalid  @enderror "
                                        id="tingkat_jabatan" name="tingkat_jabatan" style="width: 100%;">
                                        <option value="" selected disabled>Pilih Tingkat Jabatan</option>
                                        <option value="js" {{ old('tingkat_jabatan') === '0' ? 'selected' : '' }}>
                                            Jabatan Struktural</option>
                                        <option value="1" {{ old('tingkat_jabatan') === '1' ? 'selected' : '' }}>
                                            Jabatan Fungsional Tertentu</option>
                                        <option value="2" {{ old('tingkat_jabatan') === '2' ? 'selected' : '' }}>
                                            Jabatan Fungsional Umum</option>
                                    </select>
                                </div>
                                <span class="text-danger">
                                    @error('tingkat_jabatan')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success mr-2 mb-1 " id="filtering" title="Filter">
                            <i class="bi bi-funnel mr-1 "></i><span class="bi-text mr-2">Filter Data</span></button>
                        <a type="button" id="reset" class="btn btn-secondary mb-1" title="Reset">
                            <i class="bi bi-arrow-clockwise mr-1"></i><span class="bi-text mr-2">Reset
                                Filter</span></a>
                    </div>
                </div>
            </div>

        </div>
        {{-- Filter --}}

        <div class="section-body">
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <div class="col-lg-11 col-sm-8">
                            <h4 class="text-primary judul-page">List Posisi Jabatan</h4>
                        </div>
                        <div class="col-lg-1 col-sm-4 btn-group">
                            @cannot('staff')
                                {{-- Button Tambah Data --}}
                                <span data-toggle="tooltip" data-placement="top" title="Tambah Data Instansi"
                                    data-original-title="Tambah Data" class="tombol-tambah" disabled>
                                    <button type="button" class="btn btn-primary ml-2" data-toggle="modal"
                                        data-target="#tambah-modal" type="button"
                                        class="btn btn-primary text-white tombol-tambah ml-2">
                                        <i class="fa fa-plus-circle btn-tambah-data tombol=tambah"></i>
                                    </button>
                                </span>
                                {{-- Akhir Button Tambah Data --}}
                            @endcannot
                            {{-- Button Export Data --}}
                            <a href="#" class="text-white ml-2 tombol-export">
                                <button type="button" class="btn btn-success tombol-export" data-toggle="tooltip"
                                    data-placement="top" title="Export Data Excel" data-original-title="Export Data">
                                    <i class="fa fa-file-excel btn-tambah-data tombol-export"></i>
                                </button>
                            </a>
                            {{-- Akhir Button Export Data --}}
                            @cannot('staff')
                                {{-- Button import Data --}}
                                <span data-toggle="tooltip" data-placement="top" title="Import Data Excel"
                                    data-original-title="Import Data" disabled>
                                    <button type="button" class="btn btn-warning ml-2" data-toggle="modal"
                                        data-target="#importmodal" type="button" class="btn btn-warning text-white ml-2">
                                        <i class="fa fa-file-excel btn-tambah-data "></i>
                                    </button>
                                </span>
                                {{-- Akhir Button import Data --}}
                            @endcannot
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md rounded-5" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Posisi Jabatan</th>
                                        <th>Deskripsi Jabatan</th>
                                        <th>Tingkat Jabatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($posisiJabatanList as $item)
        <!-- Modal Detail nomor_klasifikasi -->
        <div class="modal fade" id="detail-modal{{ $item->id_posisi_jabatan }}" aria-labelledby="detail-modal"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header border-bottom pb-4">
                        <h5 class="modal-title" id="detail-modal">Detail Data Posisi Jabatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="row px-4 pt-4">
                        <div class=" col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group ">
                                <label for="nama_posisi_jabatan">Nama Posisi Jabatan: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend ">
                                        <div class="input-group-text bg-secondary">
                                            <i class="bi bi-tag-fill"></i>
                                        </div>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('nama_posisi_jabatan') is-invalid @enderror"
                                        placeholder="ex: Kepala Sekolah" value="{{ $item->nama_posisi_jabatan }}"
                                        id="nama_posisi_jabatan" name="nama_posisi_jabatan" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="capitalize" for="tingkat_jabatan">Tingkat Jabatan:
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend ">
                                        <div class="input-group-text bg-secondary">
                                            <i class="bi bi-stack"></i>
                                        </div>
                                    </div>
                                    <select class="form-control @error('tingkat_jabatan') is-invalid @enderror "
                                        id="tingkat_jabatan" name="tingkat_jabatan" disabled>
                                        <option selected disabled>Pilih Tingkat Jabatan</option>
                                        <option value="0" {{ $item->tingkat_jabatan === '0' ? 'selected' : '' }}>
                                            Jabatan Struktural</option>
                                        <option value="1" {{ $item->tingkat_jabatan === '1' ? 'selected' : '' }}>
                                            Jabatan Funsional Tertentu</option>
                                        <option value="2" {{ $item->tingkat_jabatan == '2' ? 'selected' : '' }}>
                                            Jabatan Fungsional Umum</option>
                                    </select>
                                </div>
                                <span class="text-danger">
                                    @error('tingkat_jabatan')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="deskripsi_jabatan">Masukkan Deskripsi Jabatan: </label>
                                <textarea class="summernote-simple summernote-disable @error('deskripsi_jabatan') is-invalid @enderror"
                                    id="deskripsi_jabatan" name="deskripsi" required> {{ $item->deskripsi_jabatan }} </textarea>
                                <span class="text-danger">
                                    @error('deskripsi_jabatan')
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
        {{-- End Detail nomor_klasifikasi --}}
    @endforeach

    @foreach ($posisiJabatanList as $item)
        <!-- Modal Edit Posisi Jabatan -->
        <div class="modal fade" id="edit-modal{{ $item->id_posisi_jabatan }}" aria-labelledby="edit-modal"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header border-bottom pb-4">
                        <h5 class="modal-title" id="edit-modal">Edit Data Posisi Jabatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/posisi-jabatan/{{ $item->id_posisi_jabatan }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="text" name="posisi_jabatan" value="{{ $item->id_posisi_jabatan }}" hidden>
                        <div class="row px-4 pt-4">
                            <div class=" col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group ">
                                    <label for="nama_posisi_jabatan">Nama Posisi Jabatan: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-tag-fill"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control @error('nama_posisi_jabatan') is-invalid @enderror"
                                            placeholder="ex: Kepala Sekolah" value="{{ $item->nama_posisi_jabatan }}"
                                            id="nama_posisi_jabatan" name="nama_posisi_jabatan" required autofocus>
                                    </div>
                                    <span class="text-danger">
                                        @error('nama_posisi_jabatan')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="tingkat_jabatan">Tingkat Jabatan:
                                    </label>
                                    <div class="input-group">
                                        <select
                                            class="form-control select2 @error('tingkat_jabatan') is-invalid @enderror "
                                            id="tingkat_jabatan" name="tingkat_jabatan" required style="width: 100%;">
                                            <option selected disabled>Pilih Tingkat Jabatan</option>
                                            <option value="0" {{ $item->tingkat_jabatan === '0' ? 'selected' : '' }}>
                                                Jabatan Strukturan</option>
                                            <option value="1" {{ $item->tingkat_jabatan === '1' ? 'selected' : '' }}>
                                                Jabatan Funsional Tertentu</option>
                                            <option value="2" {{ $item->tingkat_jabatan == '2' ? 'selected' : '' }}>
                                                Jabatan Fungsional Umum</option>
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('tingkat_jabatan')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="deskripsi_jabatan">Masukkan Deskripsi Jabatan: </label>
                                    <textarea class="summernote-simple @error('deskripsi_jabatan') is-invalid @enderror" id="deskripsi_jabatan"
                                        name="deskripsi_jabatan" required> {{ $item->deskripsi_jabatan }} </textarea>
                                    <span class="text-danger">
                                        @error('deskripsi_jabatan')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
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
        {{-- End Edit Posisi Jabatan --}}
    @endforeach

    <!-- Modal Tambah Posisi Jabatan -->
    <div class="modal fade" id="tambah-modal" aria-labelledby="tambah-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header border-bottom pb-4">
                    <h5 class="modal-title" id="tambah-modal">Tambah Data Posisi Jabatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('posisi-jabatan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row px-4 pt-4">
                        <div class=" col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group ">
                                <label for="nama_posisi_jabatan">Masukkan Nama Posisi Jabatan: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="bi bi-tag-fill"></i>
                                        </div>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('nama_posisi_jabatan') is-invalid @enderror"
                                        placeholder="ex: Kepala Sekolah" value="{{ old('nama_posisi_jabatan') }}"
                                        id="nama_posisi_jabatan" name="nama_posisi_jabatan" required autofocus>
                                </div>
                                <span class="text-danger">
                                    @error('nama_posisi_jabatan')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="capitalize" for="tingkat_jabatan">Tingkat Jabatan:
                                </label>
                                <div class="input-group">
                                    <select class="form-control select2 @error('tingkat_jabatan') is-invalid @enderror "
                                        id="tingkat_jabatan" name="tingkat_jabatan" required style="width: 100%;">
                                        <option selected disabled>Pilih Tingkat Jabatan</option>
                                        <option value="0" {{ old('tingkat_jabatan') === '0' ? 'selected' : '' }}>
                                            Jabatan Struktural</option>
                                        <option value="1" {{ old('tingkat_jabatan') === '1' ? 'selected' : '' }}>
                                            Jabatan Funsional Tertentu</option>
                                        <option value="2" {{ old('tingkat_jabatan') == '2' ? 'selected' : '' }}>
                                            Jabatan Fungsional Umum</option>
                                    </select>
                                </div>
                                <span class="text-danger">
                                    @error('tingkat_jabatan')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="deskripsi_jabatan">Masukkan Deskripsi Jabatan: </label>
                                <textarea class="summernote-simple @error('deskripsi_jabatan') is-invalid @enderror" id="deskripsi_jabatan"
                                    name="deskripsi_jabatan" required> {{ old('deskripsi_jabatan') }} </textarea>
                                <span class="text-danger">
                                    @error('deskripsi_jabatan')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
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
    {{-- End Tambah Posisi Jabatan --}}

    <!-- Modal Import -->
    <div class="modal fade" id="importmodal" aria-labelledby="importmodalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importmodalLabel">Import Posisi Jabatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('posisi-jabatan.import') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body py-4 px-4 mt-3 border border-1">
                        <span class="d-block">Unduh Template Import Posisi Jabatan: </span>
                        <a href="/file/Book4.xlsx" class="btn btn-1 px-4 mb-4 mt-1 w-100" type="button"
                            download="posisi-jabatan-template-import">
                            <span>Template Import Posisi Jabatan</span> <i
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
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>

    {{-- DataTables --}}
    <script>
        let tingkat_jabatan = $("#tingkat_jabatan").val();
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/posisi-jabatan-index') }}",
                    type: "post",
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.tingkat_jabatan = tingkat_jabatan;
                        return d
                        // You can add additional data here if needed
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: 'nama_posisi_jabatan',
                        name: 'Nama Posisi Jabatan'
                    },
                    {
                        data: 'deskripsi_jabatan',
                        name: 'Deskripsi Jabatan'
                    },
                    {
                        data: 'tingkat_jabatan',
                        name: 'Tingkat Jabatan'
                    },
                    {
                        data: 'action',
                        name: 'Action'
                    }
                ]
            });

            // Handle perubahan pilihan pada select box tingkat_jabatan
            $(".filter").change(function() {
                tingkat_jabatan = $(this).val(); // Perbarui variabel tingkat_jabatan
            });

            $('#filtering').on('click', function() {
                table.ajax.reload();
            });

            $('#reset').on('click', function() {
                $("#tingkat_jabatan").val(null).trigger('change');
                tingkat_jabatan = ""; // Reset variabel tingkat_jabatan
                table.ajax.reload();
            });
        });
    </script>

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
            const noteEditable = document.body.querySelectorAll(".note-editing-area");

            if (element.classList.contains("tombol-hapus")) {
                swal({
                        title: 'Apakah anda yakin?',
                        text: 'Ingin menghapus data posisi jabatan ini!',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal('Data posisi jabatan berhasil dihapus!', {
                                icon: 'success',
                            });
                            element.closest('form').submit();
                        } else {
                            swal('Data posisi jabatan tidak jadi dihapus!');
                        }
                    });
            }

            if (element.classList.contains("tombol-export")) {
                swal({
                        title: 'Apakah anda yakin?',
                        text: 'Ingin export data posisi jabatan ini?',
                        icon: 'info', // Change the icon to a question mark
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willExport) => {
                        if (willExport) {
                            swal('Data posisi jabatan berhasil diexport!', {
                                icon: 'success',
                            });

                            // Make an AJAX request to trigger the export
                            fetch('{{ route('posisi-jabatan.export') }}', {
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
                            swal('Data posisi jabatan tidak jadi diexport!');
                        }
                    });
            }
        })
    </script>
@endsection
