<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProposalsController;
use App\Http\Controllers\ReadFilesController;

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

Route::prefix('users')->group(function () {
        Route::post('/login', [UsersController::class, 'login']);
        Route::group(['middleware' => ['auth:api']], function () {
                Route::get('', [UsersController::class, 'getAll']);
                Route::get('/{id}', [UsersController::class, 'getById']);
                Route::post('', [UsersController::class, 'create']);
                Route::put('/{id}', [UsersController::class, 'update']);
                Route::delete('/{id}', [UsersController::class, 'delete']);
                Route::post('/logout', [UsersController::class, 'logout']);
        });
});

Route::prefix('simulation/')->namespace('App\Http\Controllers')->group(function () {
        Route::get('{name_file}', [ProposalsController::class, 'listAllPlans']);
        Route::post('', [ProposalsController::class, 'registerBeneficiariesByPlan']);
    });
