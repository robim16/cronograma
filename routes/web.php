<?php

use App\Http\Controllers\Admin\ActividadController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ColaboradorController;
use App\Http\Controllers\Admin\CronogramaController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::resource('actividades', ActividadController::class);
    Route::resource('colaboradores', ColaboradorController::class);
});

Route::namespace('Admin')->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('admin');
        
        
        Route::prefix('cronograma')->group(function () {
            Route::get('/', [CronogramaController::class, 'index'])->name('cronograma.index');
            Route::get('/events', [CronogramaController::class, 'events']);
        });
    });
});
