<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
});

Route::get('home', function () {
    return view('home');
});
Route::get('home',[App\Http\Controllers\PerpusController::class, 'home']);
Route::get('buku',[App\Http\Controllers\BukuController::class, 'lihatbuku']);

Route::get('register', function () {
    return view('register');
});
Route::get('forgetpass', function () {
    return view('forgetpass');
});
Route::get('homepengguna', function () {
    return view('pengguna.homepengguna');
});
Route::get('pengguna/pinjambuku', function () {
    return view('pengguna.pinjambuku');
});


Route::get('buku/tambah',[App\Http\Controllers\BukuController::class, 'tambahbuku']);
Route::get('buku/edit',[App\Http\Controllers\BukuController::class, 'editbuku']);
Route::get('buku/hapus',[App\Http\Controllers\BukuController::class, 'hapusbuku']);
Route::get('buku/edit/{kode_eksemplar}', [App\Http\Controllers\BukuController::class, 'editbukuparam']);
Route::get('buku/hapus/{kode_eksemplar}', [App\Http\Controllers\BukuController::class, 'hapusbukuparam']);
Route::post('buku/tambah/process',[App\Http\Controllers\BukuController::class, 'insertbuku']);
Route::post('buku/edit/process',[App\Http\Controllers\BukuController::class, 'updatebuku']);
Route::post('buku/hapus/process',[App\Http\Controllers\BukuController::class, 'deletebuku']);


Route::get('anggota/tambah',[App\Http\Controllers\AnggotaController::class, 'tambahanggota']);
Route::get('anggota',[App\Http\Controllers\AnggotaController::class, 'lihatanggota']);
Route::get('anggota/edit',[App\Http\Controllers\AnggotaController::class, 'editanggota']);
Route::get('anggota/hapus',[App\Http\Controllers\AnggotaController::class, 'hapusanggota']);
Route::get('anggota/edit/{nik}', [App\Http\Controllers\AnggotaController::class, 'editanggotaparam']);
Route::get('anggota/hapus/{nik}', [App\Http\Controllers\AnggotaController::class, 'hapusanggotaparam']);
Route::post('anggota/tambah/process',[App\Http\Controllers\AnggotaController::class, 'insertanggota']);
Route::post('anggota/edit/process',[App\Http\Controllers\AnggotaController::class, 'updateanggota']);
Route::post('anggota/hapus/process',[App\Http\Controllers\AnggotaController::class, 'deleteanggota']);


Route::get('peminjaman',[App\Http\Controllers\PeminjamanController::class, 'peminjaman']);
Route::get('peminjaman/tambah',[App\Http\Controllers\PeminjamanController::class, 'tambahpeminjaman']);
Route::get('peminjaman/hapus/{id_transaksi}', [App\Http\Controllers\PeminjamanController::class, 'hapuspeminjamanparam']);
Route::get('peminjaman/hapus',[App\Http\Controllers\PeminjamanController::class, 'hapuspeminjaman']);
Route::post('peminjaman/tambah/process',[App\Http\Controllers\PeminjamanController::class, 'tambahprocess']);
Route::post('peminjaman/hapus/process',[App\Http\Controllers\PeminjamanController::class, 'hapusprocess']);


Route::get('pengembalian',[App\Http\Controllers\PengembalianController::class, 'pengembalian']);
Route::get('pengembalian/kembali/{id_transaksi}',[App\Http\Controllers\PengembalianController::class, 'pengembalianparam']);
Route::post('pengembalian/kembali/process',[App\Http\Controllers\PengembalianController::class, 'pengembalianprocess']);


Route::get('pengguna',[App\Http\Controllers\PenggunaController::class, 'mainpengguna']);
Route::get('pengguna/pinjambuku',[App\Http\Controllers\PenggunaController::class, 'pinjambukuform']);
Route::get('pengguna/buku',[App\Http\Controllers\PenggunaController::class, 'penggunalihatbuku']);
Route::post('pengguna/pinjambuku/process',[App\Http\Controllers\PenggunaController::class, 'pinjambukuprocess']);
Route::get('pengguna/pengembalian',[App\Http\Controllers\PenggunaController::class, 'pengembaliananggota']);
Route::get('pengguna/pengembalian/{id_transaksi}',[App\Http\Controllers\PenggunaController::class, 'pengembaliananggotaparam']);
Route::post('pengguna/pengembalian/process',[App\Http\Controllers\PenggunaController::class, 'pengembaliananggotaprocess']);
Route::get('pengguna/profile',[App\Http\Controllers\PenggunaController::class, 'profile']);

Route::post('login',[App\Http\Controllers\AutentikasiController::class, 'login']);
Route::post('register/tambahakun',[App\Http\Controllers\AutentikasiController::class, 'tambahakun']);
Route::get('logout',[App\Http\Controllers\AutentikasiController::class, 'logout']);
