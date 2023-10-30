@extends('admin.pages.layout')

@section('css')
    <link href="{{ asset('assets-landing-page/extension/datatables/datatables.min.css') }}" rel="stylesheet">
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
                        <div class="col-lg-1 col-sm-4 btn-groub">
                            {{-- Button Tambah Data --}}
                            <a href="/admin/create" class="text-white">
                                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                    title="Tambah Data" data-original-title="Tambah Data">
                                    <i class="fa fa-plus-circle btn-tambah-data"></i>
                                </button>
                            </a>
                            {{-- Akhir Button Tambah Data --}}
                            {{-- Button Export Data --}}
                            <a href="/" class="text-white ml-2">
                                <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top"
                                    title="Export Data Excel" data-original-title="Export Data">
                                    <i class="fa fa-file-excel btn-tambah-data "></i>
                                </button>
                            </a>
                            {{-- Akhir Button Export Data --}}
                            {{-- Button import Data --}}
                            <button type="button" class="btn btn-warning ml-2" data-toggle="modal"
                                data-target="#importmodal" type="button" class="btn btn-warning text-white ml-2"
                                data-toggle="tooltip" data-placement="top" title="Import Data Excel"
                                data-original-title="Import Data">
                                <i class="fa fa-file-excel btn-tambah-data "></i>
                            </button>
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
                                <tbody>
                                    @if ($users->count() > 0)
                                        @foreach ($users as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="capitalize"><a class="text-dark"
                                                        href="/admin/{{ $data->id_user }}" title="klik Untuk Detailnya">
                                                        {{ $data->nama }}</a></td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ substr(chunk_split($data->nomor_telpon, 4, '-'), 0, -1) }}</td>
                                                <td class="text-uppercase">{{ $data->level }}</td>
                                                <td>
                                                    {{-- Tombol Action --}}
                                                    <div class="dropdown d-inline">
                                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton2" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false" title="Tombol Aksi">
                                                            <i class="bi bi-three-dots-vertical btn-tambah-data"></i>
                                                        </button>
                                                        <div class="dropdown-menu ">
                                                            <a class="dropdown-item has-icon text-info"
                                                                href="/administrator/{{ $data->id }}"><i
                                                                    class="far bi-eye"></i>
                                                                Detail</a>
                                                            <a class="dropdown-item has-icon text-warning"
                                                                href="/administrator/{{ $data->id }}/edit"><i
                                                                    class="far bi-pencil-square"></i>
                                                                Edit</a>
                                                            <form action="/administrator/{{ $data->id }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="confirm dropdown-item has-icon text-danger">
                                                                    <input type="hidden" name="oldImage"
                                                                        value="{{ $data->foto }}"><i
                                                                        class="far bi-trash-fill mt-2"></i><small>Hapus</small></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    {{-- Tombol Action --}}
                                                </td>
                                        @endforeach
                                    @else
                                        <td colspan="7" class="text-center bg-secondary">Belum ada Data
                                            Admin
                                        </td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Import -->
    <div class="modal fade" id="importmodal" aria-labelledby="importmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importmodalLabel">Modal Import Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body py-5 px-4 mt-4 border border-1">
                    <div class="input-group mb-3 ">
                        <form action="/import-users" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="export">Masukkan File Yang Ingin di Export : </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" type="file" name="file"
                                        id="export" style="width: 420px" accept=".xlsx, .xls">
                                    <label class="custom-file-label" for="export">Choose file</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"data-dismiss="modal" aria-label="Close">Close</button>
                    <button type="submit" value="Import" class="btn btn-success text-white">
                        Click Untuk
                        import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Import --}}

@section('script')
    <script src="{{ asset('assets-landing-page/extension/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        })
    </script>
@endsection
@endsection
