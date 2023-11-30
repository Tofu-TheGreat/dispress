@extends('admin.pages.layout')

@section('css')
    <link href="{{ asset('assets/modules/datatables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link href="{{ asset('assets-landing-page/extension/filepond/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet"
        href="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.css') }}">
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
                        <h4 class="text-dark judul-page">Manajemen Nomor Klasifikasi</h4>
                    </div>
                    {{-- Akhir judul Page --}}
                    {{-- Breadcrumb --}}
                    <div class="col-md-3 col-sm-4 text-center items-center mt-2 ">
                        <div class="breadcrumb-item d-inline active"><a href="/dashboard">Dashboard</a></div>
                        <div class="breadcrumb-item d-inline">Nomor Klasifikasi</div>
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
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label class="capitalize" for="jabatan">Pilih Jabatan: </label>
                                <div class="input-group">
                                    <select class="filter select2 @error('jabatan') is-invalid  @enderror " id="jabatan"
                                        name="jabatan" required style="width: 100%">
                                        <option value="">Pilih Jabatan User</option>
                                        <option value="kp" {{ old('jabatan') == '0' ? 'selected' : '' }}>
                                            Kepala Sekolah</option>
                                        <option value="1" {{ old('jabatan') == '1' ? 'selected' : '' }}>
                                            Wakil Kepala Sekolah</option>
                                        <option value="2" {{ old('jabatan') == '2' ? 'selected' : '' }}>
                                            Kurikulum</option>
                                        <option value="3" {{ old('jabatan') == '3' ? 'selected' : '' }}>
                                            Kesiswaan</option>
                                        <option value="4" {{ old('jabatan') == '4' ? 'selected' : '' }}>
                                            Sarana Prasarana</option>
                                        <option value="5" {{ old('jabatan') == '5' ? 'selected' : '' }}>
                                            Kepala Jurusan</option>
                                        <option value="6" {{ old('jabatan') == '6' ? 'selected' : '' }}>
                                            Hubin</option>
                                        <option value="7" {{ old('jabatan') == '7' ? 'selected' : '' }}>
                                            Bimbingan Konseling</option>
                                        <option value="8" {{ old('jabatan') == '8' ? 'selected' : '' }}>
                                            Guru Umum</option>
                                        <option value="9" {{ old('jabatan') == '9' ? 'selected' : '' }}>
                                            Tata Usaha</option>
                                    </select>
                                </div>
                                <span class="text-danger">
                                    @error('jabatan')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-success mr-2 mb-1 " id="filtering" title="Filter">
                            <i class="bi bi-funnel mr-1 "></i><span class="bi-text mr-2">Filter Data</span></button>
                        <button type="button" id="reset" href="/nomor-klasifikasi" class="btn btn-secondary mb-1"
                            title="Reset">
                            <i class="bi bi-arrow-clockwise mr-1"></i><span class="bi-text mr-2">Reset
                                Filter</span></button>
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
                            <h4 class="text-primary judul-page">List Nomor Klasifikasi</h4>
                        </div>
                        <div class="col-lg-1 col-sm-4 btn-group">
                            {{-- Button Tambah Data --}}
                            <a href="/nomor-klasifikasi/create" class="text-white">
                                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                    title="Tambah Data" data-original-title="Tambah Data">
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-md rounded-5" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Telp</th>
                                        <th>Akses</th>
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

    @foreach ($nomorKlasifikasiList as $item)
        <!-- Modal Detail nomor_klasifikasi -->
        <div class="modal fade" id="detail-modal{{ $item->id_nomor_klasifikasi }}" aria-labelledby="detail-modal"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header border-bottom pb-4">
                        <h5 class="modal-title" id="detail-modal">Detail Data nomor_klasifikasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="row px-4 pt-4">
                        <div class="col-12">
                            @if ($item->foto_nomor_klasifikasi)
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('image_save/' . $item->foto_nomor_klasifikasi) }}"
                                        alt="foto {{ $item->nomor_klasifikasi }}" class="foto-nomor_klasifikasi">
                                </div>
                            @else
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('assets-landing-page/img/Building-bro.png') }}"
                                        alt="foto {{ $item->nomor_klasifikasi }}"
                                        class="foto-nomor_klasifikasi bg-primary">
                                </div>
                            @endif
                        </div>
                        <div class=" col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group ">
                                <label for="nama_nomor_klasifikasi">Nama nomor_klasifikasi: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend ">
                                        <div class="input-group-text bg-secondary">
                                            <i class="fas fa-building"></i>
                                        </div>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('nama_nomor_klasifikasi') is-invalid @enderror"
                                        placeholder="ex: PT Gayuh Net" value="{{ $item->nama_nomor_klasifikasi }}"
                                        id="nama_nomor_klasifikasi" name="nama_nomor_klasifikasi" readonly>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="nomor_telpon">Nomor Telepon nomor_klasifikasi: </label>
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

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="alamat_nomor_klasifikasi">Masukkan Alamat nomor_klasifikasi: </label>
                                <textarea class="summernote-simple summernote-disable @error('alamat_nomor_klasifikasi') is-invalid @enderror"
                                    id="alamat_nomor_klasifikasi" name="alamat_nomor_klasifikasi" readonly> {{ $item->alamat_nomor_klasifikasi }} </textarea>

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

    @foreach ($nomorKlasifikasiList as $item)
        <!-- Modal Edit nomor_klasifikasi -->
        <div class="modal fade" id="edit-modal{{ $item->id_nomor_klasifikasi }}" aria-labelledby="edit-modal"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header border-bottom pb-4">
                        <h5 class="modal-title" id="edit-modal">Edit Data nomor_klasifikasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/nomor_klasifikasi/{{ $item->id_nomor_klasifikasi }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="text" name="id_nomor_klasifikasi" value="{{ $item->id_nomor_klasifikasi }}"
                            hidden>
                        <div class="row px-4 pt-4">
                            <div class=" col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group ">
                                    <label for="nama_nomor_klasifikasi">Nama nomor_klasifikasi: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-building"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control @error('nama_nomor_klasifikasi') is-invalid @enderror"
                                            placeholder="ex: PT Gayuh Net" value="{{ $item->nama_nomor_klasifikasi }}"
                                            id="nama_nomor_klasifikasi" name="nama_nomor_klasifikasi" required autofocus>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="nomor_telpon">Nomor Telepon nomor_klasifikasi: </label>
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

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="alamat_nomor_klasifikasi">Masukkan Alamat nomor_klasifikasi: </label>
                                    <textarea class="summernote-simple @error('alamat_nomor_klasifikasi') is-invalid @enderror"
                                        id="alamat_nomor_klasifikasi" name="alamat_nomor_klasifikasi"> {{ $item->alamat_nomor_klasifikasi }} </textarea>
                                    <span class="text-danger">
                                        @error('alamat_nomor_klasifikasi')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group px-4">
                            <label for="foto_nomor_klasifikasi ">Masukkan foto nomor_klasifikasi: </label>
                            <small class="d-block">Catatan: masukkan foto dengan format (JPEG, PNG,
                                JPG),
                                maksimal 10
                                MB.</small>
                            <input type="file"
                                class="img-filepond-preview @error('foto_nomor_klasifikasi') is-invalid @enderror"
                                id="foto_nomor_klasifikasi" name="foto_nomor_klasifikasi" accept="jpg,jpeg,png,svg">

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
        {{-- End Edit nomor_klasifikasi --}}
    @endforeach

    <!-- Modal Tambah nomor_klasifikasi -->
    <div class="modal fade" id="tambah-modal" aria-labelledby="tambah-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header border-bottom pb-4">
                    <h5 class="modal-title" id="tambah-modal">Tambah Data nomor_klasifikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('nomor-klasifikasi.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row px-4 pt-4">
                        <div class=" col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group ">
                                <label for="nama_nomor_klasifikasi">Masukkan Nama nomor_klasifikasi: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-building"></i>
                                        </div>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('nama_nomor_klasifikasi') is-invalid @enderror"
                                        placeholder="ex: PT Gayuh Net" value="{{ old('nama_nomor_klasifikasi') }}"
                                        id="nama_nomor_klasifikasi" name="nama_nomor_klasifikasi" required autofocus>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="nomor_telpon">Masukkan Nomor Telepon nomor_klasifikasi: </label>
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

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="alamat_nomor_klasifikasi">Masukkan Alamat nomor_klasifikasi: </label>
                                <textarea class="summernote-simple @error('alamat_nomor_klasifikasi') is-invnlid @enderror"
                                    id="alamat_nomor_klasifikasi" name="alamat_nomor_klasifikasi" required> {{ old('alamat_nomor_klasifikasi') }} </textarea>

                            </div>
                        </div>
                    </div>
                    <div class="form-group px-4">
                        <label for="foto_nomor_klasifikasi ">Masukkan foto nomor_klasifikasi: </label>
                        <small class="d-block">Catatan: masukkan foto dengan format (JPEG, PNG,
                            JPG),
                            maksimal 10
                            MB.</small>
                        <input type="file"
                            class="img-filepond-preview @error('foto_nomor_klasifikasi') is-invalid @enderror"
                            id="foto_nomor_klasifikasi" name="foto_nomor_klasifikasi" accept="jpg,jpeg,png,svg">

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
    {{-- End Tambah nomor_klasifikasi --}}

    <!-- Modal Import -->
    <div class="modal fade" id="importmodal" aria-labelledby="importmodalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importmodalLabel">Import nomor_klasifikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('nomor-klasifikasi.import') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body py-4 px-4 mt-3 border border-1">
                        <span class="d-block">Unduh Template Import nomor_klasifikasi: </span>
                        <a href="/file/Book2.xlsx" class="btn btn-1 px-4 mb-4 mt-1 w-100" type="button"
                            download="nomor_klasifikasi-template-import">
                            <span>Template Import nomor_klasifikasi</span> <i
                                class="bi bi-file-earmark-excel-fill icon-btn-1 ms-2"></i></a>
                        @csrf
                        <div class="form-group">
                            <label for="import">Masukkan file Yang Ingin di-import: </label>
                            <small class="d-block">Catatan: masukkan file dengan format (XLSX), maksimal 10
                                MB.</small>
                            <input type="file" class="file-filepond-preview @error('file') is-invalid @enderror"
                                id="import" name="file" accept=".xlsx">

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
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>x
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/js/filepond.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/input-mask/jquery.inputmask.bundle.min.js') }}"></script>

    {{-- DataTables --}}
    <script>
        let jabatan = $("#jabatan").val();
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                processing: true,
                serverside: true,
                ajax: {
                    url: "{{ url('/officer-index') }}",
                    type: "post",
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.jabatan = jabatan;
                        return d
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: 'nama',
                        name: 'Nama',
                    },
                    {
                        data: 'email',
                        name: 'Email',
                    },
                    {
                        data: 'nomor_telpon',
                        name: 'Nomor Telepon'
                    },
                    {
                        data: 'akses',
                        name: 'Akses'
                    },
                    {
                        data: 'action',
                        name: 'Action',
                    }
                ]
            });
            // Handle perubahan pilihan pada select box jabatan
            $(".filter").change(function() {
                jabatan = $(this).val(); // Perbarui variabel jabatan
            });
            $('#filtering').on('click', function() {
                table.ajax.reload();
            });
            $('#reset').on('click', function() {
                $("#jabatan").val(null).trigger('change');
                jabatan = ""; // Reset variabel jabatan
                table.ajax.reload();
            });
        })
    </script>

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
                        text: 'Ingin menghapus data nomor_klasifikasi ini!',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal('Data nomor_klasifikasi berhasil dihapus!', {
                                icon: 'success',
                            });
                            element.closest('form').submit();
                        } else {
                            swal('Data nomor_klasifikasi tidak jadi dihapus!');
                        }
                    });
            }

            if (element.classList.contains("tombol-export")) {
                swal({
                        title: 'Apakah anda yakin?',
                        text: 'Ingin export data nomor_klasifikasi ini?',
                        icon: 'info', // Change the icon to a question mark
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willExport) => {
                        if (willExport) {
                            swal('Data nomor_klasifikasi berhasil diexport!', {
                                icon: 'success',
                            });

                            // Make an AJAX request to trigger the export
                            fetch('{{ route('nomor-klasifikasi.export') }}', {
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
                            swal('Data nomor_klasifikasi tidak jadi diexport!');
                        }
                    });
            }
        })
    </script>
@endsection