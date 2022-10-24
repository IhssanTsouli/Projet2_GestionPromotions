<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromotionsController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::controller(PromotionsController::class)->group(function() {
//     Route::get('/', 'index');
//     Route::get('/create', 'create');
//     Route::post('/promotion', 'store');
// });
Route::resource('promotions',PromotionsController::class);