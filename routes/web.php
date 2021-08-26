<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\SatuanKerjaController;

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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/approval', [HomeController::class, 'approval'])->name('approval');
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    // User Route
    Route::middleware(['approved'])->group(function () {
        // User Route
    Route::resource('roles', RoleController::class);

    // Satuan Kerja Route
    Route::resource('satuankerja', SatuanKerjaController::class);
    Route::get('importExportViewSatuanKerja', [SatuanKerjaController::class, 'importExportView']);
    Route::get('exportSatuanKerja', [SatuanKerjaController::class, 'export'])->name('exportSatuanKerja');
    Route::post('importSatuanKerja', [SatuanKerjaController::class, 'import'])->name('importSatuanKerja');
    //Drone Route
    Route::resource('drones', DroneController::class);
    Route::get('exportDrone', [DroneController::class, 'export'])->name('exportDrone');
    Route::post('importDrone', [DroneController::class, 'import'])->name('importDrone');
    // Asset Route
    Route::get('/assets', [AssetController::class, 'index'])->name('assets.index');
    Route::get('/assets/{id}', [AssetController::class, 'edit'])->name('assets.edit');
    Route::delete('/assets/drone/{id}', [AssetController::class, 'destroy'])->name('assets.destroy');
    Route::get('/assets/{satuankerja_id}/drone/{drone_id}', [AssetController::class, 'addDrone'])->name('assets.addDrone');


    Route::resource('users', UserController::class);   
    Route::get('/userapprove', [UserController::class, 'approve'])->name('users.approval');
    Route::get('/userapprove/approve/{user_id}', [UserController::class, 'approved'])->name('users.approve'); 
    Route::get('/userapprove/notapprove/{user_id}', [UserController::class, 'notApproved'])->name('users.notapprove'); 
    });
});
