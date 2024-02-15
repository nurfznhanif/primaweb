<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogCategory;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User_Controller;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\ElibraryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogGuestController;
use App\Http\Controllers\JadwalMemberController;
use App\Http\Controllers\LayananImageController;
use App\Http\Controllers\LayananDetailController;
use App\Http\Controllers\FasilitasLayananController;
use App\Http\Controllers\LayananUnggulanController;
use App\Http\Controllers\LayananPoliklinikController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\KategoriGaleriController;
use App\Http\Controllers\YtLinkController;

// halaman guest
Route::get('/', [MainController::class, 'index']);
Route::get('/tentang', [MainController::class, 'tentang']);


//blog guest
Route::get('/artikel', [BlogGuestController::class, 'index']);
Route::get('/artikel/{blog}', [BlogGuestController::class, 'show']);

// dokter guest
Route::get('/member/profil', [MainController::class, 'profilMember']);
Route::get('/member/jadwal', [MainController::class, 'jadwalMember']);
Route::get('/member/profil/{member}', [MainController::class, 'profilMemberDetail']);

// layanan guest
Route::get('/services', [MainController::class, 'layananIndex']);
Route::get('/services/detail/{layanan}', [MainController::class, 'layananDetail']);
Route::get('/services/layanan-poliklinik', [MainController::class, 'layananPoliklinik']);
Route::get('/services/layanan-poliklinik/detail/{layanan_poliklinik}', [MainController::class, 'layananPoliklinikDetail']);
Route::get('/services/fasilitas-layanan', [MainController::class, 'fasilitasLayanan']);

// elibrary
Route::get('/e-library', [MainController::class, 'elibraryIndex']);

// karir guest
Route::get('/project', [MainController::class, 'projectIndex']);
Route::get('/project/{lowongan}', [MainController::class, 'projectShow']);
Route::post('/project', [MainController::class, 'store']);

// galeri guest
Route::get('/galeri', [MainController::class, 'galeriIndex']);

// partnershipn
Route::get('/partnership', [MainController::class, 'partnerIndex']);

// <-- Bagian Admin -->

// form login dan logout
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->middleware('auth');
Route::get('/blogCreate', [BlogController::class, 'create'])->middleware('auth');
Route::post('/blogCreate', [BlogController::class, 'store']);

// ..............
Route::resource('/dashboard/blog', BlogController::class)->middleware('auth');

Route::get('/blogCategory', [BlogCategory::class, 'index'])->middleware('auth');
Route::post('/blogCategory', [BlogCategory::class, 'store']);

// users
Route::resource('/dashboard/user', User_Controller::class)->middleware('auth');

// banner
Route::resource('/dashboard/banner', BannerController::class)->middleware('auth');

// Dokter
Route::resource('/dashboard/dokter', MemberController::class)->middleware('auth');

// jadwal dokter
Route::get('/dashboard/dokter-jadwal/{dokter}', [JadwalMemberController::class, 'index'])->middleware('auth');
Route::get('/dashboard/jadwal-edit/{id}', [JadwalMemberController::class, 'edit'])->middleware('auth');
Route::resource('/dashboard/jadwal-edit', JadwalMemberController::class,)->middleware('auth');
Route::post('/dashboard/dokter-jadwal', [JadwalMemberController::class, 'store'])->middleware('auth');

// lowongan
Route::resource('/dashboard/project', ProjectController::class)->middleware('auth');
Route::get('/dashboard/lamaran/{lowongan}', [LamaranController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/lamaran', LamaranController::class)->middleware('auth');

// layanan-poliklinik
Route::resource('/dashboard/layanan-poliklinik', LayananPoliklinikController::class)->middleware('auth');

// fasilitas layanan
Route::resource('/dashboard/fasilitas-layanan', FasilitasLayananController::class)->middleware('auth');

// layanan Unggulan
Route::resource('/dashboard/layanan-unggulan', layananUnggulanController::class)->middleware('auth');

// layanan
Route::resource('/dashboard/layananImage', LayananImageController::class)->middleware('auth');
Route::get('/dashboard/layanan/detail/{layanan_poliklinik}', [LayananDetailController::class, 'index'])->middleware('auth');

// galeri
Route::resource('/dashboard/galeri', GaleriController::class)->middleware('auth');
Route::resource('/dashboard/galeri-kategori', KategoriGaleriController::class)->middleware('auth');

// e-library
Route::resource('/dashboard/e-library', ElibraryController::class)->middleware('auth');
Route::resource('/dashboard/e-library/folder', FolderController::class)->middleware('auth');

// partnership
Route::resource('/dashboard/partnership', PartnershipController::class)->middleware('auth');

// yt links
Route::resource('/dashboard/yt', YtLinkController::class)->middleware('auth');
