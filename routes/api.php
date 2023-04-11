<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ProfileSekolahController;
use App\Http\Controllers\KepalaController;
use App\Http\Controllers\WaliKelasController;
use App\Http\Controllers\PostExtraController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\JuaraController;
use App\Http\Controllers\WakilKepalaController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\OsisController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\Siswa7bController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\StatusEventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::get('form', [FormController::class, 'index2']);
    Route::get('sekolah', [ProfileSekolahController::class, 'index2']);
    Route::get('wakilkepala', [WakilKepalaController::class, 'index2']);
    Route::get('kepala', [KepalaController::class, 'index2']);
    Route::get('extra', [PostExtraController::class, 'index2']);
    Route::get('nextevent', [EventController::class, 'Event1']);
    Route::get('recentevent', [EventController::class, 'Event2']);
    Route::get('guru', [GuruController::class, 'index2']);
    Route::get('walikelas', [WaliKelasController::class, 'index2']);
    Route::get('osis', [OsisController::class, 'index2']);
    Route::get('prestasi', [PrestasiController::class, 'index2']);
    Route::get('karyawan', [KaryawanController::class, 'index2']);
    Route::get('kelas7a', [Siswa7bController::class, 'siswa7a']);
    Route::get('kelas7b', [Siswa7bController::class, 'index2']);
    Route::get('kelas8a', [Siswa7bController::class, 'siswa8a']);
    Route::get('kelas8b', [Siswa7bController::class, 'siswa8b']);
    Route::get('kelas9a', [Siswa7bController::class, 'siswa9a']);
    Route::get('kelas9b', [Siswa7bController::class, 'siswa9b']);

    Route::get('statusevent', [StatusEventController::class, 'index2']);

    Route::middleware('auth:sanctum')->group(function () {
});
Route::get('spp', [SppController::class, 'index2']);
Route::get('juara', [JuaraController::class, 'index2']);

// Route for login

Route::post('/login', [AuthController::class, 'login']);
Route::post('/loginSiswa', [AuthController::class, 'loginSiswa']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/spps', [AuthController::class, 'getSpps']);
});

