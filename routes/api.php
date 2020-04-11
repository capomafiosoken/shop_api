<?php

use Illuminate\Http\Request;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login', 'Api\PassportController@login');
Route::post('register', 'Api\PassportController@register');

Route::middleware('auth:api')->group(function () {
    Route::get('details', 'Api\PassportController@details');
});
Route::middleware(['auth:api', 'can:isAdmin'])->group(function (){
    Route::apiResource('users', 'Api\UserController');
});