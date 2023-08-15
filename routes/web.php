<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ArticleController;
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
Route::prefix('categories')->group(function() {
    Route::get('/', [CategoryController::class, 'categoriesList'])->name("categories.list");
    Route::get('create', [CategoryController::class, 'createCategory'])->name("categories.create");
    Route::post('create', [CategoryController::class, 'storeCategory'])->name("categories.store");
    Route::get('{categoryId}/edit', [CategoryController::class, 'editCategory'])->name("categories.edit");
    Route::put('{categoryId}/edit', [CategoryController::class, 'updateCategory'])->name("categories.update");
    Route::delete('{categoryId}', [CategoryController::class, 'deleteCategory'])->name("categories.delete");
});


//Статьи
Route::prefix('articles')->group(function() {
    Route::get('/', [ArticleController::class, 'index'])->name("articles.index");
    Route::get('create', [ArticleController::class, 'create'])->name("articles.create");
    Route::post('store', [ArticleController::class, 'store'])->name("articles.store");
    Route::get('{articleId}/edit', [ArticleController::class, 'edit'])->name("articles.edit");
    Route::put('{articleId}/edit', [ArticleController::class, 'update'])->name("articles.update");
    Route::delete('{articleId}', [ArticleController::class, 'delete'])->name("articles.delete");
    Route::get('{articleSlug}', [ArticleController::class, 'show'])->name("articles.show");
});