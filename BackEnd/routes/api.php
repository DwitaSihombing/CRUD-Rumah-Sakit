<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APICreatePasienController;
use App\Http\Controllers\APIReadPasienController;
use App\Http\Controllers\APIUpdatePasienController;
use App\Http\Controllers\APIDeletePasienController;
use App\Http\Controllers\APIUpdateZeroPasienController;
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

Route::post('addPasien', [APICreatePasienController::class, 'createpasien']);
Route::get('readallPasien', [APIReadPasienController::class, 'readPasien']);
Route::patch('updatePasien/{id}', [APIUpdatePasienController::class, 'updatepasien']);
Route::delete('delete/{id}', [APIDeletePasienController::class, 'destroy']);
Route::get('updatePasien/{id}', [APIUpdateZeroPasienController::class, 'readPasienById']);


