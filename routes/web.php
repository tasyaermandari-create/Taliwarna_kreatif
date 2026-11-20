
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\KategoriController;

// HALAMAN PUBLIK
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/produk', [KatalogController::class, 'index'])
    ->name('produk.index');

Route::get('/produk/{id}', [KatalogController::class, 'show'])
    ->name('produk.detail');

// HALAMAN ADMIN
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('produk', ProdukController::class);

    Route::resource('kategori', KategoriController::class);
});
