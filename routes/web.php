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

Route::get('/', [App\Http\Controllers\OfferZoneController::class, 'index'])->name('indexOfferZone');
Route::post('/share-offer', [App\Http\Controllers\OfferZoneController::class, 'store'])->name('storeOfferZone');