 {{-- Tombol Action --}}
 <div class="dropdown d-inline">
     <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false" title="Tombol Aksi">
         <i class="bi bi-three-dots-vertical btn-tambah-data"></i>
     </button>
     <div class="dropdown-menu ">
         <a class="dropdown-item has-icon text-info tombol-detail" data-id="{{ $usersList->id_user }}"
             href="{{ route($usersList->level . '.show', Crypt::encryptString($usersList->id_user)) }}"><i
                 class="far bi-eye"></i>
             Detail</a>
         <a class="dropdown-item has-icon text-warning tombol-edit" data-id="{{ $usersList->id_user }}"
             href="{{ route($usersList->level . '.edit', Crypt::encryptString($usersList->id_user)) }}"><i
                 class="far bi-pencil-square"></i>
             Edit</a>
         <form method="POST" action="{{ route($usersList->level . '.destroy', $usersList->id_user) }}"
             class="tombol-hapus">
             @csrf
             @method('DELETE')
             <button type="button" class="dropdown-item has-icon text-danger tombol-hapus">
                 <input type="hidden" name="oldImage" data-id="{{ $usersList->id_user }}"><i
                     class="far bi-trash-fill mt-2"></i>
                 <small class="tombol-hapus">Hapus</small>
             </button>
         </form>
     </div>
 </div>
 {{-- Tombol Action --}}
