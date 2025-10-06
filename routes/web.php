<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('beranda');

Route::get('/profil', [ProfilSekolahController::class, 'tentang'])->name('public.profil');
Route::get('/berita', [BeritaController::class, 'news'])->name('public.berita');
Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'ekskul'])->name('public.ekskul');
Route::get('/galeri', [GaleriController::class, 'gallery'])->name('public.gallery');

Route::middleware(['Admin'])->group(function(){

Route::get('/admin/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/user', [AdminController::class, 'user'])->name('admin.user');
Route::get('/create/user', [AdminController::class, 'createUser'])->name('create.user');
Route::post('/store/user',[AdminController::class, 'storeUser'])->name('user.store');
Route::get('/delete/user/{id}', [AdminController::class, 'deleteUser'])->name('user.delete');
Route::get('/edit/user/{id}', [AdminController::class, 'editUser'])->name('user.edit');
Route::post('/update/user/{id}', [AdminController::class, 'updateUser'])->name('user.update');

Route::get('/admin/siswa',[SiswaController::class, 'dataSiswa'])->name('admin.siswa');
Route::get('/create/siswa',[SiswaController::class, 'createSiswa'])->name('create.siswa');
Route::post('/store/siswa', [SiswaController::class, 'storeSiswa'])->name('siswa.store');
Route::get('/delete/siswa/{id}', [[SiswaController::class, 'deleteSiswa']])->name('siswa.delete');
Route::get('/edit/siswa/{id}', [SiswaController::class, 'editSiswa'])->name('siswa.edit');
Route::post('/update/siswa/{id}', [SiswaController::class, 'updateSiswa'])->name('siswa.update');

Route::get('/admin/guru', [GuruController::class, 'index'])->name('admin.guru');
Route::get('/create/guru', [GuruController::class, 'createGuru'])->name('create.guru');
Route::post('/store/guru', [GuruController::class, 'storeGuru'])->name('guru.store');
Route::get('/delete/guru/{id}', [GuruController::class, 'deleteGuru'])->name('guru.delete');
Route::get('/edit/guru/{id}', [GuruController::class, 'editGuru'])->name('guru.edit');
Route::post('/update/guru/{id}', [GuruController::class, 'updateGuru'])->name('guru.update');

Route::get('/admin/berita', [BeritaController::class, 'berita'])->name('admin.berita');
Route::get('/create/berita', [BeritaController::class, 'createBerita'])->name('create.berita');
Route::post('/store/berita', [BeritaController::class, 'storeBerita'])->name('berita.store');
Route::get('delete/berita/{id}', [BeritaController::class, 'deleteBerita'])->name('berita.delete');
Route::get('/edit/berita/{id}', [BeritaController::class, 'editBerita'])->name('berita.edit');
Route::post('/update/berita/{id}', [BeritaController::class, 'updateBerita'])->name('berita.update');

Route::get('/admin/galeri', [GaleriController::class, 'galeri'])->name('admin.galeri');
Route::get('/create/galeri', [GaleriController::class, 'createGaleri'])->name('create.galeri');
Route::post('/store/galeri', [GaleriController::class, 'storeGaleri'])->name('galeri.store');
Route::get('/delete/galeri{id}', [GaleriController::class, 'deleteGaleri'])->name('galeri.delete');
Route::get('/edit/galeri/{id}', [GaleriController::class, 'editGaleri'])->name('galeri.edit');

Route::get('/admin/ekstrakurikuler', [EkstrakurikulerController::class, 'ekstrakurikuler'])->name('admin.ekstrakurikuler');
Route::get('/create/ekstrakurikuler', [EkstrakurikulerController::class, 'createEkskul'])->name('create.ekskul');
Route::post('/store/ekstrakurikuler', [EkstrakurikulerController::class, 'storeEkskul'])->name('ekskul.store');
Route::get('/delete/esktrakurikuler/{id}', [EkstrakurikulerController::class, 'deleteEkskul'])->name('ekskul.delete');
Route::get('/edit/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'editEkskul'])->name('ekskul.edit');
Route::post('/update/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'updateEkskul'])->name('ekskul.update');

Route::get('/admin/profil', [ProfilSekolahController::class, 'profil'])->name('admin.profil');

Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login/auth', [AdminController::class, 'auth'])->name('login.auth');
