{{-- Tombol Action --}}
@can('admin-officer')
    <div class="dropdown d-inline">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" title="Tombol Aksi">
            <i class="bi bi-three-dots-vertical btn-tambah-data"></i>
        </button>
        <div class="dropdown-menu">
            <button class="dropdown-item has-icon text-info tombol-detail" data-toggle="modal"
                data-target="#detail-modal{{ $klasifikasiList->id_klasifikasi }}"
                data-id="{{ $klasifikasiList->id_klasifikasi }}">
                <i class="far bi-eye mt-2"></i>
                <small class="tombol-detail">Detail</small>
            </button>
            <button class="dropdown-item has-icon text-warning tombol-edit" data-toggle="modal"
                data-target="#edit-modal{{ $klasifikasiList->id_klasifikasi }}"
                data-id="{{ $klasifikasiList->id_klasifikasi }}">
                <i class="far bi-pencil-square mt-2"></i>
                <small class="tombol-edit">Edit</small>
            </button>
            <form method="POST"
                action="{{ route('nomor-klasifikasi.destroy', Crypt::encryptString($klasifikasiList->id_klasifikasi)) }}"
                class="tombol-hapus">
                @csrf
                @method('DELETE')
                <button type="button" class="dropdown-item has-icon text-danger tombol-hapus">
                    <input type="hidden" name="oldImage" data-id="{{ $klasifikasiList->id_klasifikasi }}"><i
                        class="far bi-trash-fill mt-2"></i>
                    <small class="tombol-hapus">Hapus</small>
                </button>
            </form>
        </div>
    </div>
@endcan
@can('staff')
    <button class="btn btn-info has-icon text-white tombol-detail" data-toggle="modal"
        data-target="#detail-modal{{ $klasifikasiList->id_klasifikasi }}" data-id="{{ $klasifikasiList->id_klasifikasi }}">
        <i class="far bi-eye mt-2"></i>
        <small class="tombol-detail mr-2"></small>Detail Data
    </button>
@endcan
{{-- Tombol Action --}}
