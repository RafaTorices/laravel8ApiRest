<?php

use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    // Las siguientes rutas además del prefijo requieren que el usuario tenga un token válido
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('destroyUser', 'AuthController@destroyUser');
        Route::get('user', 'AuthController@user');
        // Aquí agrega tus rutas de la API. En mi caso (EN MI CASO, EL TUYO PUEDE VARIAR) he agregado una de productos
        // Route::get("productos", function () {
        //     return response()->json(\App\Producto::all());
        // });
    });
});