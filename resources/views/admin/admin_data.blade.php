@extends('admin.pages.layout')

@section('css')
    <link href="{{ asset('assets/modules/datatables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">
    <link href="{{ asset('assets-landing-page/extension/filepond/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.css') }}">
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex">
                    {{-- judul Page --}}
                    <div class="col-md-9 col-sm-8">
                        <h4 class="text-dark judul-page">Manajemen Users</h4>
                    </div>
                    {{-- Akhir judul Page --}}
                    {{-- Breadcrumb --}}
                    <div class="col-md-3 col-sm-4 text-center items-center mt-2 ">
                        <div class="breadcrumb-item d-inline active"><a href="/dashboard">Dashboard</a></div>
                        <div class="breadcrumb-item d-inline">Administrator</div>
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
                            <h4 class="text-primary judul-page">List Administrator</h4>
                        </div>
                        <div class="col-lg-1 col-sm-4 btn-group">
                            {{-- Button Tambah Data --}}
                            <a href="/admin/create" class="text-white">
                                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                    title="Tambah Data" data-original-title="Tambah Data">
                                    <i class="fa fa-plus-circle btn-tambah-data"></i>
                                </button>
                            </a>
                            {{-- Akhir Button Tambah Data --}}
                            {{-- Button Export Data --}}
                            <a href="#" class="text-white ml-2 tombol-export">
                                <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top"
                                    title="Export Data Excel" data-original-title="Export Data">
                                    <i class="fa fa-file-excel btn-tambah-data "></i>
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

    <!-- Modal Import -->
    <div class="modal fade" id="importmodal" aria-labelledby="importmodalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importmodalLabel">Modal Import Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if (Session::has('import_success'))
                    <p>{{ session('import_success') }}</p>
                @elseif (Session::has('failed'))
                    <p>{{ session('failed') }}</p>
                @endif
                @if ($errors->any())
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                @endif
                <form action="{{ route('admin.import') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body py-4 px-4 mt-3 border border-1">
                        <span class="d-block">Unduh Template Import Admin : </span>
                        <a href="/file/Book1.xlsx" class="btn btn-1 px-4 mb-4 mt-1 w-100" type="button"
                            download="Admin-template-import">
                            <span>Template Import Admin</span> <i
                                class="bi bi-file-earmark-excel-fill icon-btn-1 ms-2"></i></a>
                        @csrf
                        <div class="form-group">
                            <label for="import">Masukkan File Yang Ingin di Import : </label>
                            <small class="d-block">Catatan : Masukkan File dengan Format(xlsx), maksimal 10
                                mb</small>
                            <input type="file" class="file-filepond-preview @error('file') is-invalid @enderror"
                                id="import" name="file" accept=".xlsx">
                            <span class="text-danger">
                                @error('file')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-danger"data-dismiss="modal" aria-label="Close">Close <i
                                class="bi bi-x-circle ml-3"></i></button>
                        <button type="submit" value="Import" class="btn btn-primary text-white">
                            Click Untuk
                            import <i class="bi bi-clipboard-check-fill ml-3"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal Import --}}

@section('script')
    {{-- modules --}}
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/js/filepond.js') }}"></script>
    {{-- DataTables --}}
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverside: true,
                ajax: {
                    url: "{{ url('/admin-index') }}",
                    type: "post",
                    data: {
                        _token: "{{ csrf_token() }}"
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: true,
                        searchable: false
                    }, {
                        data: 'nama',
                        name: 'Nama',
                    }, {
                        data: 'email',
                        name: 'Email',
                    }, {
                        data: 'nomor_telpon',
                        name: 'Nomor Telepon'
                    },
                    {
                        data: 'level',
                        name: 'Akses'
                    },
                    {
                        data: 'action',
                        name: 'Action',
                    }
                ]
            });
        })
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

    {{-- seweetalert confirmation --}}
    <script>
        $('body').on('click', '.tombol-hapus', function(e) {
            swal({
                    title: 'Apakah anda yakin?',
                    text: 'ingin menghapus data Admin ini !',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal('Data Admin berhasil di hapus !', {
                            icon: 'success',
                        });
                        e.target.closest('form').submit();
                    } else {
                        swal('Data Admin tidak jadi di hapus !');
                    }
                });
        });
    </script>

    <script>
        $('body').on('click', '.tombol-export', function(e) {
            swal({
                    title: 'Apakah anda yakin?',
                    text: 'ingin export data Admin ini ?',
                    icon: 'info', // Change the icon to a question mark
                    buttons: true,
                    dangerMode: true,
                })
                .then((willExport) => {
                    if (willExport) {
                        swal('Data Admin berhasil di export !', {
                            icon: 'success',
                        });

                        // Make an AJAX request to trigger the export
                        fetch('{{ route('admin.export') }}', {
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
                        swal('Data Admin tidak jadi di export !');
                    }
                });
        });
    </script>
@endsection
@endsection
