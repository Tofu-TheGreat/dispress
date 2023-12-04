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
                    <div class="col-md-7 col-sm-12">
                        <h4 class="text-dark judul-page">Manajemen Surat</h4>
                    </div>
                    {{-- Akhir judul Page --}}
                    {{-- Breadcrumb --}}
                    <div class="col-md-5 col-sm-12 text-center items-center mt-2 ">
                        <div class="breadcrumb-item d-inline active"><a href="/dashboard">Dashboard</a></div>
                        <div class="breadcrumb-item d-inline active"><a href="/pengajuan-disposisi">Pengajuan Disposisi</a>
                        </div>
                        <div class="breadcrumb-item d-inline">Detail Data</div>
                    </div>
                    {{-- Akhir Breadcrumb --}}
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <span data-toggle="tooltip" data-placement="top"
                                title="Ini adalah data surat yang akan Didisposisikan."
                                data-original-title="Ini adalah data surat yang akan Didisposisikan." disabled>
                                <i class="bi bi-question-circle"></i>
                            </span>
                            <div class="col">
                                <h4 class="text-primary">Data Surat</h4>
                            </div>
                            <div class="col d-flex justify-content-end btn-group">
                                {{-- Button Triger Filter --}}
                                <span data-toggle="tooltip" data-placement="top" title="Detail Surat."
                                    data-original-title="Detail Surat." disabled>
                                    <a data-collapse="#mycard-collapse{{ $detailDataPengajuan->id_pengajuan }}"
                                        class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                                </span>
                                {{-- Akhir Button Triger Filter --}}
                            </div>
                        </div>
                        <div class="collapse show " id="mycard-collapse{{ $detailDataPengajuan->id_pengajuan }}">
                            <div class="col-12 mt-3">
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
                                            value="{{ $detailDataPengajuan->surat->nomor_surat }}" id="nomor_surat"
                                            name="nomor_surat" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
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
                                            value="{{ date('d-F-Y', strtotime($detailDataPengajuan->surat->tanggal_surat)) }}"
                                            id="tanggal_surat" name="tanggal_surat" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="isi_surat">Isi Surat: </label>
                                        <a type="button" class="btn btn-danger mb-2" data-toggle="tooltip"
                                            data-placement="top" title="Preview surat (PDF)"
                                            data-original-title="Preview surat (PDF)"
                                            href="{{ asset('document_save/' . $detailDataPengajuan->surat->scan_dokumen) }}"
                                            target="_blank" title="Read PDF"><i class="bi bi-file-pdf"
                                                style="font-size: 1.1rem;"></i></a>
                                    </div>
                                    <textarea class="summernote-simple summernote-disable @error('isi_surat') is-invalid @enderror"
                                        placeholder="ex: Perihal rapat paripurna" id="isi_surat" name="isi_surat" readonly> {{ $detailDataPengajuan->surat->isi_surat }} </textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group ">
                                    <label for="status_verifikasi">Verifikasi Surat: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend ">
                                            <div class="input-group-text bg-secondary">
                                                <i class="bi bi-patch-question-fill"></i>
                                            </div>
                                        </div>
                                        <select
                                            class="form-control select2  @error('status_verifikasi') is-invalid @enderror "
                                            id="status_verifikasi" name="status_verifikasi" disabled>
                                            <option selected disabled>Pilih Sifat Surat</option>
                                            <option value="0"
                                                {{ $detailDataPengajuan->surat->status_verifikasi === '0' ? 'selected' : '' }}>
                                                Belum Terverifikasi</option>
                                            <option value="1"
                                                {{ $detailDataPengajuan->surat->status_verifikasi === '1' ? 'selected' : '' }}>
                                                Terverifikasi</option>
                                            <option value="2"
                                                {{ $detailDataPengajuan->surat->status_verifikasi == '2' ? 'selected' : '' }}>
                                                Dikembalikan</option>
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('status_verifikasi')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="id_instansi">Pengirim Surat: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">
                                                <i class="bi bi-person-rolodex"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control @error('id_instansi') is-invalid @enderror"
                                            value="{{ $detailDataPengajuan->surat->instansi->nama_instansi }}"
                                            id="id_instansi" name="id_instansi" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-8">
                    <div class="card">
                        <div class="row card-header">
                            <div class="col-lg-11 col-sm-8">
                                <div class="row">
                                    <a href="/pengajuan-disposisi" title="Kembali">
                                        <i class="bi bi-arrow-left mr-3"></i>
                                    </a>
                                    <h4 class="text-primary" style="max-width: max-content;">Detail Pengajuan Disposisi
                                    </h4>
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-4 d-flex justify-content-end btn-group">
                                <a href="{{ route('pengajuan-disposisi.edit', Crypt::encryptString($detailDataPengajuan->id_pengajuan)) }}"
                                    class="text-white ml-2">
                                    <button type="button" class="btn btn-primary" data-toggle="tooltip"
                                        data-placement="top" title="Edit Data Pengajuan Disposisi"
                                        data-original-title="Edit Data Pengajuan Disposisi">
                                        <i class="bi bi-pencil btn-tambah-data"></i>
                                    </button>
                                </a>
                                <form method="POST"
                                    action="{{ route('pengajuan-disposisi.destroy', Crypt::encryptString($detailDataPengajuan->id_pengajuan)) }}"
                                    class="tombol-hapus">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" class="text-white ml-2 tombol-hapus">
                                        <button type="button" class="btn btn-danger tombol-hapus" data-toggle="tooltip"
                                            data-placement="top" title="Hapus Data Pengajuan Disposisi"
                                            data-original-title="Hapus Data Pengajuan Disposisi">
                                            <i class="bi bi-trash btn-tambah-data tombol-hapus"></i>
                                        </button>
                                    </a>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="/pengajuan-disposisi" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="id_klasifikasi">Nomor Klasifikasi: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi bi-list-ol"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control capitalize @error('id_klasifikasi') is-invalid @enderror"
                                                            value="{{ $detailDataPengajuan->klasifikasi->nomor_klasifikasi }} | {{ $detailDataPengajuan->klasifikasi->nama_klasifikasi }}"
                                                            id="id_klasifikasi" name="id_klasifikasi" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="nomor_agenda">Nomor Agenda: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi bi-list-ol"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control capitalize @error('nomor_agenda') is-invalid @enderror"
                                                            value="{{ $detailDataPengajuan->nomor_agenda }} "
                                                            id="nomor_agenda" name="nomor_agenda" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="tanggal_terima">Tanggal Terima: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi bi-calendar3"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control @error('tanggal_terima') is-invalid @enderror"
                                                            value="{{ date('d-F-Y', strtotime($detailDataPengajuan->tanggal_terima)) }}"
                                                            id="tanggal_terima" name="tanggal_terima" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="catatan_pengajuan">Catatan Pengajuan: </label>
                                                    <textarea class="summernote-simple @error('catatan_pengajuan') is-invalid @enderror"
                                                        placeholder="ex: Perihal rapat paripurna" id="catatan_pengajuan" name="catatan_pengajuan" readonly> {{ $detailDataPengajuan->catatan_pengajuan }} </textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="status_pengajuan">Status Pengajuan: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi  bi-envelope-exclamation-fill"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control @error('status_pengajuan') is-invalid @enderror"
                                                            value="{{ $detailDataPengajuan->status_pengajuan }}"
                                                            id="status_pengajuan" name="status_pengajuan" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="id_user">Pengirim Pengajuan: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi  bi-envelope-exclamation-fill"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control @error('id_user') is-invalid @enderror"
                                                            value="{{ $detailDataPengajuan->user->nama }}" id="id_user"
                                                            name="id_user" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
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
                                                            value="{{ $detailDataPengajuan->tujuan_pengajuan }}"
                                                            id="tujuan_disposisi" name="tujuan_disposisi" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <div class=" ">
                                            <a href="/pengajuan-disposisi" class="btn btn-warning  ">
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
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>

    <script>
        // Mendapatkan elemen dengan class tertentu
        const mycardCollapse = document.querySelector(".collapse");

        // Menghapus kelas 'show' jika lebar layar kurang dari atau sama dengan 991px
        if (window.innerWidth <= 991) {
            mycardCollapse.classList.toggle("show");
        }

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
                        text: 'Ingin menghapus data pengajuan ini?',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            swal('Data pengajuan berhasil dihapus!', {
                                icon: 'success',
                            });
                            element.closest('form').submit();
                        } else {
                            swal('Data pengajuan tidak jadi dihapus!');
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
