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

#Renderiza vista home de envío de correo
Route::get('/', [App\Http\Controllers\OfferZoneController::class, 'index'])->name('indexOfferZone');

#Se encarga de ejecutar el envío del correo para compartir oferta
Route::post('/share-offer', [App\Http\Controllers\OfferZoneController::class, 'store'])->name('storeOfferZone');