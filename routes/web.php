<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\WaktuController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\TahunAkademikController;

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

Route::get('/', function () {
    return view('welcome');
});

//TEMPLATE
Route::get('/main', function () {
    return view('main');
});

//REGISTER
Route::get('/SignUp', function () {
    return view('register');
});

//PENGATURAN
Route::get('/Setting', function () {
    return view('setting');
});

//LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::post('/updateUser/{auth}', [LoginController::class, 'setting'])->middleware('auth');

//DASHBOARD & DATA USER
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/viewUsr', [DashboardController::class, 'viewUser'])->middleware('auth');
Route::post('/addUsr', [DashboardController::class, 'tambahUser'])->middleware('auth');
Route::get('/detailUsr/{id}', [DashboardController::class, 'detailUser'])->middleware('auth');
Route::get('/editUsr/{id}', [DashboardController::class, 'editUser'])->middleware('auth');
Route::post('/updateUsr/{id}', [DashboardController::class, 'ubahUser'])->middleware('auth');
Route::get('/deleteUsr/{id}', [DashboardController::class, 'hapusUser'])->middleware('auth');

//DATA DOSEN
Route::get('/viewDsn', [DosenController::class, 'index'])->middleware('auth');
Route::post('/addDsn', [DosenController::class, 'tambahDosen'])->middleware('auth');
Route::get('/editDsn/{nidn}', [DosenController::class, 'editDosen'])->middleware('auth');
Route::post('/updateDsn/{nidn}', [DosenController::class, 'ubahDosen'])->middleware('auth');
Route::get('/deleteDsn/{nidn}', [DosenController::class, 'hapusDosen'])->middleware('auth');

//DATA MATAKULIAH
Route::get('/viewMk', [MatakuliahController::class, 'index'])->middleware('auth');
Route::post('/addMk', [MatakuliahController::class, 'tambahMK'])->middleware('auth');
Route::post('/updateMk/{kd_matakuliah}', [MatakuliahController::class,'ubahMK'])->middleware('auth');
Route::get('/deleteMk/{kd_matakuliah}', [MatakuliahController::class,'hapusMK'])->middleware('auth');

//DATA PROGRAM STUDI
Route::get('/viewProdi', [ProdiController::class, 'index'])->middleware('auth');
Route::post('/addProdi', [ProdiController::class, 'tambahProdi'])->middleware('auth');
Route::post('/updateProdi/{kd_prodi}', [ProdiController::class, 'ubahProdi'])->middleware('auth');
Route::get('/deleteProdi/{kd_prodi}', [ProdiController::class, 'hapusProdi'])->middleware('auth');

//DATA RUANGAN
Route::get('/viewRuang', [RuanganController::class, 'index'])->middleware('auth');
Route::post('/addRuang', [RuanganController::class, 'tambahRuang'])->middleware('auth');
Route::post('/updateRuang/{kd_ruangan}', [RuanganController::class, 'ubahRuang'])->middleware('auth');
Route::get('/deleteRuang/{kd_ruangan}', [RuanganController::class, 'hapusRuang'])->middleware('auth');

//DATA JAM
Route::get('/viewJam', [WaktuController::class, 'jam'])->middleware('auth');
Route::post('/addJam', [WaktuController::class, 'tambahJam'])->middleware('auth');
Route::post('/updateJam/{kd_jam}', [WaktuController::class, 'ubahJam'])->middleware('auth');
Route::get('/deleteJam/{kd_jam}', [WaktuController::class, 'hapusJam'])->middleware('auth');

//DATA HARI
Route::get('/viewHari', [WaktuController::class, 'hari'])->middleware('auth');
Route::post('/addHari', [WaktuController::class, 'tambahhari'])->middleware('auth');
Route::post('/updateHari/{kd_hari}', [WaktuController::class, 'ubahhari'])->middleware('auth');
Route::get('/deleteHari/{kd_hari}', [WaktuController::class, 'hapushari'])->middleware('auth');

//DATA JADWAL MENGGUNAKAN ELOQUEN ORM
Route::get('/viewJadwal', [JadwalController::class, 'index'])->middleware('auth');
Route::get('/viewInputJadwal', [JadwalController::class, 'tambahJadwal'])->middleware('auth');
Route::post('/addJadwal', [JadwalController::class, 'inputJadwal'])->middleware('auth');
Route::get('/{kd_jadwal}/ubahJadwal', [JadwalController::class, 'ubahJadwal'])->middleware('auth');
Route::put('/updateJadwal/{kd_jadwal}', [JadwalController::class, 'updateJadwal'])->middleware('auth');
Route::get('/deleteJadwal/{kd_jadwal}', [JadwalController::class, 'hapusJadwal'])->middleware('auth');

//DATA TAHUN AKADEMIK
Route::get('/viewTA', [TahunAkademikController::class, 'index'])->middleware('auth');
Route::post('/addTA', [TahunAkademikController::class, 'tambahTA'])->middleware('auth');
Route::post('/updateTA/{kd_TA}', [TahunAkademikController::class, 'ubahTA'])->middleware('auth');
Route::get('/deleteTA/{kd_TA}', [TahunAkademikController::class, 'hapusTA'])->middleware('auth');