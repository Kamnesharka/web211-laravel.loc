<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [AppController::class, "mainPage"])->name("app.main");

// Категории
Route::get('categories', [CategoryController::class, 'categoriesList'])->name("categories.list");
Route::get('categories/create', [CategoryController::class, 'createCategory'])->name("categories.create");
Route::post('categories/create', [CategoryController::class, 'storeCategory'])->name("categories.store");
