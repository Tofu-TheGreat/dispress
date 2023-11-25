@extends('admin.pages.layout')

@section('css')
    <link href="{{ asset('assets-landing-page/extension/filepond/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
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
                        <div class="breadcrumb-item d-inline">Edit Data</div>
                    </div>
                    {{-- Akhir Breadcrumb --}}
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-1 mr-3">
                                <a href="/surat">
                                    <i class="bi bi-arrow-left"></i>
                                </a>
                            </div>
                            <div class="col-">
                                <h4 class="text-primary">Edit Data Surat Masuk</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <form action="/surat/{{ $editDataSurat->id_surat }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="text" name="id_surat" value="{{ $editDataSurat->id_surat }}" id=""
                                hidden>
                            <input type="text" name="id_user" value="{{ $editDataSurat->id_user }}" id=""
                                hidden>
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
                                                        placeholder="ex: 090/1928-TU/2023"
                                                        value="{{ $editDataSurat->nomor_surat }}" id="nomor_surat"
                                                        name="nomor_surat">
                                                </div>
                                                <span class="text-danger">
                                                    @error('nomor_surat')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
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
                                                    <input type="date"
                                                        class="form-control datepicker capitalize @error('tanggal_surat') is-invalid @enderror"
                                                        placeholder="ex:  11/14/2023"
                                                        value="{{ $editDataSurat->tanggal_surat }}" id="tanggal_surat"
                                                        name="tanggal_surat">
                                                </div>
                                                <span class="text-danger">
                                                    @error('tanggal_surat')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="isi_surat">Ringkasan Surat: </label>
                                                <textarea class="summernote-simple @error('isi_surat') is-invalid @enderror" placeholder="ex: Perihal rapat paripurna"
                                                    id="isi_surat" name="isi_surat" required> {{ $editDataSurat->isi_surat }} </textarea>
                                                <span class="text-danger">
                                                    @error('isi_surat')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="capitalize" for="id_perusahaan">Pengirim Surat: </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <div class="input-group-text bg-secondary">
                                                            <i class="bi bi-person-rolodex "></i>
                                                        </div>
                                                    </div>
                                                    <select
                                                        class="form-control select2  @error('id_perusahaan') is-invalid @enderror "
                                                        id="id_perusahaan" name="id_perusahaan" required>
                                                        <option selected disabled>Pilih Pengirim Surat</option>
                                                        @foreach ($perusahaanList as $data)
                                                            <option value="{{ $data->id_perusahaan }}"
                                                                {{ $editDataSurat->id_perusahaan == $data->id_perusahaan ? 'selected' : '' }}>
                                                                {{ $data->nama_perusahaan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <span class="text-danger">
                                                    @error('id_perusahaan')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="d-flex justify-content-between">
                                                    <div class="">
                                                        <label for="foto">Masukkan Scan Dokumen Surat: </label>
                                                        <small class="d-block">Catatan: masukkan dokumen dengan format
                                                            (PDF),
                                                            maksimal 10
                                                            MB.</small>
                                                    </div>
                                                    <a type="button" class="btn btn-danger mb-2" data-toggle="tooltip"
                                                        data-placement="top" title="Preview surat (PDF)"
                                                        data-original-title="Preview surat (PDF)"
                                                        href="{{ asset('document_save/' . $editDataSurat->scan_dokumen) }}"
                                                        target="_blank" title="Read PDF"><i class="bi bi-file-pdf"
                                                            style="font-size: 1.1rem;"></i></a>
                                                </div>
                                                <input type="file"
                                                    class="img-filepond-preview @error('scan_dokumen') is-invalid @enderror"
                                                    id="scan_dokumen" name="scan_dokumen" accept="pdf"
                                                    value="{{ $editDataSurat->scan_dokumen }}">
                                                <span class="text-danger">
                                                    @error('scan_dokumen')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <div class="row d-flex justify-content-end">
                                    <div class="ml-2 ">
                                        <a href="/surat" class="btn btn-warning  ">
                                            <i class="bi bi-arrow-90deg-left fs-6 l-1"></i>
                                            <span class="bi-text">Kembali</span>
                                        </a>
                                    </div>
                                    <div class="ml-2">
                                        <button type="submit" class="btn btn-primary mb-1">
                                            <i class="bi bi-clipboard-check-fill fs-6 mr-1"></i>
                                            <span class="bi-text">Save Data</span></button>
                                    </div>
                                    <div class="ml-2 ">
                                        <button type="reset" class="btn btn-secondary">
                                            <i class="bi bi-arrow-counterclockwise fs-6 mr-1"></i>
                                            <span class="bi-text">Reset</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/js/filepond.js') }}"></script>
    <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.phone').inputmask('9999-9999-9999');

            $('#nip').inputmask('999999999999999999');
        });
    </script>

    {{-- Preview Image --}}
    <script>
        function previewImage() {
            const image = document.querySelector('#foto_user')
            const imgPreview = document.querySelector('.img-preview')

            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onLoad = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
    {{-- Akhir Preview Image --}}
    {{-- seweetalert confirmation --}}

    <script>
        document.body.addEventListener("click", function(event) {
            const element = event.target;

            if (element.classList.contains("tombol-hapus-profile")) {
                swal({
                    title: 'Apakah anda yakin?',
                    text: 'Ingin menghapus foto profile Admin ini?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        swal('Foto profile Admin berhasil dihapus!', {
                            icon: 'success',
                        });
                        // Make an AJAX request to trigger the delete
                        fetch('{{ route('deleteImageFromUser', $editDataSurat->id_surat) }}', {
                                method: 'GET',
                            })
                            .then(response => {
                                // Handle the response here (e.g., trigger the delete)
                                if (response.ok) {

                                    window.location.reload();
                                }
                            })
                            .catch(error => {
                                // Handle any errors here
                                console.error('Error:', error);
                            });
                    } else {
                        swal('Foto profile Admin tidak jadi dihapus!');
                    }
                });
            }
        });
    </script>
@endsection
