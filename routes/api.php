<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CampaignController;
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


Route::group(['middleware' => 'auth.api'], function () {
    Route::get('user', [UserController::class, 'get_user']);
});


Route::group(['middleware' => 'api'], function(){ 
    Route::post('login', [UserController::class, 'login']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('register', [UserController::class, 'register']);
});

Route::group(['middleware' => 'auth.api'], function () {
    Route::get('campaigns', [CampaignController::class, 'list']);
    Route::post('campaigns/get_data', [CampaignController::class, 'get_data']);
    Route::post('campaigns/donate', [CampaignController::class, 'donate']);
});