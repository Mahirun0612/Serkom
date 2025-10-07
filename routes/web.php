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

Route::get('/siswa', [HomeController::class, 'siswa'])->name('public.siswa');

Route::get('/guru', [HomeController::class, 'guru'])->name('public.guru');

Route::get('/profil', [ProfilSekolahController::class, 'tentang'])->name('public.profil');

Route::get('/berita', [BeritaController::class, 'news'])->name('public.berita');
Route::get('/detail/berita/{id}', [BeritaController::class, 'detail'])->name('detail.berita');

Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'ekskul'])->name('public.ekskul');
Route::get('/detail/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'detail'])->name('detail.ekskul');

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
Route::get('/delete/siswa/{id}', [SiswaController::class, 'deleteSiswa'])->name('siswa.delete');
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
Route::get('/delete/berita/{id}', [BeritaController::class, 'deleteBerita'])->name('berita.delete');
Route::get('/edit/berita/{id}', [BeritaController::class, 'editBerita'])->name('berita.edit');
Route::post('/update/berita/{id}', [BeritaController::class, 'updateBerita'])->name('berita.update');

Route::get('/admin/galeri', [GaleriController::class, 'galeri'])->name('admin.galeri');
Route::get('/create/galeri', [GaleriController::class, 'createGaleri'])->name('create.galeri');
Route::post('/store/galeri', [GaleriController::class, 'storeGaleri'])->name('galeri.store');
Route::get('/delete/galeri{id}', [GaleriController::class, 'deleteGaleri'])->name('galeri.delete');
Route::get('/edit/galeri/{id}', [GaleriController::class, 'editGaleri'])->name('galeri.edit');
Route::post('update/galeri/{id}', [GaleriController::class, 'updateGaleri'])->name('galeri.update');

Route::get('/admin/ekstrakurikuler', [EkstrakurikulerController::class, 'ekstrakurikuler'])->name('admin.ekstrakurikuler');
Route::get('/create/ekstrakurikuler', [EkstrakurikulerController::class, 'createEkskul'])->name('create.ekskul');
Route::post('/store/ekstrakurikuler', [EkstrakurikulerController::class, 'storeEkskul'])->name('ekskul.store');
Route::get('/delete/esktrakurikuler/{id}', [EkstrakurikulerController::class, 'deleteEkskul'])->name('ekskul.delete');
Route::get('/edit/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'editEkskul'])->name('ekskul.edit');
Route::post('/update/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'updateEkskul'])->name('ekskul.update');

Route::get('/admin/profil', [ProfilSekolahController::class, 'profil'])->name('admin.profil');
Route::get('/edit/profil/{id}', [ProfilSekolahController::class, 'editProfil'])->name('profil.edit');
Route::post('/update/profil/{id}', [ProfilSekolahController::class, 'updateProfil'])->name('profil.update');

Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::middleware(['Operator'])->group(function(){
    Route::get('/operator/dashboard',[AdminController::class, 'in'])->name('operator.dashboard');

    Route::get('/operator/berita', [BeritaController::class, 'berita'])->name('operator.berita');
    Route::get('/operator/create/berita', [BeritaController::class, 'createBerita'])->name('operator.create.berita');
    Route::post('/operator/store/berita', [BeritaController::class, 'storeBerita'])->name('operator.berita.store');
    Route::get('/operator/delete/berita/{id}', [BeritaController::class, 'deleteBerita'])->name('operator.berita.delete');
    Route::get('/operator/edit/berita/{id}', [BeritaController::class, 'editBerita'])->name('operator.berita.edit');
    Route::post('/operator/update/berita/{id}', [BeritaController::class, 'updateBerita'])->name('operator.berita.update');

    Route::get('/operator/galeri', [GaleriController::class, 'galeri'])->name('operator.galeri');
    Route::get('/operator/create/galeri', [GaleriController::class, 'createGaleri'])->name('operator.create.galeri');
    Route::post('/operator/store/galeri', [GaleriController::class, 'storeGaleri'])->name('operator.galeri.store');
    Route::get('/operator/delete/galeri{id}', [GaleriController::class, 'deleteGaleri'])->name('operator.galeri.delete');
    Route::get('/operator/edit/galeri/{id}', [GaleriController::class, 'editGaleri'])->name('operator.galeri.edit');
    Route::post('/operator/update/galeri/{id}', [GaleriController::class, 'updateGaleri'])->name('operator.galeri.update');

    Route::get('/operator/ekstrakurikuler', [EkstrakurikulerController::class, 'ekstrakurikuler'])->name('operator.ekstrakurikuler');
    Route::get('/operator/create/ekstrakurikuler', [EkstrakurikulerController::class, 'createEkskul'])->name('operator.create.ekskul');
    Route::post('/operator/store/ekstrakurikuler', [EkstrakurikulerController::class, 'storeEkskul'])->name('operator.ekskul.store');
    Route::get('/operator/delete/esktrakurikuler/{id}', [EkstrakurikulerController::class, 'deleteEkskul'])->name('operator.ekskul.delete');
    Route::get('/operator/edit/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'editEkskul'])->name('operator.ekskul.edit');
    Route::post('/operator/update/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'updateEkskul'])->name('operator.ekskul.update');

    Route::get('/operator/profil', [ProfilSekolahController::class, 'profil'])->name('operator.profil');
    Route::get('/operator/edit/profil/{id}', [ProfilSekolahController::class, 'editProfil'])->name('operator.profil.edit');
    Route::post('/operator/update/profil/{id}', [ProfilSekolahController::class, 'updateProfil'])->name('operator.profil.update');

    Route::get('/operator/logout', [AdminController::class, 'logout'])->name('operator.logout');
});

Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login/auth', [AdminController::class, 'auth'])->name('login.auth');
