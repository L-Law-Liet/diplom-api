<?php

use App\Modules\Auth\Controllers\RegisterController;
use App\Modules\Auth\Controllers\ResetPasswordController;
use App\Modules\Categories\Controllers\CategoriesController;
use App\Modules\Auth\Controllers\LoginController;
use App\Modules\Products\Controllers\ProductsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['guest']], function (){
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/forgot-password', [ResetPasswordController::class, 'forgotPassword']);
    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword']);
});
Route::apiResources([
    'products' => ProductsController::class,
    'categories' => CategoriesController::class
]);
Route::get('products/category/{category}', [ProductsController::class, 'getByCategory']);
