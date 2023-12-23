<?php

use App\Http\Controllers\{KlasifikasiController, AdminController, PengajuanController, Controller, ExportController, ImportController, ProfileController, OfficerController, InstansiController, StaffController, SuratController, DisposisiController, PosisiJabatanController, SuratKeluarController, WebSettingController};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/login', function () {
    return view('pages.login');
})->middleware('guest');

Route::get('/register', function () {
    return view('pages.register');
})->middleware('guest');

// Manajemen setting

Route::post('/register', [LoginController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register_web_setting', [LoginController::class, 'register_web_setting'])->name('register.web.setting');
Route::post('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::post('/profile-edit/{id}', [ProfileController::class, 'editProfile'])->middleware('auth')->name('profile-edit');
Route::post('/profile-change-password/{id}', [ProfileController::class, 'changePassword'])->middleware('auth');

Route::get('/web-setting', [WebSettingController::class, 'index'])->middleware('auth');
Route::get('/web-setting/create', [WebSettingController::class, 'create']);
Route::post('/web-setting-edit/{id}', [WebSettingController::class, 'update'])->name('web-setting-edit')->middleware('auth');
Route::get('/deleteImageWebSetting/{id}', [WebSettingController::class, 'deleteImageWebSetting'])->name('deleteImageWebSetting');

// Manajemen user

Route::get('/dashboard-admin', [Controller::class, 'dashboardAdmin'])->middleware('auth', 'role:admin');
Route::get('/dashboard-officer', [Controller::class, 'dashboardOfficer'])->middleware('auth', 'role:officer');
Route::get('/dashboard-staff', [Controller::class, 'dashboardStaff'])->middleware('auth', 'role:staff');

Route::resource('/admin', AdminController::class)->middleware('auth');


Route::get('/deleteImageFromUser/{id}', [AdminController::class, 'deleteImageFromUser'])->name('deleteImageFromUser');
Route::post('/filter', [AdminController::class, 'filterDataAdmin'])->name('filterDataAdmin');

Route::get('admin-export', [ExportController::class, 'export_admin'])->name('admin.export');
Route::post('admin-import', [ImportController::class, 'import_user'])->name('admin.import')->middleware('auth', 'role:admin');

Route::resource('/officer', OfficerController::class)->middleware('auth');

Route::get('officer-export', [ExportController::class, 'export_officer'])->name('officer.export');
Route::post('officer-import', [ImportController::class, 'import_user'])->name('officer.import');

Route::resource('/staff', StaffController::class)->middleware('auth');

Route::get('staff-export', [ExportController::class, 'export_staff'])->name('staff.export');
Route::post('staff-import', [ImportController::class, 'import_user'])->name('staff.import');

Route::post("/admin-index", [AdminController::class, "indexAdmin"]);
Route::post("/staff-index", [StaffController::class, "indexAdmin"]);
Route::post("/officer-index", [OfficerController::class, "indexAdmin"]);

// Manajemen Posisi Jabatan

Route::resource('/posisi-jabatan', PosisiJabatanController::class)->middleware('auth');
Route::post("/posisi-jabatan-index", [PosisiJabatanController::class, "indexPosisiJabatan"]);
Route::get("/posisi-jabatan-export", [ExportController::class, "export_posisijabatan"])->name('posisi-jabatan.export');
Route::post('posisi-jabatan-import', [ImportController::class, 'import_posisijabatan'])->name('posisi-jabatan.import');

// Manajemen instansi


Route::resource('/instansi', InstansiController::class)->middleware('auth');

Route::get('instansi-export', [ExportController::class, 'export_instansi'])->name('instansi.export');
Route::post('instansi-import', [ImportController::class, 'import_instansi'])->name('instansi.import');
Route::post('instansi-search', [InstansiController::class, 'search'])->name('search.instansi');

// Manajemen Nomor Klasifikasi

Route::resource('/nomor-klasifikasi', KlasifikasiController::class)->middleware('auth');

Route::post("/klasifikasi-index", [KlasifikasiController::class, "indexKlasifikasi"]);

Route::get('nomor-klasifikasi-export', [ExportController::class, 'export_nomorklasifikasi'])->name('nomor-klasifikasi.export');
Route::post('nomor-klasifikasi-import', [ImportController::class, 'import_nomorklasifikasi'])->name('nomor-klasifikasi.import');

// Manajemen Surat

Route::resource('/surat', SuratController::class)->middleware('auth');

Route::get('surat-export', [ExportController::class, 'export_surat'])->name('surat.export');
Route::post('surat-import', [ImportController::class, 'import_user'])->name('surat.import');

Route::get('/surat-filter', [SuratController::class, 'filterData'])->name('filter.surat');
Route::post('/surat-verifikasi/{id}', [SuratController::class, 'verifikasi_surat'])->name('verifikasi.surat');
Route::post('/search-surat', [SuratController::class, 'search'])->name('search.surat');

// Manajemen Pengajuan Disposisi

Route::resource('/pengajuan-disposisi', PengajuanController::class)->middleware('auth');
Route::get('/pengajuan-filter', [PengajuanController::class, 'filterData'])->middleware('auth');
Route::get('/search-pengajuan', [PengajuanController::class, 'search'])->name('search.pengajuan');
Route::get('pengajuan-export', [ExportController::class, 'export_pengajuan'])->name('pengajuan.export');

Route::get('template-user', [ExportController::class, 'template_user'])->name('template.user');

// Manajemen Disposisi

Route::resource('/disposisi', DisposisiController::class)->middleware('auth');

Route::get('disposisi-export', [ExportController::class, 'export_disposisi'])->name('disposisi.export', 'role:admin');
Route::post('disposisi-import', [ImportController::class, 'import_user'])->name('disposisi.import', 'role:admin');

Route::get('/disposisi-filter', [DisposisiController::class, 'filterData'])->name('filter.disposisi', 'role:admin');
Route::get('/disposisi-filter-all', [DisposisiController::class, 'filterDataAll'])->name('filter.all.disposisi', 'role:admin');
Route::get('/search-disposisi', [DisposisiController::class, 'search'])->name('search.disposisi', 'role:admin');
Route::get('/search-disposisi-all', [DisposisiController::class, 'searchForAll'])->name('search.semua.disposisi', 'role:admin');

Route::get('/disposisi-cetak/{id}', [DisposisiController::class, 'cetakDisposisi'])->name('cetak.disposisi');

// manajemen surat keluar

Route::resource('/surat-keluar', SuratKeluarController::class)->middleware('auth');
