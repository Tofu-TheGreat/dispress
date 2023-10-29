@extends('admin.pages.layout')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex">
                    {{-- judul Page --}}
                    <div class="col-md-8 col-sm-8">
                        <h4 class="text-dark judul-page">Manajemen Users</h4>
                    </div>
                    {{-- Akhir judul Page --}}
                    {{-- Breadcrumb --}}
                    <div class="col-md-4 col-sm-4 text-center items-center mt-2 ">
                        <div class="breadcrumb-item d-inline active"><a href="/dashboard">Dashboard</a></div>
                        <div class="breadcrumb-item d-inline active"><a href="/admin">Administrator</a></div>
                        <div class="breadcrumb-item d-inline">Tambah Data</div>
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
                                <a href="/admin">
                                    <i class="bi bi-arrow-left"></i>
                                </a>
                            </div>
                            <div class="col-">
                                <h4 class="text-primary">Tambah Data Administrator</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <form action="/admin" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class=" col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group ">
                                        <label for="nama">Masukkan Nama : </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-person-fill"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                placeholder="Masukkan Nama Lengkap" value="{{ old('nama') }}"
                                                id="nama" name="nama" required autofocus>
                                        </div>
                                        <span class="text-danger">
                                            @error('nama')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class=" col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="capitalize" for="nim">Masukkan NIM : </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-key-fill"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control @error('nim') is-invalid @enderror"
                                                placeholder="Masukkan NIM" value="{{ old('nim') }}" id="nim"
                                                name="nim" required>
                                        </div>
                                        <span class="text-danger">
                                            @error('nim')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="username">Masukkan Username : </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-person-badge-fill"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror"
                                                placeholder="Masukkan Username" value="{{ old('username') }}" id="username"
                                                name="username" required>
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
                                        <label class="capitalize" for="level">Pilih Level : </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-layer-group"></i>
                                                </div>
                                            </div>
                                            <select class="form-control  @error('level') is-invalid @enderror "
                                                id="level" name="level" required>
                                                <option selected disabled>Pilih Level User</option>
                                                <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}
                                                    selected>
                                                    Admin</option>
                                                <option value="officer" {{ old('level') == 'officer' ? 'selected' : '' }}>
                                                    Officer</option>
                                                <option value="staff" {{ old('level') == 'staff' ? 'selected' : '' }}>
                                                    Staff</option>
                                            </select>
                                        </div>
                                        <span class="text-danger">
                                            @error('level')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="capitalize" for="jabatan">Pilih Jabatan : </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-layer-group"></i>
                                                </div>
                                            </div>
                                            <select class="form-control  @error('jabatan') is-invalid @enderror "
                                                id="jabatan" name="jabatan" required>
                                                <option selected disabled>Pilih Jabatan User</option>
                                                <option value="0" {{ old('jabatan') == '0' ? 'selected' : '' }}>
                                                    Kepala Sekolah</option>
                                                <option value="1" {{ old('jabatan') == '1' ? 'selected' : '' }}>
                                                    Wakil Kepala Sekolah</option>
                                                <option value="2" {{ old('jabatan') == '2' ? 'selected' : '' }}>
                                                    Kurikulum</option>
                                                <option value="3" {{ old('jabatan') == '3' ? 'selected' : '' }}>
                                                    Kesiswaan</option>
                                                <option value="4" {{ old('jabatan') == '4' ? 'selected' : '' }}>
                                                    Sarana Prasarana</option>
                                                <option value="5" {{ old('jabatan') == '5' ? 'selected' : '' }}>
                                                    Kepala Jurusan</option>
                                                <option value="6" {{ old('jabatan') == '6' ? 'selected' : '' }}>
                                                    Hubin</option>
                                                <option value="7" {{ old('jabatan') == '7' ? 'selected' : '' }}>
                                                    Bimbingan Konseling</option>
                                                <option value="8" {{ old('jabatan') == '8' ? 'selected' : '' }}>
                                                    Guru Umum</option>
                                                <option value="9" {{ old('jabatan') == '9' ? 'selected' : '' }}>
                                                    Tata Usaha</option>
                                            </select>
                                        </div>
                                        <span class="text-danger">
                                            @error('jabatan')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Masukkan Email : </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-envelope-fill"></i>
                                                </div>
                                            </div>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="contoh@gmail.com" value="{{ old('email') }}"
                                                id="email" name="email" required>
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
                                        <label for="no_telp">Masukkan Nomor Telepon : </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-telephone-fill"></i>
                                                </div>
                                            </div>
                                            <input type="number"
                                                class="form-control @error('nomor_telpon') is-invalid @enderror"
                                                placeholder="Masukkan Nomor Telpon" value="{{ old('nomor_telpon') }}"
                                                id="nomor_telpon" name="nomor_telpon" required>
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
                                        <label for="password">Masukkan Password : </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-lock-fill"></i>
                                                </div>
                                            </div>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Masukkan Password" value="{{ old('password') }}"
                                                id="password" name="password" required>
                                        </div>
                                        <span class="text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="foto">Masukkan Foto : </label>
                                <small class="d-block">Catatan : Masukkan Foto dengan Format(png, jpg, jpeg), maksimal 1
                                    mb</small>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="bi bi-file-earmark-image"></i>
                                        </div>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input @error('foto_user') is-invalid @enderror"
                                            id="foto_user" name="foto_user" onchange="previewImage()"
                                            accept="jpg,jpeg,png,svg">
                                        <label class="custom-file-label" for="foto_user">Pilih Foto</label>
                                    </div>
                                    <input type="file" class="custom-file-input ">
                                    <img id="preview" src="#" alt="your image" class="img-preview"
                                        style="display:none;" />
                                </div>
                                <span class="text-danger">
                                    @error('foto_user')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <div class="row d-flex justify-content-end">
                                    <div class="ml-2 ">
                                        <a href="/admin" class="btn btn-warning  ">
                                            <i class="bi bi-arrow-90deg-left fs-6 l-1"></i>
                                            <span class="bi-text">Kembali</span>
                                        </a>
                                    </div>
                                    <div class="ml-2">
                                        <button type="submit" class="btn btn-primary mb-1">
                                            <i class="bi bi-clipboard-plus-fill fs-6 mr-1"></i>
                                            <span class="bi-text">Tambah Data</span></button>
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

@section('script')
    <script>
        foto_user.onchange = evt => {
            preview = document.getElementById('preview');
            preview.style.display = 'block'
            const [file] = foto_user.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>

    {{-- @if (Session::has('success'))
        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "12000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('Are you the 6 fingered man?', 'Miracle Max Says')
        </script>
    @endif --}}
@endsection
@endsection
