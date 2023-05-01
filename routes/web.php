<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartsController;

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

// CRUD
Route::resource('/books', BooksController::class);
// マイカート
Route::get('/mycart',[CartsController::class,'mycart'])->middleware(['auth'])->name('shops.mycart')->middleware('auth');
// 本をマイカートに追加
Route::post('/cart',[CartsController::class,'cart'])->middleware(['auth'])->name('cart')->middleware('auth');
// マイカートに追加した本の削除
Route::delete('cartdelete',[CartsController::class,'destroy'])->name('cart.delete');
// マイカートに追加した商品の購入
Route::post('/purchase',[CartsController::class,'purchase'])->name('shops.purchase');

// Stripe決済機能
Route::post('/charge', [StripeController::class, 'charge'])->name('stripe.charge')->middleware('auth');

// 管理者専用ユーザー作成
Route::get('admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('admin/store', [AdminController::class, 'store'])->name('admin.store');

// フォールバックルート
Route::fallback(function(){
    return redirect ('/index');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
