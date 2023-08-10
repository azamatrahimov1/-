<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\CatalogOfArticleController;

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
//MainPage
Route::get('/', [MainPageController::class, 'index'])->name('MainPage');

//CatalogOfArticle
Route::get('/articles', [CatalogOfArticleController::class, 'index'])->name('CatalogOfArticle');
Route::get('/articles/{slug}', [CatalogOfArticleController::class, 'show'])->name('articleSlug');
