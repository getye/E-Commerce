<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/supplier/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('supplier.dashboard');

Route::get('/view/product', function () {
    return Inertia::render('Products');
})->middleware(['auth', 'verified'])->name('view.product');

Route::get('/add/product', function () {
    return Inertia::render('AddProduct');
})->middleware(['auth', 'verified'])->name('add.product');

Route::get('/admin/dashboard', function () {
    return Inertia::render('AdminDashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::get('/admin/users', function () {
    return Inertia::render('Users');
})->middleware(['auth', 'verified'])->name('admin.users');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');



Route::get('/products/view', [ProductController::class, 'view'])->name('products.view');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

require __DIR__.'/auth.php';
