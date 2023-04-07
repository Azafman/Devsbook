<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'indexAction'])->name('loginAction');
Route::post('/register', [AuthController::class, 'registerAction'])->name('registerAction');

Route::middleware(['auth'])->group(function() {
    Route::get('/', [UserController::class, 'home'])->name('home');
    Route::get('/user/logout', [AuthController::class, 'logout'])->name('logoutUser');
    Route::get('/user/perfil', [UserController::class, 'myProfile'])->name('profile');
    Route::get('/user/friends', [UserController::class, 'myFriends'])->name('friends');
    Route::get('/user/fotos', [UserController::class, 'myPhotos'])->name('photos');
    Route::get('/user/configs', [UserController::class, 'config'])->name('configAcount');
});

    