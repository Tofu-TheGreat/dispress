<?php

use App\Http\Controllers\{AdminController, Controller, ExportController, ImportController, ProfileController, OfficerController, PerusahaanController, StaffController, SuratController, SuratMasukController};
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

// Manajemen Perusahaan

Route::resource('/perusahaan', PerusahaanController::class)->middleware('auth');
Route::get('perusahaan-export', [ExportController::class, 'export_perusahaan'])->name('perusahaan.export');
Route::post('perusahaan-import', [ImportController::class, 'import_perusahaan'])->name('perusahaan.import');

Route::get('perusahaan-export', [ExportController::class, 'export_perusahaan'])->name('perusahaan.export');
Route::post('perusahaan-import', [ImportController::class, 'import_user'])->name('perusahaan.import');


// Manajemen Surat

Route::resource('/surat', SuratController::class)->middleware('auth');

Route::get('surat-export', [ExportController::class, 'export_surat'])->name('surat.export');
Route::post('surat-import', [ImportController::class, 'import_user'])->name('surat.import');

Route::get('/surat-filter', [SuratController::class, 'filterData'])->name('filter.surat');
