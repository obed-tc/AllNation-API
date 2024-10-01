<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\AdministrativeTypeController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function () {

    // Rutas para países
    Route::get('countries', [CountryController::class, 'index']);
    Route::get('countries/{id}', [CountryController::class, 'show']);

    // Rutas para regiones
    Route::get('countries/{countryId}/regions', [RegionController::class, 'index']);

    Route::get('/regions', [RegionController::class, 'index']);
    Route::get('/regions/{id}', [RegionController::class, 'show']);

    // Rutas para localidades
    Route::get('localities/region/{regionId}', [LocalityController::class, 'index']); // Obtener localidades de una región
    Route::get('localities/country/{countryId}', [LocalityController::class, 'getAllLocalities']); // Obtener todas las localidades de un país
    Route::get('localities/{id}', [LocalityController::class, 'show']); // Obtener una localidad específica

    // Rutas para tipos de regiones administrativas
    Route::get('administrative-types', [AdministrativeTypeController::class, 'index']);
    Route::get('administrative-types/{id}', [AdministrativeTypeController::class, 'show']);
});