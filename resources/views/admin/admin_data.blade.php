@extends('admin.pages.layout')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex">
                    {{-- judul Page --}}
                    <div class="col-md-9 col-sm-8">
                        <h4 class="text-dark">Manajemen Users</h4>
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
                        <div class="col-lg-11 col-sm">
                            <h4 class="text-primary">List Administrator</h4>
                        </div>
                        <div class="col-lg-1 col-sm d-flex justify-content-end">
                            {{-- Button Tambah Data --}}
                            <a href="/administrator/create" class="text-white">
                                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                    title="Tambah Data" data-original-title="Tambah Data">
                                    <i class="fa fa-plus-circle btn-tambah-data"></i>
                                </button>
                            </a>
                            {{-- Akhir Button Tambah Data --}}
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- FORM PENCARIAN -->
                        <div class="">
                            <form class="" action="/administrator" method="get">
                                <div class="input-group input-group mb-3 float-right" style="width: 350px;">
                                    <input type="search" name="katakunci" class="form-control float-right"
                                        placeholder="Masukkan Kata Kunci" value="{{ Request::get('katakunci') }}"
                                        aria-label="Search">
                                    <div class="input-group-append mr-1">
                                        <button type="submit" title="Cari" class="btn btn-light"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                    <div class="input-group-append ">
                                        <a href="" title="Refresh" class="btn btn-light"><i
                                                class="fas fa-circle-notch"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- Akhir Form Pencarian --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
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
                                                        href="/administrator/{{ $data->id }}"
                                                        title="klik Untuk Detailnya">
                                                        {{ $data->nama }}</a></td>
                                                <td>{{ $data->email }}</td>
                                                <td class="capitalize">{{ $data->level }}</td>
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
                            {{-- panigation --}}
                            {{ $users->links() }}
                            {{-- Akhir Pagination --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
