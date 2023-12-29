@extends('admin.pages.layout')

@section('css')
    <link href="{{ asset('assets-landing-page/extension/filepond/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex">
                    {{-- judul Page --}}
                    <div class="col-md-8 col-sm-12">
                        <h4 class="text-dark judul-page">Manajemen Users</h4>
                    </div>
                    {{-- Akhir judul Page --}}
                    {{-- Breadcrumb --}}
                    <div class="col-md-4 col-sm-12 text-center items-center mt-2 ">
                        <div class="breadcrumb-item d-inline active"><a href="/dashboard">Dashboard</a></div>
                        <div class="breadcrumb-item d-inline active"><a href="/staff">Staff</a></div>
                        <div class="breadcrumb-item d-inline">Edit Data</div>
                    </div>
                    {{-- Akhir Breadcrumb --}}
                </div>
            </div>
        </div>

        @foreach ($editDataStaff as $data)
            <div class="section-body">
                <div class="">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-1 mr-3">
                                    <a href="/staff">
                                        <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <div class="col-">
                                    <h4 class="text-primary">Edit Data Staff</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <form action="/staff/{{ $data->id_user }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="text" name="id_user" value="{{ $data->id_user }}" id="" hidden>
                                <div class="row">
                                    <div class="col-md-4 position-relative">
                                        <div class="form-group">
                                            <input type="hidden" name="oldImage" value="{{ $data->foto }}">
                                            @if ($data->foto_user)
                                                <div class="d-flex justify-content-center">
                                                    <img src="{{ asset('image_save/' . $data->foto_user) }}"
                                                        alt="foto img-preview {{ $data->username }}" class="foto-user">
                                                </div>
                                                <div
                                                    class=" d-flex justify-content-center  p-2 position-absolute btn-hapus-foto tombol-hapus-profile">
                                                    <button type="button" data-toggle="tooltip" data-placement="top"
                                                        title="Hapus Foto Profile" data-original-title="Hapus Foto Profile"
                                                        class="btn btn-icon icon-left btn-danger btn-sm px-md-3 px-sm-1 tombol-hapus-profile"><i
                                                            class="fas fa-trash"></i>Hapus
                                                    </button>
                                                </div>
                                            @else
                                                <div class="d-flex justify-content-center">
                                                    <img src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                                        alt="foto {{ $data->username }}" class="foto-user">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="nip">NIP: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi bi-key-fill"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control capitalize @error('nip') is-invalid @enderror"
                                                            placeholder="ex: 213720078171677275"
                                                            value="{{ $data->nip }}" id="nip" name="nip">
                                                    </div>
                                                    <span class="text-danger">
                                                        @error('nip')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="nama">Nama: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi bi-person-fill"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control capitalize @error('nama') is-invalid @enderror"
                                                            placeholder="ex: Pasya Nada Abinaya"
                                                            value="{{ $data->nama }}" id="nama" name="nama">
                                                    </div>
                                                    <span class="text-danger">
                                                        @error('nama')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="username">Username: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi bi-person-badge-fill"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control @error('username') is-invalid @enderror"
                                                            placeholder="ex: pasyaNada" value="{{ $data->username }}"
                                                            id="username" name="username">
                                                    </div>
                                                    <span class="text-danger">
                                                        @error('username')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="email">Email: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi bi-envelope-fill"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            placeholder="ex: contoh@gmail.com"
                                                            value="{{ $data->email }}" id="email" name="email">
                                                    </div>
                                                    <span class="text-danger">
                                                        @error('email')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="nomor_telpon">Nomor Telepon: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi bi-telephone-fill"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control phone @error('nomor_telpon') is-invalid @enderror"
                                                            placeholder="ex: 0878-2730-3388"
                                                            value="{{ $data->nomor_telpon }}" id="nomor_telpon"
                                                            name="nomor_telpon">
                                                    </div>
                                                    <span class="text-danger">
                                                        @error('nomor_telpon')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="level">Pilih Level: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text  bg-secondary">
                                                                <i class="bi bi-layers-fill"></i>
                                                            </div>
                                                        </div>
                                                        <select class="form-control select2" id="level"
                                                            name="level">
                                                            <option selected disabled>Pilih Level</option>
                                                            <option value="admin">Admin</option>
                                                            <option value="officer">officer</option>
                                                            <option value="staff" selected>staff</option>
                                                        </select>
                                                    </div>
                                                    <span class="text-danger">
                                                        @error('level')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label class="capitalize" for="jenis_kelamin">Jenis Kelamin: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                @if ($data->jenis_kelamin == 'L')
                                                                    <i class="bi bi-gender-male"></i>
                                                                @elseif($data->jenis_kelamin == 'P')
                                                                    <i class="bi bi-gender-female"></i>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <select
                                                            class="form-control select2 @error('jenis_kelamin') is-invalid  @enderror "
                                                            id="jenis_kelamin" name="jenis_kelamin" required>
                                                            <option selected disabled>Pilih Jenis Kelamin User</option>
                                                            <option value="L"
                                                                {{ $data->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                                                Laki-Laki
                                                            </option>
                                                            <option value="P"
                                                                {{ $data->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                                                Perempuan
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <span class="text-danger">
                                                        @error('jenis_kelamin')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label class="capitalize" for="id_posisi_jabatan">Pilih Posisi
                                                        Jabatan:
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi bi-person-fill-exclamation"></i>
                                                            </div>
                                                        </div>
                                                        <select
                                                            class="form-control select2 @error('id_posisi_jabatan') is-invalid  @enderror "
                                                            id="id_posisi_jabatan" name="id_posisi_jabatan" required>
                                                            <option selected disabled>Pilih Posisi Jabatan User</option>
                                                            @foreach ($posisiJabatanList as $item)
                                                                <option value="{{ $item->id_posisi_jabatan }}"
                                                                    {{ $data->id_posisi_jabatan == $item->id_posisi_jabatan ? 'selected' : '' }}>
                                                                    {{ $item->nama_posisi_jabatan }} |
                                                                    {{ jabatanConvert($item->tingkat_jabatan, 'jabatan') }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <span class="text-danger">
                                                        @error('id_posisi_jabatan')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="pangkat">Pangkat: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi bi-stack"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control @error('pangkat') is-invalid @enderror"
                                                            placeholder="ex: Pembina Utama Muda"value="{{ $data->pangkat === null ? '-' : $data->pangkat }}"
                                                            id="pangkat" name="pangkat">
                                                    </div>
                                                    <span class="text-danger">
                                                        @error('pangkat')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="golongan">Golongan: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi bi-collection-fill"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control @error('golongan') is-invalid @enderror"
                                                            placeholder="ex: IV-C"
                                                            value="{{ $data->golongan === null ? '-' : $data->golongan }}"
                                                            id="golongan" name="golongan">
                                                    </div>
                                                    <span class="text-danger">
                                                        @error('golongan')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="foto">Masukkan Foto: </label>
                                                <small class="d-block">Catatan: masukkan foto dengan format (JPEG, PNG,
                                                    JPG),
                                                    maksimal 10
                                                    MB.</small>
                                                <input type="file"
                                                    class="img-filepond-preview @error('foto_user') is-invalid @enderror"
                                                    id="foto_user" name="foto_user" accept="jpg,jpeg,png">
                                                <span class="text-danger">
                                                    @error('foto_user')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <div class="row d-flex justify-content-end">
                                        <div class="ml-2 ">
                                            <a href="/staff" class="btn btn-warning  ">
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
        @endforeach
    </section>
@endsection
@section('script')
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/js/filepond.js') }}"></script>
    <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>

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
                    text: 'Ingin menghapus foto profile Staff ini?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        swal('Foto profile Staff berhasil dihapus!', {
                            icon: 'success',
                        });
                        // Make an AJAX request to trigger the delete
                        fetch('{{ route('deleteImageFromUser', $data->id_user) }}', {
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
                        swal('Foto profile Staff tidak jadi dihapus!');
                    }
                });
            }
        });
    </script>
@endsection
