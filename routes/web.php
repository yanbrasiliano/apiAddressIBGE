<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/municipality',[MunicipalityController::class,'getAll']);

Route::get('/municipality/{id}', 'MunicipalityController@getByID');
// $router->delete('municipality/{id}', 'MunicipalityController@destroy');
// $router->put('municipality/{id}', 'MunicipalityController@update');
// $router->post('municipality', 'MunicipalityController@register');
// $router->post('municipality', 'MunicipalityController@getByFields');
