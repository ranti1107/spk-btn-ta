<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
});

Route::get('spk-btn/login', [AuthController::class, 'showLogin']);
Route::post('spk-btn/login', [AuthController::class, 'LoginProcess']);
Route::get('logout', [AuthController::class, 'Logout']);

Route::group(['middleware'=>['auth']], function(){
	Route::group(['middleware'=>['CheckLogin:0']], function(){
		Route::prefix('Admin')->group(function(){
			Route::get('beranda', [AdminController::class, 'Beranda']);

			Route::get('penilaian', [PenilaianController::class, 'Hasil']);

			Route::get('user-admin', [UserController::class,'BerandaUserAdmin']);
			Route::get('user-admin/create', [UserController::class,'CreateUserAdmin']);
			Route::post('user-admin', [UserController::class, 'storeUserAdmin']);
			Route::get('user-admin/edit/{user}', [UserController::class,'editUserAdmin']);
			Route::put('user-admin/edit/{user}', [UserController::class,'UpdateUserAdmin']);
			Route::delete('user-admin/{user}', [UserController::class, 'deleteAdmin']);

			Route::get('profil', [UserController::class, 'Profil']);
			Route::get('ganti-password/{user}', [UserController::class,'gantipasswordUserAdmin']);
			Route::post('ganti-password', [UserController::class,'simpanpassword']);

			Route::get('user-karyawan', [UserController::class,'BerandaUserKaryawan']);
			Route::get('user-karyawan/create', [UserController::class,'CreateUserKaryawan']);
			Route::post('user-karyawan', [UserController::class, 'storeUserKaryawan']);
			Route::get('user-karyawan/edit/{user}', [UserController::class,'EditKaryawan']);
			Route::put('user-karyawan/edit/{user}', [UserController::class,'UpdateKaryawan']);
			Route::delete('user-karyawan/{user}', [UserController::class, 'deleteKaryawan']);

			Route::get('kriteria', [KriteriaController::class,'BerandaKriteria']);
			Route::get('kriteria/create', [KriteriaController::class,'CreateKriteria']);
			Route::post('kriteria', [KriteriaController::class, 'store']);
			Route::get('kriteria/edit/{kriteria}', [KriteriaController::class,'edit']);
			Route::put('kriteria/edit/{kriteria}', [KriteriaController::class,'update']);
			Route::delete('kriteria/{kriteria}', [KriteriaController::class, 'destroy']);
			Route::get('perhitungan-kriteria', [KriteriaController::class, 'berandaperhitungan']);
			Route::get('perhitungan-kriteria/create', [KriteriaController::class, 'tambahperhitungan']);
			Route::post('perhitungan-kriteria', [KriteriaController::class, 'perhitungan']);

			Route::get('sub-kriteria', [SubKriteriaController::class,'BerandaSubKriteria']);
			Route::get('sub-kriteria/create/{kriteria}', [SubKriteriaController::class,'createSubKriteria']);
			Route::post('sub-kriteria', [SubKriteriaController::class, 'store']);
			Route::get('sub-kriteria/edit/{subkriteria}', [SubKriteriaController::class, 'edit']);
			Route::put('sub-kriteria/edit/{subkriteria}', [SubKriteriaController::class, 'update']);
			Route::delete('sub-kriteria/{subkriteria}', [SubkriteriaController::class, 'destroy']);
			Route::get('sub-kriteria/perhitungan/{kriteria}', [SubkriteriaController::class, 'berandaperhitungan']);
			Route::post('sub-kriteria/perhitungan', [SubkriteriaController::class, 'perhitungan']);

			Route::get('klasifikasi', [KlasifikasiController::class,'BerandaKlasifikasi']);
			Route::get('klasifikasi/create', [KlasifikasiController::class,'createklasifikasi']);

			Route::get('pendukungkeputusan', [PendukungKeputusanController::class,'Berandapendukungkeputusan']);
			Route::get('pendukungkeputusan/create', [PendukungKeputusanController::class,'creatependukungkeputusan']);
		});
	});
});

Route::group(['middleware'=>['auth']], function(){
	Route::group(['middleware'=>['CheckLogin:1']], function(){
		Route::prefix('Karyawan')->group(function(){
			Route::get('beranda', [KaryawanController::class, 'Beranda']);

			Route::get('profil', [UserController::class, 'ProfilKaryawan']);
			Route::get('ganti-password/{user}', [UserController::class,'gantipasswordUserKaryawan']);
			Route::post('ganti-password', [UserController::class,'simpanpassword']);
			Route::get('user-karyawan/edit/{user}', [UserController::class,'editUserKaryawan']);
			Route::put('user-karyawan/edit/{user}', [UserController::class,'UpdateUserKaryawan']);

			Route::get('nasabah', [NasabahController::class,'BerandaNasabah']);
			Route::get('nasabah/create', [NasabahController::class,'CreateNasabah']);
			Route::post('nasabah', [NasabahController::class,'simpan']);
			Route::get('nasabah/edit/{nasabah}', [NasabahController::class, 'edit']);
			Route::put('nasabah/edit/{nasabah}', [NasabahController::class, 'update']);
			Route::get('nasabah/detail/{nasabah}', [NasabahController::class, 'detail']);
			Route::delete('nasabah/{nasabah}', [NasabahController::class, 'destroy']);

			Route::get('perhitungan', [PerhitunganController::class,'Beranda']);
			Route::delete('perhitungan/hapus/{perhitungan}', [PerhitunganController::class, 'hapus']);
			Route::get('tambah-bobot/{perhitungan}', [PerhitunganController::class, 'tambahbobot']);
			Route::post('tambah-bobot/{perhitungan}', [PerhitunganController::class, 'simpanbobot']);
			Route::put('edit-bobot/{bobot}', [PerhitunganController::class, 'editbobot']);
			Route::get('tambah-nasabah/create', [PerhitunganController::class,'create']);
			Route::post('tambah-nasabah', [PerhitunganController::class,'simpan']);

			Route::get('hasil-akhir', [PerhitunganController::class, 'Hasil']);
		});
	});
});