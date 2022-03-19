<?php

use App\Modules\Auth\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group(
    [
        'middleware' => ['guest'],
        'as' => 'password.',
        'prefix' => '/reset-password'
    ], function (){
    Route::get('', [ResetPasswordController::class, 'showResetPassword'])->name('reset');
    Route::post('', [ResetPasswordController::class, 'resetPassword'])->name('update');
    Route::get('/success', [ResetPasswordController::class, 'showSuccess'])->name('success');
});
Route::get('free-curr', [\App\Modules\API\Controllers\ExternalAPIController::class, 'getFree']);
