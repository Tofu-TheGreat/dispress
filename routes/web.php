<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ProfileController;

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

Route::get('/deleteImageFromUser/{id}', [AdminController::class, 'deleteImageFromUser'])->name('deleteImageFromUser');
Route::post('/filter', [AdminController::class, 'filterDataAdmin'])->name('filterDataAdmin');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

Route::get('admin-export', [ExportController::class, 'export_admin'])->name('admin.export');
Route::post('admin-import', [ImportController::class, 'import_admin'])->name('admin.import');

Route::resource('/admin', AdminController::class)->middleware('auth');
Route::resource('/officer', OfficerController::class)->middleware('auth');
Route::resource('/staff', StaffController::class)->middleware('auth');
Route::post("/admin-index", [AdminController::class, "indexAdmin"]);
