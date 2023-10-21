<?php

use App\Http\Controllers\Api\EquipmentController;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->group(function (){

    Route::prefix('equipment')->group(function (){

        Route::get('/equipment', [EquipmentController::class, 'index']);

        Route::get('', [EquipmentController::class, 'index']);

        Route::get('/{id}', [EquipmentController::class, 'show']);

        Route::post('', [EquipmentController::class, 'store']);

        Route::put('/{id}', [EquipmentController::class, 'update']);

        Route::delete('/{id}', [EquipmentController::class, 'destroy']);

    });

    Route::get('equipment-type', [EquipmentController::class, 'type']);

//});


