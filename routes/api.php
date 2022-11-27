<?php

use App\Http\Controllers\API\Kelas7BController;
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
Route::get('siswa7b', [Kelas7BController::class, 'index']);
Route::post('siswa7b/store', [Kelas7BController::class, 'store']);
Route::get('siswa7b/show/{id}', [Kelas7BController::class, 'show']);
Route::post('siswa7b/update/{id}', [Kelas7BController::class, 'update']);
Route::get('siswa7b/destroy/{id}', [Kelas7BController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
