<?php

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

Route::get('articulos', [\App\Http\Controllers\API\ArticulosAbmController::class, 'index'])
    ->middleware(['auth']);
Route::get('articulos/{id}', [\App\Http\Controllers\API\ArticulosAbmController::class, 'view'])
    ->middleware(['auth']);

Route::post('articulos', [\App\Http\Controllers\API\ArticulosAbmController::class, 'create'])
->middleware(['auth']);

Route::put('articulos/{id}', [\App\Http\Controllers\API\ArticulosAbmController::class, 'update'])
->middleware(['auth']);

Route::delete('articulos/{id}',  [\App\Http\Controllers\API\ArticulosAbmController::class, 'delete'])
->middleware(['auth']);