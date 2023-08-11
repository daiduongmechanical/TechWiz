<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\UserController;
<<<<<<< HEAD
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;

=======
use App\Http\Controllers\OrderController;
>>>>>>> origin/hien1

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

Route::post('/add', [BlogController::class, 'addBlog']);



Route::prefix('/product')->group(function () {

    Route::post('/sort-product', [ProductController::class, 'sort_product_user']);
    Route::get('/', [ProductController::class, 'all_product_user']);
});
Route::post('admin/provider/update/{id}', [ProviderController::class, 'updateProvider']);


Route::prefix('comment')->group(function () {
    Route::post('/addcomment', [CommentController::class, 'addComment']);
});

Route::prefix('chat')->group(function () {
    Route::get('/', [UserController::class, 'test']);
});



