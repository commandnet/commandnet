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

Route::middleware("auth")->get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware("auth")->get('sections', [App\Http\Controllers\HomeController::class, 'index'])->name('sections');
Route::middleware("auth")->get('personal', [App\Http\Controllers\HomeController::class, 'index'])->name('personal');
Route::middleware("auth")->get('map', [App\Http\Controllers\MapController::class, 'index'])->name('map');
Route::middleware("auth")->get('material', [App\Http\Controllers\HomeController::class, 'index'])->name('material');

Route::middleware("auth")->get('diary', [App\Http\Controllers\HomeController::class, 'index'])->name('diary');
Route::middleware("auth")->get('messages', [App\Http\Controllers\HomeController::class, 'index'])->name('messages');
