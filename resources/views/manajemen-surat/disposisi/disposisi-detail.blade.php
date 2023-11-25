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
                        <div class="breadcrumb-item d-inline active"><a href="/disposisi">Disposisi</a></div>
                        <div class="breadcrumb-item d-inline">Detail Disposisi</div>
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
                            <a href="/disposisi" title="Kembali">
                                <i class="bi bi-arrow-left mr-3"></i>
                            </a>
                            <h4 class="text-primary ">Detail Disposisi</h4>
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-end btn-group">
                        <a href="{{ route('disposisi.edit', Crypt::encryptString($detailDataDisposisi->id_disposisi)) }}"
                            class="text-white ml-2">
                            <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                title="Edit Data Disposisi" data-original-title="Edit Data Disposisi">
                                <i class="bi bi-pencil btn-tambah-data"></i>
                            </button>
                        </a>
                        <form method="POST"
                            action="{{ route('disposisi.destroy', Crypt::encryptString($detailDataDisposisi->id_disposisi)) }}"
                            class="tombol-hapus">
                            @csrf
                            @method('DELETE')
                            <a href="#" class="text-white ml-2 tombol-hapus">
                                <button type="button" class="btn btn-danger tombol-hapus" data-toggle="tooltip"
                                    data-placement="top" title="Hapus Data Disposisi"
                                    data-original-title="Hapus Data Disposisi">
                                    <i class="bi bi-trash btn-tambah-data tombol-hapus"></i>
                                </button>
                            </a>
                        </form>
                    </div>
                </div>
                <div class="card-body ">
                    <form action="/disposisi" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="id_surat">Nomor Surat Disposisi: </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-list-ol"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control capitalize @error('id_surat') is-invalid @enderror"
                                                    value="{{ $detailDataDisposisi->surat->nomor_surat }}" id="id_surat"
                                                    name="id_surat" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="tanggal_disposisi">Tanggal Disposisi: </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-calendar3"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('tanggal_disposisi') is-invalid @enderror"
                                                    value="{{ $detailDataDisposisi->tanggal_disposisi }}"
                                                    id="tanggal_disposisi" name="tanggal_disposisi" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="catatan_disposisi">Catatan Disposisi: </label>
                                            <textarea class="summernote-simple @error('catatan_disposisi') is-invalid @enderror"
                                                placeholder="ex: Perihal rapat paripurna" id="catatan_disposisi" name="catatan_disposisi" readonly> {{ $detailDataDisposisi->catatan_disposisi }} </textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="sifat_disposisi">Sifat Disposisi: </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi  bi-envelope-exclamation"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('sifat_disposisi') is-invalid @enderror"
                                                    value="{{ $detailDataDisposisi->sifat_disposisi }}" id="sifat_disposisi"
                                                    name="sifat_disposisi" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="status_disposisi">Status Surat: </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi  bi-envelope-exclamation-fill"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('status_disposisi') is-invalid @enderror"
                                                    value="{{ $detailDataDisposisi->status_disposisi }}"
                                                    id="status_disposisi" name="status_disposisi" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="id_user">Pengirim Disposisi: </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-person-rolodex"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('id_user') is-invalid @enderror"
                                                    value="{{ $detailDataDisposisi->user->nama }}" id="id_user"
                                                    name="id_user" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="tujuan_disposisi">Tujuan Disposisi: </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">
                                                        <i class="bi bi-person-rolodex"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('tujuan_disposisi') is-invalid @enderror"
                                                    value="{{ $detailDataDisposisi->tujuan_disposisi }}"
                                                    id="tujuan_disposisi" name="tujuan_disposisi" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <div class=" ">
                                    <a type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                        title="Preview surat (PDF)" data-original-title="Preview surat (PDF)"
                                        href="{{ asset('document_save/' . $detailDataDisposisi->scan_dokumen) }}"
                                        target="_blank" title="Read PDF"><i class="bi bi-file-pdf"
                                            style="font-size: 1.1rem;"></i></a>
                                    <a href="/disposisi" class="btn btn-warning  ">
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
                        text: 'Ingin menghapus data disposisi ini?',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            swal('Data disposisi berhasil dihapus!', {
                                icon: 'success',
                            });
                            element.closest('form').submit();
                        } else {
                            swal('Data disposisi tidak jadi dihapus!');
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
