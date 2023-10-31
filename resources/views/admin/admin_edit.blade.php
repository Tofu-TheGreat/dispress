@extends('admin.pages.layout')

@section('css')
    <link href="{{ asset('assets-landing-page/extension/filepond/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.css') }}">
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
                        <div class="breadcrumb-item d-inline active"><a href="/admin">Administrator</a></div>
                        <div class="breadcrumb-item d-inline">Edit Data</div>
                    </div>
                    {{-- Akhir Breadcrumb --}}
                </div>
            </div>
        </div>

        @foreach ($editDataAdmin as $data)
            <div class="section-body">
                <div class="">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-1 mr-1">
                                        <a href="/admin">
                                            <i class="bi bi-arrow-left"></i>
                                        </a>
                                    </div>
                                    <div class="col-">
                                        <h4 class="text-primary">Edit Data Administrator</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <form action="/admin/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" name="oldImage" value="{{ $data->foto }}">
                                            @if ($data->foto_user)
                                                <div class="d-flex justify-content-center">
                                                    <img src="{{ asset('image_save/' . $data->foto_user) }}"
                                                        alt="foto  img-preview {{ $data->username }}" class="foto-user">
                                                </div>
                                            @else
                                                <div class="d-flex justify-content-center">
                                                    <img src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                                        alt="foto img-preview {{ $data->username }}" class="foto-user">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="nama">Nama : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi bi-person-fill"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control capitalize @error('nama') is-invalid @enderror"
                                                            placeholder="Masukkan Nama Lengkap" value="{{ $data->nama }}"
                                                            id="nama" name="nama">
                                                    </div>
                                                    <span class="text-danger">
                                                        @error('nama')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username">Username : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi bi-person-badge-fill"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control @error('username') is-invalid @enderror"
                                                            placeholder="Masukkan Username" value="{{ $data->username }}"
                                                            id="username" name="username">
                                                    </div>
                                                    <span class="text-danger">
                                                        @error('username')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="email">Email : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi bi-envelope-fill"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            placeholder="contoh154@gmail.com" value="{{ $data->email }}"
                                                            id="email" name="email">
                                                    </div>
                                                    <span class="text-danger">
                                                        @error('email')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nomor_telpon">Nomor Telepon : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <i class="bi bi-telephone-fill"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control phone @error('nomor_telpon') is-invalid @enderror"
                                                            placeholder="Masukkan Nomor Telepon"
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
                                        </div>
                                        <div class="form-group">
                                            <label for="level">Pilih Level : </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text  bg-secondary">
                                                        <i class="bi bi-layers-fill"></i>
                                                    </div>
                                                </div>
                                                <select class="form-control" id="level" name="level">
                                                    <option selected disabled>Pilih Level</option>
                                                    <option value="admin" selected>Admin</option>
                                                    <option value="petugas">Petugas</option>
                                                    <option value="wali">wali</option>
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
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="foto">Masukkan Foto : </label>
                                        <small class="d-block">Catatan : Masukkan Foto dengan Format(jpeg,png,jpg),
                                            maksimal 10
                                            mb</small>
                                        <input type="file"
                                            class="img-filepond-preview @error('foto_user') is-invalid @enderror"
                                            id="foto_user" name="foto_user" accept="jpg,jpeg,png,svg">
                                        <span class="text-danger">
                                            @error('foto_user')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <div class="mr-2">
                                        <a href="/administrator" class="btn btn-warning pe-2 mb-1"><i
                                                class="bi bi-arrow-90deg-left fs-6 mr-1"></i> <span
                                                class="bi-text">Kembali</span>
                                        </a>
                                    </div>
                                    <div class="mr-2">
                                        <button type="submit" class="btn btn-primary mb-1 "><i
                                                class="bi bi-clipboard-plus-fill fs-6 mr-1"></i>
                                            <span class="bi-text">Edit Data</span></button>
                                    </div>
                                    <div class="">
                                        <button type="reset" class="btn btn-secondary"><i
                                                class="bi bi-arrow-counterclockwise fs-6 mr-1"></i> <span
                                                class="bi-text">Reset</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@section('script')
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets-landing-page/extension/filepond/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets-landing-page/js/filepond.js') }}"></script>

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
@endsection
@endsection
