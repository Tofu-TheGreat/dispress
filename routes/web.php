<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;

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

Route::get('/home', function () {
    return view('pages.index');
});

Route::get('/login', function () {
    return view('pages.login');
})->middleware('guest');

Route::get('/dashboard', [Controller::class, 'dashboard'])->middleware('auth', 'role:admin')->middleware('auth');

Route::post('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::resource('/admin', AdminController::class)->middleware('auth')->middleware('auth');
Route::post("/admin-index", [AdminController::class, "indexAdmin"]);
