<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
//use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

// index
Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('home');
Route::get('/brand', [BrandController::class, 'index'])->name('brands');
Route::get('/about-us', function (){
    return view('about-us');
})->name('about-us');
//products
Route::get('/product', [ProductController::class, 'index'])->name('products');
Route::get('/product/{id}', [ProductController::class, 'getProduct'])->name('products.show');
//order
Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::post('/orders/add-item', [OrderController::class, 'addItem'])->name('orders.add');
Route::post('/orders/remove-item', [OrderController::class, 'removeItem'])->name('orders.remove');
Route::post('/orders/change-quantity', [OrderController::class, 'changeQuantity'])->name('orders.change');

Route::middleware('auth')->group(function () {
    //страница где адрес
    Route::get('/purchase', function () {
        return view('purchase.purchase');
    })->name('purchase');

    //заглущка со стороны сайта банка
    Route::get('/purchase-bank', function (Illuminate\Http\Request $request) {
        return view('purchase.purchase-bank', ['address' => $request['address']]);
    })->name('purchase.bank');

    //эндпоинт для сохранения
    Route::post('/purchase', [OrderController::class, 'purchase'])->name('purchase.server');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //auth
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/review-create', [ReviewController::class, 'store'])->name('review.create');
    Route::delete('/review-destroy/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');

    Route::get('/product-create', [ProductController::class, 'showCreate'])->name('products.create');
    Route::post('/product-create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/product-edit/{id}', [ProductController::class, 'showEdit'])->name('products.edit');
    Route::post('/product-edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::delete('/product-delete/{id}', [ProductController::class, 'delete'])->name('products.delete');

    Route::get('/reports/sales', [ReportController::class, 'report'])->name('report');
});

require __DIR__ . '/auth.php';
