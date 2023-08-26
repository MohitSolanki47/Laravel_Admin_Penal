<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Receipts;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/Add_Receipts', [App\Http\Controllers\Receipts::class, 'index']);
Route::get('/View_Receipts', [App\Http\Controllers\Receipts::class, 'index']);
Route::get('/generate_Pdf/{id}', [Receipts::class, 'generateInvoice']);

Route::post('/Add_Receipts', [Receipts::class, 'create']);
Route::get('/delete/{id}', [Receipts::class, 'delete']);
