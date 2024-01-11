<?php

use App\Http\Controllers\api\map\MapBaseLayerController;
use App\Http\Controllers\api\map\MapOverlayLayerController;
use App\Http\Controllers\api\map\SituationController;
use App\Http\Controllers\api\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'loginUser']);

Route::middleware('auth:sanctum')->prefix('map')->group(function () {
    Route::get('baselayer', [MapBaseLayerController::class, 'index']);
    Route::get('baselayer/{id}', [MapBaseLayerController::class, 'show']);
    Route::get('overlaylayer', [MapOverlayLayerController::class, 'index']);
    Route::get('overlaylayer/{id}', [MapOverlayLayerController::class, 'show']);
});
Route::middleware('auth:sanctum')->prefix('base')->group(function () {
    Route::get('situation', [SituationController::class, 'index']);
    Route::get('situation/{id}', [SituationController::class, 'show']);
});
