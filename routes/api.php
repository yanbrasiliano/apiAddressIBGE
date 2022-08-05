<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MunicipalityController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	return $request->user();
});
Route::get('municipality', [MunicipalityController::class, 'getAll']);

Route::get('municipality/{id}', [MunicipalityController::class, 'getByID']);

Route::delete('municipality/{id}', [MunicipalityController::class, 'destroy']);

Route::put('municipality/{id}', [MunicipalityController::class, 'update']);

Route::post('municipality', [MunicipalityController::class, 'register']);


//Optional route.
// Route::post('municipality', [MunicipalityController::class, 'getByFields']);
