<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;


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







Route::get('/user/list', [UserController::class, 'showList']);
Route::get('/user', [UserController::class, 'index']);


Route::prefix('facebook')->name('facebook.')->group(function () {
    Route::get('auth', [adminController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [adminController::class, 'callbackFromFacebook'])->name('callback');
});


Route::prefix('manage')->group(function () {
    Route::get('/list-user', [UserController::class, 'listUsers']);
    Route::get('/detailUser/{id}', [UserController::class, 'detailUser']);
    Route::get('/blockUser/{id}', [UserController::class, 'blockUser']);
    Route::get('/', function () {
        return view('test1');
    });
});






Route::get('/', function () {
    return view('welcome');
});
