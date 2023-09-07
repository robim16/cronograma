<?php

use App\Http\Controllers\Api\ActividadController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ColaboradorController;
use App\Http\Controllers\Api\EstadoController;
use App\Http\Controllers\Api\RolController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('colaboradores')->group(function () {
    Route::get('/', [ColaboradorController::class, 'index']);
});

Route::prefix('categorias')->group(function () {
    Route::get('/', [CategoriaController::class, 'index']);
});

Route::prefix('estados')->group(function () {
    Route::get('/', [EstadoController::class, 'index']);
});

Route::prefix('roles')->group(function () {
    Route::get('/', [RolController::class, 'index']);
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'verify_admin']);
});

Route::prefix('actividades')->group(function () {
    Route::get('/', [ActividadController::class, 'index']);
    Route::post('/', [ActividadController::class, 'store']);
    Route::put('/{actividade}', [ActividadController::class, 'update']);
    Route::delete('/{actividade}', [ActividadController::class, 'destroy']);
});
