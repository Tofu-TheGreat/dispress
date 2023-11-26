@extends('admin.pages.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
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
                        <div class="breadcrumb-item d-inline active"><a href="/surat">Surat Masuk</a></div>
                        <div class="breadcrumb-item d-inline">Detail Surat</div>
                    </div>
                    {{-- Akhir Breadcrumb --}}
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="row card-header">
                    <div class="col-10">
                        <div class="row">
                            <a href="/surat" title="Kembali">
                                <i class="bi bi-arrow-left mr-3"></i>
                            </a>
                            <h4 class="text-primary ">Detail Surat Masuk</h4>
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-end btn-group">
                        <a href="/surat/{{ Crypt::encryptString($detailDataSurat->id_surat) }}/edit" class="text-white">
                            <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top"
                                title="Ajukan untuk Disposisi Surat Masuk"
                                data-original-title="Ajukan untuk Disposisi Surat Masuk">
                                Ajukan
                            </button>
                        </a>
                        <a href="{{ route('surat.edit', Crypt::encryptString($detailDataSurat->id_surat)) }}"
                            class="text-white ml-2">
                            <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                title="Edit Data Surat Masuk" data-original-title="Edit Data Surat Masuk">
                                <i class="bi bi-pencil btn-tambah-data"></i>
                            </button>
                        </a>
                        <form method="POST"
                            action="{{ route('surat.destroy', Crypt::encryptString($detailDataSurat->id_surat)) }}"
                            class="tombol-hapus">
                            @csrf
                            @method('DELETE')
                            <a href="#" class="text-white ml-2 tombol-hapus">
                                <button type="button" class="btn btn-danger tombol-hapus" data-toggle="tooltip"
                                    data-placement="top" title="Hapus Data Surat Masuk"
                                    data-original-title="Hapus Data Surat Masuk">
                                    <i class="bi bi-trash btn-tambah-data tombol-hapus"></i>
                                </button>
                            </a>
                        </form>
                    </div>
                </div>
                <div class="card-body ">
                    <form action="/surat" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="nomor_surat">Nomor Surat: </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-list-ol"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control capitalize @error('nomor_surat') is-invalid @enderror"
                                                    value="{{ $detailDataSurat->nomor_surat }}" id="nomor_surat"
                                                    name="nomor_surat" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="tanggal_surat">Tanggal Surat: </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-calendar3"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('tanggal_surat') is-invalid @enderror"
                                                    value="{{ $detailDataSurat->tanggal_surat }}" id="tanggal_surat"
                                                    name="tanggal_surat" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="isi_surat">Isi Surat: </label>
                                            <textarea class="summernote-simple @error('isi_surat') is-invalid @enderror" placeholder="ex: Perihal rapat paripurna"
                                                id="isi_surat" name="isi_surat" readonly> {{ $detailDataSurat->isi_surat }} </textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="id_perusahaan">Pengirim Surat: </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-person-rolodex"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('id_perusahaan') is-invalid @enderror"
                                                    value="{{ $perusahaanList->nama_perusahaan }}" id="id_perusahaan"
                                                    name="id_perusahaan" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="id_user">Penerima Surat: </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-person-rolodex"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('id_user') is-invalid @enderror"
                                                    value="{{ $detailDataSurat->user->nama }} | {{ $detailDataSurat->user->jabatan }}"
                                                    id="id_user" name="id_user" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <div class=" ">
                                    <a type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                        title="Preview surat (PDF)" data-original-title="Preview surat (PDF)"
                                        href="{{ asset('document_save/' . $detailDataSurat->scan_dokumen) }}"
                                        target="_blank" title="Read PDF"><i class="bi bi-file-pdf"
                                            style="font-size: 1.1rem;"></i></a>
                                    <a href="/surat" class="btn btn-warning  ">
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
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>

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

            $('.summernote-simple').next().find(".note-editable").attr("contenteditable", false);
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
