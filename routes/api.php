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
Route::middleware('auth:api')->get('test', 'Api\PassportController@test');

Route::post('products/setImage/{product}', 'Api\ProductController@setImage')->name('products.setImage');
Route::get('verify/{token}', 'Api\VerifyController@VerifyEmail')->name('verify');
Route::get('reset/{token}', 'Api\VerifyController@ResetPassword')->name('reset');
Route::post('users/resetPassword', 'Api\UserController@resetPassword')->name('user.resetPassword');
Route::get('productlist',   'Api\ProductController@index')->name('products.index');
Route::get('categorylist', 'Api\CategoryController@index')->name('categories.index');

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
});
