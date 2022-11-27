<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Dashboard
Route::get('/dashboard', function () {
    return view('admin/dashboard');
});

//Homepage
Route::get('/profilesekolah', function () {
    return view('admin/h-profilesekolah');
});

Route::get('/extrakulikuler', function () {
    return view('admin/h-extrakulikuler');
});

Route::get('/prestasi', function () {
    return view('admin/h-prestasi');
});

//Event
Route::get('/nextevent', function () {
    return view('admin/e-nextevent');
});

Route::get('/recentevent', function () {
    return view('admin/e-recentevent');
});

//Form
Route::get('/informasi', function () {
    return view('admin/f-informasi-ppdb');
});

Route::get('/seleksi', function () {
    return view('admin/f-seleksi-ppdb');
});

//Civitas
Route::get('/dataguru', function () {
    return view('admin/c-guru');
});

Route::get('/datakaryawan', function () {
    return view('admin/c-karyawan');
});

Route::get('/datakepalasekolah', function () {
    return view('admin/c-kepalasekolah');
});

Route::get('/datawakilkepala', function () {
    return view('admin/c-wakilkepala');
});

Route::get('/datawalikelas', function () {
    return view('admin/c-walikelas');
});

//DataSiswa
Route::get('/kelas7a', function () {
    return view('admin/kelas/kelas7a');
});

Route::get('/kelas7b', function () {
    return view('admin/kelas/kelas7b');
});

Route::get('/kelas7c', function () {
    return view('admin/kelas/kelas7c');
});

Route::get('/kelas8a', function () {
    return view('admin/kelas/kelas8a');
});

Route::get('/kelas8b', function () {
    return view('admin/kelas/kelas8b');
});

Route::get('/kelas8c', function () {
    return view('admin/kelas/kelas8c');
});

Route::get('/kelas9a', function () {
    return view('admin/kelas/kelas9a');
});

Route::get('/kelas9b', function () {
    return view('admin/kelas/kelas9b');
});

Route::get('/kelas9c', function () {
    return view('admin/kelas/kelas9c');
});











