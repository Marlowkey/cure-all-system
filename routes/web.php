<?php

use App\Models\Medicine;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderItemController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');
});

Route::resource('medicines', MedicineController::class);
Route::get('/search', SearchController::class);


Route::get('/cart', [OrderItemController::class, 'index'])->middleware('auth')->name('cart.index');
Route::post('/cart', [OrderItemController::class, 'store'])->middleware('auth')->name('cart.store');
Route::delete('/cart/{id}', [OrderItemController::class, 'destroy'])->middleware('auth')->name('cart.destroy');
Route::patch('/cart/{id}', [OrderItemController::class, 'update'])->name('cart.update');

Route::post('/checkout', [OrderController::class, 'store'])->middleware('auth')->name('order.store');

Route::resource( 'users', UserController::class)->middleware('auth');

require __DIR__.'/auth.php';
