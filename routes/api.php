<?php

use App\Http\Controllers\Api\EquipmentController;
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

Route::middleware('auth-sanctum')->group(function (){

    Route::prefix('equipment')->group(function (){

        Route::get('', [EquipmentController::class, 'index']);

        Route::get('/{id}', [EquipmentController::class, 'show']);

        Route::post('', [EquipmentController::class, 'store']);

        Route::put('/{id}', [EquipmentController::class, 'update']);

        Route::delete('/{id}', [EquipmentController::class, 'destroy']);

    });

    Route::get('equipment-type', [EquipmentController::class, 'type']);

});