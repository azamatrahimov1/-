<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CatalogOfArticle;
use App\Http\Controllers\api\MainPage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//CatalogOfArticle
Route::get('/articles', [CatalogOfArticle::class, 'index']);
Route::post('/articles', [CatalogOfArticle::class, 'store']);
Route::get('/articles/{id}', [CatalogOfArticle::class, 'show']);
Route::put('/articles/{id}/edit', [CatalogOfArticle::class, 'update']);
Route::delete('/articles/{id}/delete', [CatalogOfArticle::class, 'destroy']);
//MainPage
Route::get('/articles', [MainPage::class, 'index']);
Route::post('/articles', [MainPage::class, 'store']);
Route::get('/articles/{id}', [MainPage::class, 'show']);
Route::put('/articles/{id}/edit', [MainPage::class, 'update']);
Route::delete('/articles/{id}/delete', [MainPage::class, 'destroy']);


