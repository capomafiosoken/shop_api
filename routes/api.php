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
Route::post('logout', 'Api\PassportController@logout');
Route::post('register', 'Api\PassportController@register');
Route::post('resetPassword', 'Api\PassportController@resetPassword');
Route::post('users/resetPassword', 'Api\UserController@resetPassword')->name('user.resetPassword');
Route::get('verify/{token}', 'Api\VerifyController@verifyEmail')->name('verify');
Route::get('reset/{token}', 'Api\VerifyController@resetPassword')->name('reset');
Route::get('productList',   'Api\ProductController@index')->name('productList');
Route::get('filterList',   'Api\FilterGroupController@index')->name('filterList');
Route::get('categoryList', 'Api\CategoryController@index')->name('categoryList');
Route::get('categoryList/{category}', 'Api\CategoryController@show')->name('categoryList.show');
Route::get('productList/{product}', 'Api\ProductController@show')->name('productList.show');

Route::middleware(['auth:api', 'can:isAdmin'])->group(function (){
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
        'roles' => 'Api\RoleController',
    ]);
    Route::post('products/setImage/{product}', 'Api\ProductController@setImage')->name('products.setImage');
});


Route::middleware(['auth:api'])->group(function () {
    Route::apiResources([
        'userOrders' => 'Api\UserOrderController',
    ]);
    Route::get('test', 'Api\PassportController@test');
    Route::get('users/addresses', 'Api\UserController@userAddresses');
    Route::get('users/likes', 'Api\UserController@userLikes');
    Route::get('users/profile', 'Api\UserController@userProfile');
    Route::get('products/{id}/like', 'Api\ProductController@isLiked');
    Route::post('products/{id}/like', 'Api\ProductController@like');
    Route::delete('products/{id}/like', 'Api\ProductController@unlike');
});
