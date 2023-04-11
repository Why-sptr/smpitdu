<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckStatus;

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



//Login




//Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'home'])->name('admin/dashboard');
});



//Homepage
Route::middleware('auth')->group(function () {
    Route::get('/profilesekolah', [App\Http\Controllers\ProfileSekolahController::class, 'index'])->name('admin/h-profilesekolah');
    Route::get('/tambahfoto', [App\Http\Controllers\ProfileSekolahController::class, 'tambahfoto']);
    Route::post('/insertfoto', [App\Http\Controllers\ProfileSekolahController::class, 'insertfoto']);

    Route::get('/tampilkandataprofile/{id}', [App\Http\Controllers\ProfileSekolahController::class, 'tampil'])->name('admin/tampilkanprofile');
    Route::post('/updatedataprofile/{id}', [App\Http\Controllers\ProfileSekolahController::class, 'updatedataprofile'])->name('admin/updatedataprofile');

    Route::get('/deleteprofile/{id}', [App\Http\Controllers\ProfileSekolahController::class, 'delete'])->name('admin/deleteprofile');
    Route::get('/trashprofile', [App\Http\Controllers\ProfileSekolahController::class, 'trash'])->name('admin/trashprofile');
    Route::get('/restoreprofile/{id}', [App\Http\Controllers\ProfileSekolahController::class, 'restore'])->name('admin/restoreprofile');
    Route::get('/restoreprofileall', [App\Http\Controllers\ProfileSekolahController::class, 'restoreall'])->name('admin/restoreprofileall');
    Route::get('/hapuspermanenprofile/{id}', [App\Http\Controllers\ProfileSekolahController::class, 'hapuspermanen'])->name('hapuspermanenprofile');
    Route::get('/guru/hapuspermanenprofileall', [App\Http\Controllers\ProfileSekolahController::class, 'hapuspermanenall'])->name('hapuspermanenprofileall');
});

//Exktrakulikuler
Route::middleware('auth')->group(function () {
    Route::get('/extrakulikuler', [App\Http\Controllers\PostExtraController::class, 'index'])->name('admin/h-extrakulikuler');
    Route::get('/create', function () { return view('admin/tambahdataextra'); });
    Route::post('/postextra', [App\Http\Controllers\PostExtraController::class, 'store']);

    Route::get('/detailextra/{id}', [App\Http\Controllers\PostExtraController::class, 'detail'])->name('admin/detailextra');
    Route::get('/tampilkandataextra/{id}', [App\Http\Controllers\PostExtraController::class, 'tampil'])->name('admin/tampilkanextra');
    Route::post('/updatedataextra/{id}', [App\Http\Controllers\PostExtraController::class, 'updatedataextra'])->name('admin/updatedataextra');
    
    Route::get('/deleteextra/{id}', [App\Http\Controllers\PostExtraController::class, 'delete'])->name('admin/deleteextra');
    Route::get('/trashextra', [App\Http\Controllers\PostExtraController::class, 'trash'])->name('admin/trashextra');
    Route::get('/restoreextra/{id}', [App\Http\Controllers\PostExtraController::class, 'restoreextra'])->name('admin/restoreextra');
    Route::get('/restoreextraall', [App\Http\Controllers\PostExtraController::class, 'restoreextraall'])->name('admin/restoreextraall');
    Route::get('/hapuspermanenextra/{id}', [App\Http\Controllers\PostExtraController::class, 'hapuspermanenextra'])->name('hapuspermanenextra');
    Route::get('/hapuspermanenextraall', [App\Http\Controllers\PostExtraController::class, 'hapuspermanenextraall'])->name('hapuspermanenextraall');
});

//Juara
Route::middleware('auth')->group(function () {
    Route::get('/juara', [App\Http\Controllers\JuaraController::class, 'index'])->name('admin/h-juara');
    Route::get('/tambahjuara', [App\Http\Controllers\JuaraController::class, 'tambahjuara']);
    Route::post('/insertjuara', [App\Http\Controllers\JuaraController::class, 'insertjuara']);

    Route::get('/tampilkandatajuara/{id}', [App\Http\Controllers\JuaraController::class, 'tampil'])->name('admin/tampilkanjuara');
    Route::post('/updatedatajuara/{id}', [App\Http\Controllers\JuaraController::class, 'updatedatajuara'])->name('admin/updatedatajuara');

    Route::get('/deletejuara/{id}', [App\Http\Controllers\JuaraController::class, 'delete'])->name('admin/deletejuara');
    Route::get('/trashjuara', [App\Http\Controllers\JuaraController::class, 'trash'])->name('admin/trashjuara');
    Route::get('/restorejuara/{id}', [App\Http\Controllers\JuaraController::class, 'restore'])->name('admin/restorejuara');
    Route::get('/restorejuaraall', [App\Http\Controllers\JuaraController::class, 'restoreall'])->name('admin/restorejuaraall');
    Route::get('/hapuspermanenjuara/{id}', [App\Http\Controllers\JuaraController::class, 'hapuspermanen'])->name('hapuspermanenjuara');
    Route::get('/guru/hapuspermanenjuaraall', [App\Http\Controllers\JuaraController::class, 'hapuspermanenall'])->name('hapuspermanenjuaraall');
});

//Prestasi
Route::middleware('auth')->group(function () {
    Route::get('/prestasi', [App\Http\Controllers\PrestasiController::class, 'index'])->name('admin/h-prestasi');
    Route::get('/tambahprestasi', [App\Http\Controllers\PrestasiController::class, 'tambahprestasi']);
    Route::post('/insertprestasi', [App\Http\Controllers\PrestasiController::class, 'insertprestasi']);

    Route::get('/tampilkandataprestasi/{id}', [App\Http\Controllers\PrestasiController::class, 'tampil'])->name('admin/tampilkanprestasi');
    Route::post('/updatedataprestasi/{id}', [App\Http\Controllers\PrestasiController::class, 'updatedataprestasi'])->name('admin/updatedataprestasi');

    Route::get('/deleteprestasi/{id}', [App\Http\Controllers\PrestasiController::class, 'delete'])->name('admin/deleteprestasi');
    Route::get('/trashprestasi', [App\Http\Controllers\PrestasiController::class, 'trash'])->name('admin/trashprestasi');
    Route::get('/restoreprestasi/{id}', [App\Http\Controllers\PrestasiController::class, 'restore'])->name('admin/restoreprestasi');
    Route::get('/restoreprestasiall', [App\Http\Controllers\PrestasiController::class, 'restoreall'])->name('admin/restoreprestasiall');
    Route::get('/hapuspermanenprestasi/{id}', [App\Http\Controllers\PrestasiController::class, 'hapuspermanen'])->name('hapuspermanenprestasi');
    Route::get('/guru/hapuspermanenprestasiall', [App\Http\Controllers\PrestasiController::class, 'hapuspermanenall'])->name('hapuspermanenprestasiall');
});

//Event
Route::middleware('auth')->group(function () {
    Route::get('/dataevent', [App\Http\Controllers\EventController::class, 'index'])->name('admin/e-nextevent');
    Route::get('/tambahevent', [App\Http\Controllers\EventController::class, 'tambahevent']);
    Route::post('/insertevent', [App\Http\Controllers\EventController::class, 'insertEvent']);

    Route::get('/detailevent/{id}', [App\Http\Controllers\EventController::class, 'detail'])->name('admin/detailevent');
    Route::get('/tampilkandataevent/{id}', [App\Http\Controllers\EventController::class, 'tampil'])->name('admin/tampilkanevent');
    Route::post('/updatedataevent/{id}', [App\Http\Controllers\EventController::class, 'updatedataevent'])->name('admin/updatedataevent');

    Route::get('/deleteevent/{id}', [App\Http\Controllers\EventController::class, 'delete'])->name('admin/deleteevent');
    Route::get('/trashevent', [App\Http\Controllers\EventController::class, 'trash'])->name('admin/trashevent');
    Route::get('/restoreevent/{id}', [App\Http\Controllers\EventController::class, 'restoreevent'])->name('admin/restoreevent');
    Route::get('/restoreeventall', [App\Http\Controllers\EventController::class, 'restoreeventall'])->name('admin/restoreguruall');
    Route::get('/hapuspermanenevent/{id}', [App\Http\Controllers\EventController::class, 'hapuspermanenevent'])->name('hapuspermanenevent');
    Route::get('/hapuspermaneneventall', [App\Http\Controllers\EventController::class, 'hapuspermaneneventall'])->name('hapuspermaneneventall');
});



//Form

Route::middleware('auth')->group(function () {
    Route::get('/dataform', [App\Http\Controllers\FormController::class, 'index'])->name('admin/f-informasi-ppdb');
    Route::get('/tambahform', [App\Http\Controllers\FormController::class, 'tambahform']);
    Route::post('/insertform', [App\Http\Controllers\FormController::class, 'insertform']);


    Route::get('/tampilkandataform/{id}', [App\Http\Controllers\FormController::class, 'tampil'])->name('admin/tampilkanform');
    Route::post('/updatedataform/{id}', [App\Http\Controllers\FormController::class, 'updatedataform'])->name('admin/updatedataform');

    Route::get('/deleteform/{id}', [App\Http\Controllers\FormController::class, 'delete'])->name('admin/deleteform');
    Route::get('/trashform', [App\Http\Controllers\FormController::class, 'trash'])->name('admin/trashform');
    Route::get('/restoreform/{id}', [App\Http\Controllers\FormController::class, 'restore'])->name('admin/restoreform');
    Route::get('/restoreformall', [App\Http\Controllers\FormController::class, 'restoreall'])->name('admin/restoreformall');
    Route::get('/hapuspermanenform/{id}', [App\Http\Controllers\FormController::class, 'hapuspermanen'])->name('hapuspermanenform');
    Route::get('/hapuspermanenformall', [App\Http\Controllers\FormController::class, 'hapuspermanenall'])->name('hapuspermanenformall');
});



//Civitas
//data guru
Route::middleware('auth')->group(function () {
    Route::get('/dataguru', [App\Http\Controllers\GuruController::class, 'index'])->name('admin/c-guru');
    Route::get('/tambahguru', [App\Http\Controllers\GuruController::class, 'tambahguru']);
    Route::post('/insertguru', [App\Http\Controllers\GuruController::class, 'insertguru']);

    Route::get('/tampilkandataguru/{id}', [App\Http\Controllers\GuruController::class, 'tampil'])->name('admin/tampilkanguru');
    Route::post('/updatedataguru/{id}', [App\Http\Controllers\GuruController::class, 'updatedataguru'])->name('admin/updatedataguru');

    Route::get('/deleteguru/{id}', [App\Http\Controllers\GuruController::class, 'delete'])->name('admin/deleteguru');
    Route::get('/trashguru', [App\Http\Controllers\GuruController::class, 'trash'])->name('admin/trashguru');
    Route::get('/restoreguru/{id}', [App\Http\Controllers\GuruController::class, 'restoreguru'])->name('admin/restoreguru');
    Route::get('/restoreguruall', [App\Http\Controllers\GuruController::class, 'restoreguruall'])->name('admin/restoreguruall');
    Route::get('/hapuspermanenguru/{id}', [App\Http\Controllers\GuruController::class, 'hapuspermanenguru'])->name('hapuspermanenguru');
    Route::get('/hapuspermanenguruall', [App\Http\Controllers\GuruController::class, 'hapuspermanenguruall'])->name('hapuspermanenguruall');
});


//data karyawan
Route::middleware('auth')->group(function () {
    Route::get('/datakaryawan', [App\Http\Controllers\KaryawanController::class, 'index'])->name('admin/c-karyawan');
    Route::get('/tambahkaryawan', [App\Http\Controllers\KaryawanController::class, 'tambahkaryawan']);
    Route::post('/insertkaryawan', [App\Http\Controllers\KaryawanController::class, 'insertkaryawan']);

    Route::get('/tampilkandatakaryawan/{id}', [App\Http\Controllers\KaryawanController::class, 'tampil'])->name('admin/tampilkankaryawan');
    Route::post('/updatedatakaryawan/{id}', [App\Http\Controllers\KaryawanController::class, 'updatedatakaryawan'])->name('admin/updatedatakaryawan');

    Route::get('/deletekaryawan/{id}', [App\Http\Controllers\KaryawanController::class, 'delete'])->name('admin/deletekaryawan');
    Route::get('/trashkaryawan', [App\Http\Controllers\KaryawanController::class, 'trash'])->name('admin/trashkaryawan');
    Route::get('/restorekaryawan/{id}', [App\Http\Controllers\KaryawanController::class, 'restorekaryawan'])->name('admin/restorekaryawan');
    Route::get('/restorekaryawanall', [App\Http\Controllers\KaryawanController::class, 'restorekaryawanall'])->name('admin/restorekaryawanall');
    Route::get('/hapuspermanenkaryawan/{id}', [App\Http\Controllers\KaryawanController::class, 'hapuspermanenkaryawan'])->name('hapuspermanenkaryawan');
    Route::get('/hapuspermanenkaryawanall', [App\Http\Controllers\KaryawanController::class, 'hapuspermanenkaryawanall'])->name('hapuspermanenkaryawanall');
});


//data kepala
Route::middleware('auth')->group(function () {
    Route::get('/datakepala', [App\Http\Controllers\KepalaController::class, 'index'])->name('admin/c-kepalasekolah');
    Route::get('/tambahkepala', [App\Http\Controllers\KepalaController::class, 'tambahkepala']);
    Route::post('/insertkepala', [App\Http\Controllers\KepalaController::class, 'insertkepala']);

    Route::get('/tampilkandatakepala/{id}', [App\Http\Controllers\KepalaController::class, 'tampil'])->name('admin/tampilkankepala');
    Route::post('/updatedatakepala/{id}', [App\Http\Controllers\KepalaController::class, 'updatedatakepala'])->name('admin/updatedatakepala');

    Route::get('/deletekepala/{id}', [App\Http\Controllers\KepalaController::class, 'delete'])->name('admin/deletekepala');
    Route::get('/trashkepala', [App\Http\Controllers\KepalaController::class, 'trash'])->name('admin/trashkepala');
    Route::get('/restorekepala/{id}', [App\Http\Controllers\KepalaController::class, 'restore'])->name('admin/restorekepala');
    Route::get('/restorekepalaall', [App\Http\Controllers\KepalaController::class, 'restoreall'])->name('admin/restorekepalaall');
    Route::get('/hapuspermanenkepala/{id}', [App\Http\Controllers\KepalaController::class, 'hapuspermanen'])->name('hapuspermanenkepala');
    Route::get('/guru/hapuspermanenkepalaall', [App\Http\Controllers\KepalaController::class, 'hapuspermanenall'])->name('hapuspermanenkepalaall');
});



//data wakil kepala
Route::middleware('auth')->group(function () {
    Route::get('/datawakil', [App\Http\Controllers\WakilKepalaController::class, 'index'])->name('admin/c-wakilkepala');
    Route::get('/tambahwakil', [App\Http\Controllers\WakilKepalaController::class, 'tambahwakil']);
    Route::post('/insertwakil', [App\Http\Controllers\WakilKepalaController::class, 'insertwakil']);

    Route::get('/tampilkandatawakil/{id}', [App\Http\Controllers\WakilKepalaController::class, 'tampil'])->name('admin/tampilkanwakil');
    Route::post('/updatedatawakil/{id}', [App\Http\Controllers\WakilKepalaController::class, 'updatedatawakil'])->name('admin/updatedatawakil');
    Route::get('/deletewakil/{id}', [App\Http\Controllers\WakilKepalaController::class, 'delete'])->name('admin/deletewakil');
    Route::get('/trashwakil', [App\Http\Controllers\WakilKepalaController::class, 'trash'])->name('admin/trashwakil');
    Route::get('/restorewakil/{id}', [App\Http\Controllers\WakilKepalaController::class, 'restore'])->name('admin/restorewakil');
    Route::get('/restorewakilall', [App\Http\Controllers\WakilKepalaController::class, 'restoreall'])->name('admin/restorewakilall');
    Route::get('/hapuspermanenwakil/{id}', [App\Http\Controllers\WakilKepalaController::class, 'hapuspermanen'])->name('hapuspermanenwakil');
    Route::get('/guru/hapuspermanenwakilall', [App\Http\Controllers\WakilKepalaController::class, 'hapuspermanenall'])->name('hapuspermanenwakilall');
});



//data walikelas
Route::middleware('auth')->group(function () {
    Route::get('/datawalikelas', [App\Http\Controllers\WaliKelasController::class, 'wali'])->name('admin/c-walikelas');
    Route::get('/tambahwalikelas', [App\Http\Controllers\WaliKelasController::class, 'tambahwali']);
    Route::post('/insertwalikelas', [App\Http\Controllers\WaliKelasController::class, 'insertwali']);

    Route::get('/tampilkandatawali/{id}', [App\Http\Controllers\WaliKelasController::class, 'tampil'])->name('admin/tampilkanwalikelas');
    Route::post('/updatedatawali/{id}', [App\Http\Controllers\WaliKelasController::class, 'updatedatawali'])->name('admin/updatedatawali');

    Route::get('/deletewali/{id}', [App\Http\Controllers\WaliKelasController::class, 'delete'])->name('admin/deletewali');
    Route::get('/trashwali', [App\Http\Controllers\WaliKelasController::class, 'trash'])->name('admin/trashwali');
    Route::get('/restorewali/{id}', [App\Http\Controllers\WaliKelasController::class, 'restore'])->name('admin/restorehwali');
    Route::get('/restorewaliall', [App\Http\Controllers\WaliKelasController::class, 'restoreall'])->name('admin/restorehwaliall');
    Route::get('/hapuspermanenwali/{id}', [App\Http\Controllers\WaliKelasController::class, 'hapuspermanen'])->name('hapuspermanenwali');
    Route::get('/hapuspermanensemuawali', [App\Http\Controllers\WaliKelasController::class, 'hapuspermanenall'])->name('hapuspermanensemuawali');
});

//data osis
Route::middleware('auth')->group(function () {
    Route::get('/dataosis', [App\Http\Controllers\OsisController::class, 'osis'])->name('admin/c-osis');
    Route::get('/tambahosis', [App\Http\Controllers\OsisController::class, 'tambahosis']);
    Route::post('/insertosis', [App\Http\Controllers\OsisController::class, 'insertosis']);

    Route::get('/tampilkandataosis/{id}', [App\Http\Controllers\OsisController::class, 'tampil'])->name('admin/tampilkanosis');
    Route::post('/updatedataosis/{id}', [App\Http\Controllers\OsisController::class, 'updatedataosis'])->name('admin/updatedataosis');

    Route::get('/deleteosis/{id}', [App\Http\Controllers\OsisController::class, 'delete'])->name('admin/deleteosis');
    Route::get('/trashosis', [App\Http\Controllers\OsisController::class, 'trash'])->name('admin/trashosis');
    Route::get('/restoreosis/{id}', [App\Http\Controllers\OsisController::class, 'restore'])->name('admin/restorehosis');
    Route::get('/restoreosisall', [App\Http\Controllers\OsisController::class, 'restoreall'])->name('admin/restorehosisall');
    Route::get('/hapuspermanenosis/{id}', [App\Http\Controllers\OsisController::class, 'hapuspermanen'])->name('hapuspermanenosis');
    Route::get('/hapuspermanensemuaosis', [App\Http\Controllers\OsisController::class, 'hapuspermanenall'])->name('hapuspermanensemuaosis');
});



//DataSiswa
//Kelas 7B
Route::middleware('auth')->group(function () {
    Route::get('/datasiswa7a', [App\Http\Controllers\Siswa7bController::class, 'kelas7a'])->name('admin/kelas/kelas7a');
    Route::get('/datasiswa7b', [App\Http\Controllers\Siswa7bController::class, 'index'])->name('admin/kelas/kelas7b');
    Route::get('/datasiswa8a', [App\Http\Controllers\Siswa7bController::class, 'kelas8a'])->name('admin/kelas/kelas8a');
    Route::get('/datasiswa8b', [App\Http\Controllers\Siswa7bController::class, 'kelas8b'])->name('admin/kelas/kelas8b');
    Route::get('/datasiswa9a', [App\Http\Controllers\Siswa7bController::class, 'kelas9a'])->name('admin/kelas/kelas9a');
    Route::get('/datasiswa9b', [App\Http\Controllers\Siswa7bController::class, 'kelas9b'])->name('admin/kelas/kelas9b');
    Route::get('/tambahsiswa7b', [App\Http\Controllers\Siswa7bController::class, 'tambahsiswa7b']);
    Route::post('/insertsiswa7b', [App\Http\Controllers\Siswa7bController::class, 'insertsiswa7b']);

    Route::get('/tampilkandatasiswa7b/{id}', [App\Http\Controllers\Siswa7bController::class, 'tampil'])->name('admin/tampilkansiswa7b');
    Route::post('/updatedatasiswa7b/{id}', [App\Http\Controllers\Siswa7bController::class, 'updatedatasiswa7b'])->name('admin/updatedatasiswa7b');

    Route::get('/deletesiswa7b/{id}', [App\Http\Controllers\Siswa7bController::class, 'delete'])->name('admin/deletesiswa7b');
    Route::get('/trashsiswa7b', [App\Http\Controllers\Siswa7bController::class, 'trash'])->name('admin/trashsiswa7b');
    Route::get('/restoresiswa7b/{id}', [App\Http\Controllers\Siswa7bController::class, 'restore'])->name('admin/restoresiswa7b');
    Route::get('/restoresiswa7ball', [App\Http\Controllers\Siswa7bController::class, 'restoreall'])->name('admin/restoresiswa7ball');
    Route::get('/hapuspermanensiswa7b/{id}', [App\Http\Controllers\Siswa7bController::class, 'hapuspermanen'])->name('hapuspermanensiswa7b');
    Route::get('/hapuspermanensiswa7ball', [App\Http\Controllers\Siswa7bController::class, 'hapuspermanenall'])->name('hapuspermanensiswa7ball');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'home'])->name('home');
