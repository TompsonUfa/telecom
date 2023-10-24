<?php

use App\Http\Controllers\Api\EquipmentController;
use Illuminate\Support\Facades\Route;


    Route::apiResource('equipment', EquipmentController::class);

    Route::get('equipment-type', [EquipmentController::class, 'type']);



