<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KuisionerController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\ProfileController;
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
    return view('pages.home');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/cetak', [LaporanController::class, 'generateLaporan'])->name('laporan.cetak');

    Route::get('/mahasiswa/delete/{id}', [MahasiswaController::class, 'delete'])->name('mahasiswa.delete');
    Route::get('/kuisioner/delete/{id}', [KuisionerController::class, 'delete'])->name('kuisioner.delete');
    Route::get('/mahasiswa/export', [MahasiswaController::class, 'export'])->name('mahasiswa.export');
    Route::get('/kuisioner/export', [KuisionerController::class, 'export'])->name('kuisioner.export');
    Route::post('/kuisioner/getkabkota', [KuisionerController::class, 'getkabkota'])->name('getkabkota');
    Route::post('/mahasiswa/import', [MahasiswaController::class, 'import'])->name('mahasiswa.import');
    Route::resources([
        'mahasiswa' => MahasiswaController::class,
        'kuisioner' => KuisionerController::class,
    ]);
});

require __DIR__ . '/auth.php';
