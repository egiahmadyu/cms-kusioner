<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaAcaraController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\StorageLocationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login/proses', [AuthController::class, 'login_process'])->name('auth.process');

Route::middleware(['auth', 'auth.session'])->group(function () {
  Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('logout', [AuthController::class, 'logout'])->name('logout');

  Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::post('/list', [UserController::class, 'list'])->name('user.list');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::put('/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
  });

  Route::prefix('kategori')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category');
    Route::post('/list', [CategoryController::class, 'list'])->name('category.list');
    Route::post('/create', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
  });

  Route::prefix('member')->group(function () {
    Route::get('/', [MemberController::class, 'index'])->name('member');
    Route::get('/create', [MemberController::class, 'create'])->name('member.create');
    Route::get('/show/{id}', [MemberController::class, 'show'])->name('member.show');
    Route::post('/', [MemberController::class, 'store'])->name('member.store');
    Route::post('/list', [MemberController::class, 'list'])->name('member.list');
    Route::put('/{id}', [MemberController::class, 'edit'])->name('member.edit');
    // Route::put('/{id}', [MemberController::class, 'update'])->name('member.update');
    Route::delete('/{id}', [MemberController::class, 'destroy'])->name('member.destroy');
  });

  Route::prefix('penyimpanan')->group(function () {
    Route::get('/', [StorageController::class, 'index'])->name('penyimpanan');
    Route::get('/tambah', [StorageController::class, 'create'])->name('penyimpanan.create');
    Route::post('/', [StorageController::class, 'store'])->name('penyimpanan.store');
    Route::post('/list', [StorageController::class, 'list'])->name('penyimpanan.list');
    Route::get('/edit/{id}', [StorageController::class, 'edit'])->name('penyimpanan.edit');
    Route::put('/update/{id}', [StorageController::class, 'update'])->name('penyimpanan.update');
    Route::delete('/{id}', [StorageController::class, 'destroy'])->name('penyimpanan.delete');

    Route::put('/approve-draft/{id}', [StorageController::class, 'approve_draft'])->name('penyimpanan.approve');
    Route::get('/detail/{id}', [StorageController::class, 'detail'])->name('penyimpanan.detail');
  });

  Route::prefix('ba')->group(function () {
    Route::get('/{id}', [BeritaAcaraController::class, 'create'])->name('ba.create');
  });

  Route::prefix('lokasi')->group(function () {
    Route::get('/', [StorageLocationController::class, 'index'])->name('lokasi');
    Route::get('tambah', [StorageLocationController::class, 'create'])->name('lokasi.create');
    Route::post('/', [StorageLocationController::class, 'store'])->name('lokasi.store');
    Route::post('list', [StorageLocationController::class, 'list'])->name('lokasi.list');
    Route::put('update/{id}', [StorageLocationController::class, 'update'])->name('lokasi.update');
    Route::delete('/{id}', [StorageLocationController::class, 'destroy'])->name('lokasi.destroy');
    Route::get('generate/{id}', [StorageLocationController::class, 'generateDoc'])->name('lokasi.generate');
  });

  Route::get('blank', function () {
    $data['page_name'] = 'Blank Page';
    return view('pages.blank', $data);
  })->name('blank');

  Route::get('qr', function () {
    $data['page_name'] = 'Blank Page';
    // return view('pages.blank', $data);

    $qrCodes = [];
    $qrCodes['simple'] =
      QrCode::size(150)->generate('test');
    $qrCodes['changeColor'] =
      QrCode::size(150)->color(255, 0, 0)->generate('https://minhazulmin.github.io/');
    $qrCodes['changeBgColor'] =
      QrCode::size(150)->backgroundColor(255, 0, 0)->generate('https://minhazulmin.github.io/');
    $qrCodes['styleDot'] =
      QrCode::size(150)->style('dot')->generate('https://minhazulmin.github.io/');
    $qrCodes['styleSquare'] = QrCode::size(150)->style('square')->generate('test');
    $qrCodes['styleRound'] = QrCode::size(150)->style('round')->generate('https://minhazulmin.github.io/');

    return view('pages.qr', $qrCodes);
  })->name('qr');
});
