<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BkkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruStaffController;
use App\Http\Controllers\KonsentrasiController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\KontakKitaController;
use App\Http\Controllers\MengapaSmkKharismaController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\KategoriPengumumanController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\SambutanPimpinanController;
use App\Http\Controllers\SaranaPrasaranaController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\StrukturSekolahController;
use App\Http\Controllers\TsController;
use App\Http\Controllers\UkkController;
use App\Http\Controllers\UpController;
use App\Http\Controllers\VisiMisiTujuanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// front user
// front home
Route::get('/', [FrontController::class, 'home_index']);

// front profil-sejarah
Route::get('/profil/sejarah', [FrontController::class, 'sejarah_index']);
// front profil-visimisitujuan
Route::get('/profil/visi-misi-tujuan', [FrontController::class, 'visimisitujuan_index']);
// front profil-struktur
Route::get('/profil/struktur-sekolah', [FrontController::class, 'struktur_index']);
// front profil-gurustaff
Route::get('/profil/guru-staff', [FrontController::class, 'gurustaff_index']);

// front berita
Route::get('informasi/berita', [FrontController::class, 'berita_index']);
// front berita-detail
Route::get('informasi/berita/detail-berita/{id_berita}', [FrontController::class, 'berita_show']);
// front pengumuman
Route::get('kategori-pengumuman', [FrontController::class, 'pengumuman_index']);
// front pengumuman-cek-data
Route::get('pengumuman/{judulKategoriPengumuman}', [FrontController::class, 'pengumuman_cek_data'])->where('judulKategoriPengumuman', '[\w\s\-_\/]+');
Route::post('pengumuman/{judulKategoriPengumuman}', [FrontController::class, 'pengumuman_cek_data'])->where('judulKategoriPengumuman', '[\w\s\-_\/]+');
// front info
Route::get('informasi/info', [FrontController::class, 'info_index']);
// front info-detail
Route::get('informasi/info/detail-info/{id_info}', [FrontController::class, 'info_show']);
// front ppdb
Route::get('informasi/ppdb', [FrontController::class, 'ppdb_index']);
// front ppdb-detail
Route::get('informasi/ppdb/detail-ppdb/{id_ppdb}', [FrontController::class, 'ppdb_show']);

// front program-bkk
Route::get('/program/bkk', [FrontController::class, 'bkk_index']);
// front bkk-detail
Route::get('/program/bkk/detail-bkk/{id_bkk}', [FrontController::class, 'bkk_show']);
// front program-up
Route::get('/program/up', [FrontController::class, 'up_index']);
// front up-detail
Route::get('/program/up/detail-up/{id_up}', [FrontController::class, 'up_show']);
// front program-ukk
Route::get('/program/ukk', [FrontController::class, 'ukk_index']);
// front ukk-detail
Route::get('/program/ukk/detail-ukk/{id_ukk}', [FrontController::class, 'ukk_show']);
// front program-ts
Route::get('/program/ts', [FrontController::class, 'ts_index']);
// front ts-detail
Route::get('/program/ts/detail-ts/{id_ts}', [FrontController::class, 'ts_show']);

// front galeri
Route::get('/galeri', [FrontController::class, 'galeri_index']);

// front konsentrasi
Route::get('/konsentrasi/{id_konsentrasi}', [FrontController::class, 'konsentrasi_show']);

// front kontak
Route::get('/kontak', [FrontController::class, 'kontak_index']);
Route::post('/kontak', [FrontController::class, 'kontak_store']);


// admin login
Auth::routes(['verify' => true, 'register' => false]);

// admin
Route::group(['middleware' => ['auth', 'verified']], function () {

    // admin dashboard
    Route::resource('/admin/dashboard', DashboardController::class);

    // Admin Profil Sekolah
    Route::resource('/admin/sejarah', SejarahController::class);
    Route::resource('/admin/visi-misi-tujuan', VisiMisiTujuanController::class);
    Route::resource('/admin/struktur-sekolah', StrukturSekolahController::class);
    Route::resource('/admin/guru-staff', GuruStaffController::class);
    Route::resource('/admin/sambutan-pimpinan', SambutanPimpinanController::class);
    Route::resource('/admin/panel', PanelController::class);
    Route::resource('/admin/kontak-kita', KontakKitaController::class);

    // admin mengapa smkkharisma
    Route::resource('/admin/mengapa-smk-kharisma', MengapaSmkKharismaController::class);

    // admin sarana prasarana
    Route::resource('/admin/sarana-prasarana', SaranaPrasaranaController::class);

    // admin ektrakurikuler
    Route::resource('/admin/ekstrakurikuler', EkstrakurikulerController::class);
    
    // admin Informasi
    Route::resource('/admin/berita', BeritaController::class);
    Route::resource('/admin/info', InfoController::class);
    Route::resource('/admin/ppdb', PpdbController::class);
    
    // pengumuman
    Route::get('/admin/kategori-pengumuman/murid/index/{idKategoriPengumuman}', [MuridController::class, 'index']);
    Route::get('/admin/kategori-pengumuman/murid/create/{idKategoriPengumuman}', [MuridController::class, 'create']);
    Route::post('/admin/kategori-pengumuman/murid/store/{idKategoriPengumuman}', [MuridController::class, 'store']);
    Route::get('/admin/kategori-pengumuman/murid/show/{idMurid}', [MuridController::class, 'show']);
    Route::get('/admin/kategori-pengumuman/murid/edit/{idMurid}', [MuridController::class, 'edit']);
    Route::post('/admin/kategori-pengumuman/murid/update/{idMurid}', [MuridController::class, 'update']);
    Route::post('/admin/kategori-pengumuman/murid/destroy/{idMurid}', [MuridController::class, 'destroy']);
    Route::get('/admin/kategori-pengumuman/show-or-hidden/{idKategoriPengumuman}', [KategoriPengumumanController::class, 'showorhidden']);
    Route::resource('/admin/kategori-pengumuman', KategoriPengumumanController::class);
    
    // admin program
    Route::resource('/admin/bkk', BkkController::class);
    Route::resource('/admin/up', UpController::class);
    Route::resource('/admin/ukk', UkkController::class);
    Route::resource('/admin/ts', TsController::class);

    // admin konsentrasi
    Route::resource('admin/konsentrasi', KonsentrasiController::class);

    // admin galeri
    Route::resource('/admin/galeri', GaleriController::class);

    // admin kontak
    Route::resource('/admin/kotak-saran', KontakController::class);

    // profil admin
    Route::get('/admin/profil-admin', [AuthController::class, 'edit']);
    Route::post('/admin/profil-admin', [AuthController::class, 'profil_admin']);
    Route::get('/logout', [AuthController::class, 'logout']);
});