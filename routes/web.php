<?php

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

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminPembayaranController;
use App\Http\Controllers\AdminPendaftaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\RegisterController;
use App\Mail\EmailRegistrasi;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/surat', function () {
    // return view('welcome');
    // return new EmailRegistrasi(['token' => 1234566, 'email' => 'admin@gmail.com']);
    Mail::to('mohammad.zarkasi@gmail.com')->send(new EmailRegistrasi([
        'email' => 'mohammad.zarkasi@gmail.com',
        'token' => '1234567',
    ]));
    return 'ok';
});

Route::middleware('must-not-logged-in')->group(function () {
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'postlogin']);
    Route::get('/forgot-password', [AuthController::class, 'forgot_password']);
    Route::get('/forgot-success', [AuthController::class, 'forgot_pass_success']);
    Route::post('/forgot-password', [AuthController::class, 'do_forgot_password']);

    Route::get('/reset-password', [AuthController::class, 'reset_password']);
    Route::get('/reset-success', [AuthController::class, 'reset_success']);
    Route::post('/reset-password', [AuthController::class, 'do_reset_password']);

    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/register-success', [RegisterController::class, 'success']);

    Route::get('/activate-account', [RegisterController::class, 'aktivasi']);
    Route::get('/account-activated', [RegisterController::class, 'account_activated']);
    Route::get('/activation-failed', [RegisterController::class, 'activation_failed']);
});

Route::middleware('myguest')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
});

Route::middleware('loggedin')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    // Route::get('pembayaran', 'pembayaranController@index');
    // Route::post('pembayaran/pembayaran', 'pembayaranController@store');
    Route::get('pembayaran', [PembayaranController::class, 'semua']);
    Route::get('pembayaran/baru', [PembayaranController::class, 'index']);
    Route::get('pembayaran/success', [PembayaranController::class, 'success']);
    Route::get('pembayaran/lihat', [PembayaranController::class, 'lihat']);
    Route::post('pembayaran', [PembayaranController::class, 'store']);
    Route::post('pembayaran/hapus', [PembayaranController::class, 'hapus']);

    Route::get('pendaftaran', [PendaftaranController::class, 'index']);
    Route::get('pendaftaran/bayar-dulu', [PendaftaranController::class, 'bayar_dulu']);
    // Route::get('pendaftaran/create', 'pendaftaranController@create');
    // Route::get('pendaftaran/baru', [PendaftaranController::class, 'create']);
    Route::get('pendaftaran/baru', [PendaftaranController::class, 'pilih_bayar']);
    Route::get('pendaftaran/bayar-tidak-valid', [PendaftaranController::class, 'bayar_tidak_valid']);

    Route::get('pendaftaran/data-pribadi', [PendaftaranController::class, 'data_pribadi']);
    Route::post('pendaftaran/data-pribadi', [PendaftaranController::class, 'save_data_pribadi']);

    Route::get('pendaftaran/data-ayah', [PendaftaranController::class, 'data_ayah']);
    Route::post('pendaftaran/data-ayah', [PendaftaranController::class, 'save_data_ayah']);

    Route::get('pendaftaran/data-ibu', [PendaftaranController::class, 'data_ibu']);
    Route::post('pendaftaran/data-ibu', [PendaftaranController::class, 'save_data_ibu']);

    Route::get('pendaftaran/data-wali', [PendaftaranController::class, 'data_wali']);
    Route::post('pendaftaran/data-wali', [PendaftaranController::class, 'save_data_wali']);

    Route::get('pendaftaran/data-periodik', [PendaftaranController::class, 'data_periodik']);
    Route::post('pendaftaran/data-periodik', [PendaftaranController::class, 'save_data_periodik']);

    Route::get('pendaftaran/data-registrasi', [PendaftaranController::class, 'data_registrasi']);
    Route::post('pendaftaran/data-registrasi', [PendaftaranController::class, 'save_data_registrasi']);

    Route::get('pendaftaran/data-keluar', [PendaftaranController::class, 'data_keluar']);
    Route::post('pendaftaran/data-keluar', [PendaftaranController::class, 'save_data_keluar']);

    Route::get('pendaftaran/data-selesai', [PendaftaranController::class, 'data_selesai']);

    // Route::post('pendaftaran/create', 'pendaftaranController@store');
    Route::get('pendaftaran/export', 'PendaftaranController@export');
});




// Route::get('verifikasi/pendaftaran', 'verifikasiController@index');
// Route::get('dasboards/viewdaftar', 'pendaftaranController@store');


//Route::post('/create','pendaftaranController@store');
//Route::get('ppdb','Ppdb_controller@index');
//Route::post('ppdb','Ppdb_controller@store');

Route::prefix('admin')->group(function () {
    Route::middleware('admin-guest')->group(function () {
        Route::get('/', [AdminAuthController::class, 'index']);
        Route::post('/', [AdminAuthController::class, 'do_login']);
    });


    Route::middleware('admin-beneran')->group(function () {
        Route::get('/home', [AdminHomeController::class, 'index']);
        Route::get('/logout', [AdminAuthController::class, 'keluar']);

        Route::get('/pembayaran', [AdminPembayaranController::class, 'baru']);
        Route::get('/pembayaran/ok', [AdminPembayaranController::class, 'terverifikasi']);
        Route::get('/pembayaran/lihat', [AdminPembayaranController::class, 'lihat']);
        Route::post('/pembayaran/verifikasi', [AdminPembayaranController::class, 'verifikasi']);

        Route::get('/pendaftaran', [AdminPendaftaranController::class, 'baru']);
        Route::get('/pendaftaran/ok', [AdminPendaftaranController::class, 'terverifikasi']);
        Route::get('/pendaftaran/lihat', [AdminPendaftaranController::class, 'lihat']);
    });
});
