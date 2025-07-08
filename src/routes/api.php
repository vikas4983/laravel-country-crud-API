<?php

use Illuminate\Support\Facades\Route;
use CountryList\Http\Controllers\CountryController;
use CountryList\Http\Controllers\StateController;
use CountryList\Http\Controllers\CityController;


Route::prefix('api')->group(function () {
    Route::apiResource('countries', CountryController::class);
    Route::apiResource('states', StateController::class);
    Route::apiResource('cities', CityController::class);
});
