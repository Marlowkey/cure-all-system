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
use App\Http\Controllers\OrderAuditTrailController;
use App\Http\Controllers\HistoryController;


Route::get('/', function () {
    $featuredMedicines = Medicine::inRandomOrder()->take(4)->get();
    return view('welcome', compact('featuredMedicines'));
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
Route::post('/medicines/{id}/update-image', [MedicineController::class, 'updateMedicineImage'])->name('medicines.update-image');

Route::get('/search', SearchController::class);


Route::get('/cart', [OrderItemController::class, 'index'])->middleware('auth')->name('cart.index');
Route::post('/cart', [OrderItemController::class, 'store'])->middleware('auth')->name('cart.store');
Route::delete('/cart/{id}', [OrderItemController::class, 'destroy'])->middleware('auth')->name('cart.destroy');
Route::patch('/cart/{id}', [OrderItemController::class, 'update'])->name('cart.update');

Route::post('/checkout', [OrderController::class, 'store'])->middleware('auth')->name('order.store');
Route::get('/orders', [OrderController::class, 'index'])->middleware('auth')->name('orders.index');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::put('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');


Route::post('/orders/{orderId}/accept', [OrderController::class, 'acceptOrder'])->name('orders.accept');
Route::post('/orders/{orderId}/decline', [OrderController::class, 'declineOrder'])->name('orders.decline');

Route::post('/orders/{order}/rider/accept', [OrderController::class, 'acceptRiderOrder'])->name('orders.rider.accept');
Route::post('/orders/{order}/rider/decline', [OrderController::class, 'declineRiderOrder'])->name('orders.rider.decline');
Route::post('/orders/{order}/rider/complete', [OrderController::class, 'completeRiderOrder'])->name('orders.rider.complete');


Route::get('/history', [HistoryController::class, 'index'])->name('history.index');

Route::get('/users', [UserController::class, 'index'])->name('users.index'); // List all users
Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // Display form to create a new user
Route::post('/users', [UserController::class, 'store'])->name('users.store'); // Handle form submission to create a user
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users/{id}/show', [UserController::class, 'show'])->name('users.show'); // Fixed typo in show route
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


Route::get('/admin/audit-trails', [OrderAuditTrailController::class, 'index'])->name('admin.audit.trails');

require __DIR__ . '/auth.php';
