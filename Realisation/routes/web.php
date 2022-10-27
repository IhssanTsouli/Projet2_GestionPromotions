<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromotionsController;
use App\Http\Controllers\ApprenantsController;

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

Route::resource('promotions',PromotionsController::class);
Route::get('/routesearch',[PromotionsController::class,'search']);

Route::resource('gestionstud',ApprenantsController::class);

Route::get('gestionstud/create/{id}',[ApprenantsController::class,'create'])->name('gestion.insert');
Route::get('gestion/editstudent/{id}',[ApprenantsController::class,'edit'])->name('gestion.editstudent');