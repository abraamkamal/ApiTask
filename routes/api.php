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
Route::get('/get', function () {
    \App\Jobs\MoviesJob::dispatch();
    return response()->json(['message' => 'data stored successfully'], 200);

});
Route::get('/index', 'MoviesController@index');
Route::get('/rated', 'MoviesController@rated');
Route::get('/recently', 'MoviesController@recently');
