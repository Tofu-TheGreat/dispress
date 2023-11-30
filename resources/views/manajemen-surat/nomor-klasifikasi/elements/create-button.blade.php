 {{-- Tombol Action --}}
 <div class="dropdown d-inline">
     <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false" title="Tombol Aksi">
         <i class="bi bi-three-dots-vertical btn-tambah-data"></i>
     </button>
     <div class="dropdown-menu ">
         <a class="dropdown-item has-icon text-info tombol-detail" data-id="{{ $klasifikasiList->id_klasifikasi }}"
             href="{{ route('nomor-klasifikasi.show', Crypt::encryptString($klasifikasiList->id_klasifikasi)) }}"><i
                 class="far bi-eye"></i>
             Detail</a>
         <a class="dropdown-item has-icon text-warning tombol-edit" data-id="{{ $klasifikasiList->id_klasifikasi }}"
             href="{{ route('nomor-klasifikasi.edit', Crypt::encryptString($klasifikasiList->id_klasifikasi)) }}"><i
                 class="far bi-pencil-square"></i>
             Edit</a>
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
 {{-- Tombol Action --}}
