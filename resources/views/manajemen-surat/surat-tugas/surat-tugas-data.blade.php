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
                        <div class="breadcrumb-item d-inline">Surat Tugas</div>
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
            <form action="/surat-tugas-filter" method="get">
                @csrf
                <div class="collapse" id="collapseExample" style="">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group ">
                                    <label for="id_klasifikasi">Pilih Berdasarkan Nomor Klasifikasi: </label>
                                    <div class="input-group">
                                        <select
                                            class="filter form-control select2  @error('id_klasifikasi') is-invalid @enderror "
                                            id="id_klasifikasi" name="id_klasifikasi" style="width: 100%;" required>
                                            <option selected disabled>Pilih Nomor Klasifikasi</option>
                                            @foreach ($klasifikasiList as $data)
                                                <option value="{{ $data->id_klasifikasi }}"
                                                    {{ old('id_klasifikasi') == $data->id_klasifikasi ? 'selected' : '' }}>
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
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="id_user">Pilih Berdasarkan Pembuat Surat: </label>
                                    <div class="input-group">
                                        <select class="filter select2 @error('id_user') is-invalid  @enderror "
                                            id="id_user" name="id_user" style="width: 100%;">
                                            <option selected disabled>Pilih Pembuat Surat</option>
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
                            <div class="col-12 ">
                                <h6 class="text-primary text-center mb-4">Sortir berdasarkan Tanggal Pembuatan Surat
                                </h6>
                            </div>
                            <div class=" col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="capitalize" for="tanggal_surat_awal">Dari Tanggal Awal Pembuatan
                                        Surat:
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
                                            id="tanggal_surat_terakhir" name="tanggal_surat_terakhir" style="width: 80%;">
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
                                <i class="bi bi-funnel mr-1 "></i><span class="bi-text mr-2">Filter
                                    Data</span></button>
                            <a type="button" id="reset" href="{{ route('surat.index') }}"
                                class="btn btn-secondary mb-1" title="Reset">
                                <i class="bi bi-arrow-clockwise mr-1"></i><span class="bi-text mr-2">Reset
                                    Filter</span></a>
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
                            <h4 class="text-primary judul-page">List Surat Tugas</h4>
                        </div>
                        <div class="col-lg-1 col-sm-4 btn-group">
                            @can('admin')
                                {{-- Button Tambah Data --}}
                                <a href="/surat-tugas/create" class="text-white">
                                    <button type="button" class="btn btn-primary" data-toggle="tooltip"
                                        data-placement="top" title="Tambah Data" data-original-title="Tambah Data">
                                        <i class="fa fa-plus-circle btn-tambah-data"></i>
                                    </button>
                                </a>
                                {{-- Akhir Button Tambah Data --}}
                            @endcan
                            {{-- Button Export Data --}}
                            <a href="#" class="text-white ml-2 tombol-export">
                                <button type="button" class="btn btn-success tombol-export" data-toggle="tooltip"
                                    data-placement="top" title="Export Data Excel" data-original-title="Export Data">
                                    <i class="fa fa-file-excel btn-tambah-data tombol-export"></i>
                                </button>
                            </a>
                            {{-- Akhir Button Export Data --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end mb-3">
                                <form action="{{ route('search.surat-tugas') }}" method="post">
                                    @csrf
                                    <div class="container-input">
                                        <input type="text" placeholder="Search" name="search" class="search"
                                            id="searchInput">
                                        <i class="bi bi-search-heart search-icon"></i>
                                        <div class="button-search">
                                            <button type="submit"
                                                class="btn btn-primary button-submit-search">Search</button>
                                            <a type="button" href="{{ route('surat-tugas.index') }}"
                                                class="btn btn-secondary rounded-pill button-reset-search"><span>Reset</span></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                <div class="row">
                                    @if ($suratTugasList->isEmpty())
                                        <div class="d-flex justify-content-center align-content-center">
                                            <img src="{{ asset('assets-landing-page/img/No data-rafiki.png') }}"
                                                class="w-50">
                                        </div>
                                    @else
                                        @foreach ($suratTugasList as $data)
                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class="card card-primary card-surat shadow-sm">
                                                    <div class="card-header d-flex justify-content-between">
                                                        <div class="position-relative">
                                                            <h4>{{ $data->nomor_surat_tugas }}</h4>
                                                            <small class="text-primary"
                                                                style="position: absolute; top: 50%;width: max-content;">Pengirim
                                                                {{ $data->pengirim->nama }}
                                                            </small>
                                                        </div>
                                                        <div class="card-header-action btn-group tombol-ajukan">
                                                            <a data-collapse="#mycard-collapse{{ $data->id_surat_tugas }}"
                                                                class="btn btn-icon btn-info" href="#"><i
                                                                    class="fas fa-minus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="collapse show"
                                                        id="mycard-collapse{{ $data->id_surat_tugas }}">
                                                        <div class="card-body card-body-surat position-relative "
                                                            style="min-height: 130px">
                                                            <p class="w-75"> {!! $data->tujuan_pelaksanaan !!}</p>
                                                            <p class="mt-3" style="font-size: .7rem;">
                                                                --
                                                                {{ date('d-F-Y', strtotime($data->tanggal_surat_tugas)) }}
                                                                --</p>
                                                            <div class="d-flex flex-column btn-group-action">
                                                                @can('admin')
                                                                    <a href="{{ route('surat-tugas.show', Crypt::encryptString($data->id_surat_tugas)) }}"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Detail data surat"
                                                                        data-original-title="Detail data surat"
                                                                        class="btn btn-info has-icon text-white tombol-detail-card"
                                                                        href=""><i class="pl-1  bi bi-eye "></i>
                                                                    </a>
                                                                    <a type="button" data-toggle="tooltip"
                                                                        data-placement="left" title="Edit data surat"
                                                                        data-original-title="Edit data surat"
                                                                        class="btn btn-warning has-icon text-white tombol-edit-card"
                                                                        href="{{ route('surat-tugas.edit', Crypt::encryptString($data->id_surat_tugas)) }}"><i
                                                                            class="pl-1  bi bi-pencil-square "></i>
                                                                    </a>
                                                                    <form method="POST"
                                                                        action="{{ route('surat-tugas.destroy', Crypt::encryptString($data->id_surat_tugas)) }}"
                                                                        class="tombol-hapus">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="button" data-toggle="tooltip"
                                                                            data-placement="bottom" title="Hapus data surat"
                                                                            data-original-title="Hapus data surat"
                                                                            class="btn btn-danger has-icon text-white tombol-hapus-card tombol-hapus"
                                                                            href=""><i
                                                                                class="pl-1  bi bi-trash tombol-hapus"></i>
                                                                        </button>
                                                                    </form>
                                                                @endcan
                                                            </div>
                                                            @cannot('admin')
                                                                <a href="{{ route('surat-tugas.show', Crypt::encryptString($data->id_surat_tugas)) }}"
                                                                    data-toggle="tooltip" data-placement="right"
                                                                    title="Detail data surat tugas"
                                                                    data-original-title="Detail data surat tugas"
                                                                    class="btn btn-info has-icon text-white mr-1"
                                                                    href=""><i class="bi bi-eye"></i>
                                                                </a>
                                                            @endcannot
                                                        </div>
                                                        <div
                                                            class="card-footer d-flex justify-content-between position-relative">
                                                            <div class="d-flex flex-row ">
                                                                <div>
                                                                    <div class="user-detail-name">
                                                                        <span class="text-primary" href="#">
                                                                            {{ $data->pengirim->nama }}</span>
                                                                    </div>
                                                                    <div class="text-job">
                                                                        <small style="max-width: max-content">
                                                                            {{ currencyPhone($data->pengirim->nomor_telpon) }}
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center " style="margin-left: 15%;">
                                                                <a type="button" class="btn btn-primary btn-scan-pdf"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Cetak surat tugas"
                                                                    data-original-title="Cetak surat tugas"
                                                                    href="{{ route('cetak.surat-tugas', Crypt::encryptString($data->id_surat_tugas)) }}"
                                                                    target="_blank" title="Read PDF"><i
                                                                        class="bi bi-printer-fill"
                                                                        style="font-size: 1.1rem;"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-12">
                                            {{ $suratTugasList->onEachSide(1)->links() }}
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

@endsection
@section('script')
    {{-- modules --}}
    <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/js/filepond.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/input-mask/jquery.inputmask.bundle.min.js') }}"></script>

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
    {{-- seweetalert confirmation --}}

    <script>
        document.body.addEventListener("click", function(event) {
            const element = event.target;
            const noteEditable = document.body.querySelectorAll(".note-editing-area");

            if (element.classList.contains("tombol-hapus")) {
                swal({
                        title: 'Apakah anda yakin?',
                        text: 'Ingin menghapus data surat tugas ini!',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal('Data surat tugas berhasil dihapus!', {
                                icon: 'success',
                            });
                            element.closest('form').submit();
                        } else {
                            swal('Data surat tugas tidak jadi dihapus!');
                        }
                    });
            }

            if (element.classList.contains("tombol-export")) {
                swal({
                        title: 'Apakah anda yakin?',
                        text: 'Ingin export data surat tugas ini?',
                        icon: 'info', // Change the icon to a question mark
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willExport) => {
                        if (willExport) {
                            swal('Data surat tugas berhasil diexport!', {
                                icon: 'success',
                            });

                            // Make an AJAX request to trigger the export
                            fetch('{{ route('surat.tugas.export') }}', {
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
                            swal('Data surat tugas tidak jadi diexport!');
                        }
                    });
            }
        })
    </script>
@endsection
