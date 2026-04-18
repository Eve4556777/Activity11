<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\SuperheroController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', [TestController::class, 'index']);
Route::get('/test/{id}', [TestController::class, 'getUniverse']);
Route::post('/create_universe', [TestController::class, 'createUniverse']);
Route::put('/universe/{id}', [TestController::class, 'updateUniverse']);
Route::delete('/universe/{id}', [TestController::class, 'deleteUniverse']);



Route::get('/superheroes', [SuperheroController::class, 'index']);
Route::get('/superheroes/{id}', [SuperheroController::class, 'getSuperhero']);
Route::post('/superheroes', [SuperheroController::class, 'createSuperhero']);
Route::put('/superheroes/{id}', [SuperheroController::class, 'updateSuperhero']);
Route::delete('/superheroes/{id}', [SuperheroController::class, 'deleteSuperhero']);