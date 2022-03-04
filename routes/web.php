<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicStoreController;
use App\Http\Controllers\SaleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PublicStoreController::class, 'index'])->name('store');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->middleware(['auth', 'verified', 'inversor'])->name('dashboard');

Route::resource('products', ProductController::class)->middleware(['auth', 'verified', 'inversor']);
Route::resource('sales', SaleController::class)->middleware(['auth', 'verified', 'inversor']);

require __DIR__.'/auth.php';
