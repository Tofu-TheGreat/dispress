<?php

use App\Http\Controllers\{KlasifikasiController, AdminController, Controller, ExportController, ImportController, ProfileController, OfficerController, InstansiController, StaffController, SuratController, DisposisiController};
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

Route::get('/dashboard', [Controller::class, 'dashboard'])->middleware('auth', 'role:admin');

Route::post('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

Route::resource('/admin', AdminController::class)->middleware('auth');

Route::get('/deleteImageFromUser/{id}', [AdminController::class, 'deleteImageFromUser'])->name('deleteImageFromUser');
Route::post('/filter', [AdminController::class, 'filterDataAdmin'])->name('filterDataAdmin');

Route::get('admin-export', [ExportController::class, 'export_admin'])->name('admin.export');
Route::post('admin-import', [ImportController::class, 'import_user'])->name('admin.import');

Route::resource('/officer', OfficerController::class)->middleware('auth');

Route::get('officer-export', [ExportController::class, 'export_officer'])->name('officer.export');
Route::post('officer-import', [ImportController::class, 'import_user'])->name('officer.import');

Route::resource('/staff', StaffController::class)->middleware('auth');

Route::get('staff-export', [ExportController::class, 'export_staff'])->name('staff.export');
Route::post('staff-import', [ImportController::class, 'import_user'])->name('staff.import');

Route::post("/admin-index", [AdminController::class, "indexAdmin"]);
Route::post("/staff-index", [StaffController::class, "indexAdmin"]);
Route::post("/officer-index", [OfficerController::class, "indexAdmin"]);

// Manajemen instansi

Route::resource('/instansi', InstansiController::class)->middleware('auth');

Route::get('instansi-export', [ExportController::class, 'export_instansi'])->name('instansi.export');
Route::post('instansi-import', [ImportController::class, 'import_instansi'])->name('instansi.import');
Route::post('instansi-search', [InstansiController::class, 'search'])->name('instansi.search');

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

// Manajemen Surat

Route::resource('/disposisi', DisposisiController::class)->middleware('auth');

Route::get('disposisi-export', [ExportController::class, 'export_disposisi'])->name('disposisi.export');
Route::post('disposisi-import', [ImportController::class, 'import_user'])->name('disposisi.import');

Route::get('/disposisi-filter', [DisposisiController::class, 'filterData'])->name('filter.disposisi');
