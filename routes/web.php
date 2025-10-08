<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/siswa', function () {
    return view('siswa');
});
Route::get('/add', function () {
    return view('siswa_tambah');
});
Route::get('/siswa/search', [SiswaController::class, 'search'])->name('siswa.search');



Route::get('/', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::resource('/siswa',SiswaController::class);
Route::resource('/ekskul',EkskulController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

