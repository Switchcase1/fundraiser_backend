<?php

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
Route::group(['middleware' => ['auth']], function () { 

Route::get('/', [App\Http\Controllers\CampaignController::class, 'index'])->name('dashboard');
Route::get('/add-campaign', [App\Http\Controllers\CampaignController::class, 'add'])->name('add-campaign');
Route::post('/save-campaign', [App\Http\Controllers\CampaignController::class, 'save'])->name('save-campaign');
Route::get('/delete-campaign/{id}', [App\Http\Controllers\CampaignController::class, 'delete'])->name('delete-campaign');
Route::get('/view-campaign/{id}', [App\Http\Controllers\CampaignController::class, 'view'])->name('view-campaign');

Route::get('/settings', [App\Http\Controllers\CampaignController::class, 'settings'])->name('settings');
Route::post('/save-settings', [App\Http\Controllers\CampaignController::class, 'save_settings'])->name('save_settings');

});

Route::get('login', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::post('custom-login', [App\Http\Controllers\AuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [App\Http\Controllers\AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [App\Http\Controllers\AuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [App\Http\Controllers\AuthController::class, 'signOut'])->name('signout');