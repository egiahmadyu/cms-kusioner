<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KuesionerController;
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

Route::post('webhook', [KuesionerController::class, 'start']);
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login/proses', [AuthController::class, 'login_process'])->name('auth.process');

Route::middleware(['auth', 'auth.session'])->group(function () {
  Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('logout', [AuthController::class, 'logout'])->name('logout');

  Route::get('kuesioner', [KuesionerController::class, 'index'])->name('kuesioner');

  Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::post('/list', [UserController::class, 'list'])->name('user.list');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::put('/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
  });
});
