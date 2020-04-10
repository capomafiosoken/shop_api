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
Route::apiResources([
    'user' => 'Api\UserController',
    'address' => 'Api\AddressController',
    'brand' =>'Api\BrandController',
    'category' =>'Api\CategoryController',
    'city' => 'Api\CityController',
    'currency' => 'Api\CurrencyController',
    'filterGroup' => 'Api\FilterGroupController',
    'filterValue' => 'Api\FilterValueController',
    'order' => 'Api\OrderController',
    'product' => 'Api\ProductController',
    'productImage' => 'Api\ProductImageController',
    'region' => 'Api\RegionController',
    'role' => 'Api\RoleController'
]);
