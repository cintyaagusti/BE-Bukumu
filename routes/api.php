<?php

use Illuminate\Http\Request;

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




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['middleware' => 'auth:api'], function (){
    // Route::resource('buku', 'API\BukuController',['except' => ['edit','create']]);
    // Route::resource('kategori_buku', 'API\KategoriBukuController',['only' => ['index','show', 'store', 'destroy', 'update']]);
    
    //buku
    Route::get('/buku','BukuController@index');
    Route::post('/create-buku','BukuController@store');
    Route::get('/buku/{id}','BukuController@show');
    Route::put('/edit-buku/{id}','BukuController@edit');
    Route::delete('/hapus-buku/{id}','BukuController@destroy');

    //kategori
    Route::get('/kategori_buku','KategoriBukuController@index');
    Route::post('/create-kategori_buku','KategoriBukuController@store');
    Route::get('/kategori_buku/{id}','KategoriBukuController@show');
    Route::put('/edit-kategori_buku/{id}','KategoriBukuController@edit');
    Route::delete('/hapus-kategori_buku/{id}','KategoriBukuController@destroy');

    //penerbit
    Route::get('/penerbit','PenerbitController@index');
    Route::post('/create-penerbit','PenerbitController@store');
    Route::get('/penerbit/{id}','PenerbitController@show');
    Route::put('/edit-penerbit/{id}','PenerbitController@edit');
    Route::delete('/hapus-penerbit/{id}','PenerbitController@destroy');
// });

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('logout', 'API\AuthController@logout');
    Route::post('refresh', 'API\AuthController@refresh');
    Route::post('me', 'API\AuthController@me');
});

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('/login', 'API\AuthController@login');
    Route::post('register', 'API\AuthController@register');
});


