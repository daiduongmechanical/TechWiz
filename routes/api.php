<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\BlogController;


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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('admin/provider/update/{id}', [ProviderController::class, 'updateProvider']);


Route::prefix('comment')->group(function () {
    Route::post('/addcomment', [CommentController::class, 'addComment']);
});

Route::prefix('chat')->group(function () {
    Route::get('/', [UserController::class, 'test']);
});
