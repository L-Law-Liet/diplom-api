<?php

use App\Modules\Articles\Controllers\ArticlesController;
use App\Modules\Favourites\Controllers\FavouritesController;
use App\Modules\Info\Controllers\InfoController;
use App\Modules\News\Controllers\NewsController;
use App\Modules\Auth\Controllers\RegisterController;
use App\Modules\Auth\Controllers\ResetPasswordController;
use App\Modules\Categories\Controllers\CategoriesController;
use App\Modules\Auth\Controllers\LoginController;
use App\Modules\Orders\Controllers\CartsController;
use App\Modules\Orders\Controllers\OrdersController;
use App\Modules\API\Controllers\ExternalAPIController;
use App\Modules\Products\Controllers\ProductsController;
use App\Modules\Users\Controllers\UsersController;
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

Route::group(['middleware' => ['guest']], function (){
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/forgot-password', [ResetPasswordController::class, 'forgotPassword']);
    Route::post('/forgot-password-mobile', [ResetPasswordController::class, 'forgotPasswordMobile']);
    Route::post('/reset-password-mobile', [ResetPasswordController::class, 'resetPasswordMobile']);
    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword']);
});

Route::group(['middleware' => ['throttle:600,1']], function (){
    Route::apiResources([
        'products' => ProductsController::class,
        'news' => NewsController::class,
        'categories' => CategoriesController::class,
    ],
        ['only' => ['index', 'show']]);
});

Route::group(['middleware' => ['auth:sanctum', 'throttle:600,1']], function() {
    Route::apiResources([
        'favourites' => FavouritesController::class,
        'carts' => CartsController::class,
        'orders' => OrdersController::class,
    ]);
    Route::get('user', [UsersController::class, 'getUser']);
    Route::post('user/image', [UsersController::class, 'setAvatar']);
    Route::apiResource('users', UsersController::class);
});

Route::group(['middleware' => ['throttle:600,1']], function() {
    Route::get('/oil-price', [ExternalAPIController::class, 'getOilPrice']);
    Route::get('/currencies', [ExternalAPIController::class, 'getCurrencies']);
    Route::get('/infos', [InfoController::class, 'index']);
    Route::get('/infos/{key}', [InfoController::class, 'getByKey']);
    Route::get('/articles', [ArticlesController::class, 'index']);
    Route::get('/article-types', [ArticlesController::class, 'getTypes']);
    Route::get('/articles/{id}', [ArticlesController::class, 'getByType'])->whereNumber(['id']);
});
