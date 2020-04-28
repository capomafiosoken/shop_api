Skip to content
Search or jump to…

Pull requests
Issues
Marketplace
Explore

@aibekzh
Learn Git and GitHub without any code!
Using the Hello World guide, you’ll start a branch, write comments, and open a pull request.


capomafiosoken
/
shop_api
1
00
Code
Issues 0
Pull requests 0 Actions
Projects 0
Wiki
Security 0
Insights
shop_api/routes/api.php /
@capomafiosoken capomafiosoken product
c3e10e8 2 hours ago
@capomafiosoken@aibekzh
52 lines (46 sloc)  2.25 KB

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
Route::get('productList',   'Api\ProductController@index')->name('productList');
Route::get('filterList',   'Api\FilterGroupController@index')->name('filterList');
Route::get('categoryList', 'Api\CategoryController@index')->name('categoryList');
Route::get('getProduct/{product}', 'Api\ProductController@show')->name('product');

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


Route::middleware(['auth:api'])->group(function () {
    Route::apiResources([
        'userOrders' => 'Api\userOrderController',
    ]);
});
