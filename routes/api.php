<?php

use App\Modules\Auth\Controllers\RegisterController;
use App\Modules\Auth\Controllers\ResetPasswordController;
use App\Modules\Categories\Controllers\CategoriesController;
use App\Modules\Auth\Controllers\LoginController;
use App\Modules\Products\Controllers\ProductsController;
use App\Modules\Users\Controllers\UsersController;
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

Route::group(['middleware' => ['guest']], function (){
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/forgot-password', [ResetPasswordController::class, 'forgotPassword']);
    Route::post('/forgot-password-mobile', [ResetPasswordController::class, 'forgotPasswordMobile']);
    Route::post('/reset-password-mobile', [ResetPasswordController::class, 'resetPasswordMobile']);
    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword']);
});

Route::apiResources([
    'products' => ProductsController::class,
    'categories' => CategoriesController::class
]);
Route::get('products/category/{category}', [ProductsController::class, 'getByCategory']);

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::apiResource('users', UsersController::class);
    Route::get('user', [UsersController::class, 'getUser']);
});
