<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::middleware("auth:sanctum")->get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware("auth:sanctum")->get('sections', [App\Http\Controllers\HomeController::class, 'index'])->name('sections');
Route::middleware("auth:sanctum")->get('personal', [App\Http\Controllers\HomeController::class, 'index'])->name('personal');
Route::middleware("auth:sanctum")->get('map', [App\Http\Controllers\MapController::class, 'index'])->name('map');
Route::middleware("auth:sanctum")->get('material', [App\Http\Controllers\HomeController::class, 'index'])->name('material');

Route::middleware("auth:sanctum")->get('diary', [App\Http\Controllers\HomeController::class, 'index'])->name('diary');
Route::middleware("auth:sanctum")->get('messages', [App\Http\Controllers\HomeController::class, 'index'])->name('messages');

Route::middleware('auth:sanctum')->prefix('map')->group(function () {
    Route::get('baselayer', [App\Http\Controllers\Api\map\MapBaseLayerController::class, 'index']);
    Route::get('baselayer/{id}', [App\Http\Controllers\Api\map\MapBaseLayerController::class, 'show']);
    Route::get('overlaylayer', [App\Http\Controllers\Api\map\MapOverlayLayerController::class, 'index']);
    Route::get('overlaylayer/{id}', [App\Http\Controllers\Api\map\MapOverlayLayerController::class, 'show']);
});
Route::prefix('base')->group(function () {
    Route::get('situation', [App\Http\Controllers\Api\SituationController::class, 'index']);
    Route::get('situation/{id}', [App\Http\Controllers\Api\SituationController::class, 'show']);
    Route::get('alarminbox', [App\Http\Controllers\Api\SituationController::class, 'alarminbox']);
});
