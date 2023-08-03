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

Route::get('/manage', [adminController::class, 'index']);




Route::get('/user/list', [UserController::class, 'showList']);
Route::get('/user', [UserController::class, 'index']);



Route::prefix('admin')->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('admin.index');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('admin.show');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.edit');
    Route::post('/postEdit', [UserController::class, 'postEdit'])->name('admin.postEdit');
    Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('admin.delete');
});




Route::get('/', function () {
    return view('welcome');

});
