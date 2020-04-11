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
<<<<<<< HEAD
    Route::apiResources([
        'products'=>'Api\ProductController',
        'users' => 'Api\UserController',
        'addresses' => 'Api\AddressController',
        'brands' =>'Api\BrandController',
        'categories' =>'Api\CategoryController',
        'cities' => 'Api\CityController',
        'currencies' => 'Api\CurrencyController',
        'filterGroups' => 'Api\FilterGroupController',
        'filterValues' => 'Api\FilterValueController',
        'orders' => 'Api\OrderController',
        'productImages' => 'Api\ProductImageController',
        'regions' => 'Api\RegionController',
        'roles' => 'Api\RoleController'
    ]);
=======
});
Route::middleware(['auth:api', 'can:isAdmin'])->group(function (){
    Route::apiResource('users', 'Api\UserController');
>>>>>>> 0e08dac05eb6dcbb0083e109fb026f581086bab5
});
