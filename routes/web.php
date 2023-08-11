<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// chat box
use App\Http\Controllers\Chat\AdminChatController;
use App\Http\Controllers\Chat\CreateController;
use App\Http\Controllers\Chat\GetChatsController;
use App\Http\Controllers\Chat\GetMessagesController;
use App\Http\Controllers\Chat\PostMessageController;
use App\Http\Controllers\ProductController;
// end chat box

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

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/dashboard2', function () {
    return view('client.category');
})->name('dashboard2');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);

Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })
//     // ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('guest')->group(function () {

    Route::prefix('/product')->group(function () {
        Route::get('/', [ProductController::class, 'all_product_user']);
    });
});

require __DIR__ . '/auth.php';



//realtime chat box
Route::prefix('chattle')->group(function () {
    Route::view('chat', 'chat.chat');
    Route::post('create-chat', CreateController::class);
    Route::post('post-message', PostMessageController::class);
    Route::get('get-messages', GetMessagesController::class);
    Route::get('chat-admin', AdminChatController::class);
    Route::get('get-chats', GetChatsController::class);
});
// end chat box
