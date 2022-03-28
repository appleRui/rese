<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;

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


Route::middleware('auth')->group(function () {

    // Route::get('/shop/new', [ShopController::class, 'new'])->name('shop.new');
    // Route::post('/shop/create', [ShopController::class, 'create'])->name('shop.create');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::get('/reserves', [ReservationController::class, 'index'])->name('reserve.index');
    Route::post('/reserve/{id}/new', [ReservationController::class, 'new'])->name('reserve.new');
    Route::get('/reserve/confirm', [ReservationController::class, 'confirm'])->name('reserve.confirm');
    Route::post('/reserve/store', [ReservationController::class, 'store'])->name('reserve.store');
    Route::get('/reserve/{id}/thanks', [ReservationController::class, 'thanks'])->name('reserve.thanks');
    Route::delete('/reserve/{id}/', [ReservationController::class, 'destroy'])->name('reserve.destroy');
    
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
    Route::post('/shop/{id}/like', [ShopController::class, 'like'])->name('shop.like');
    Route::post('/shop/{id}/unlike', [ShopController::class, 'unlike'])->name('shop.unlike');
});

Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/search', [ShopController::class, 'search'])->name('shop.search');
Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.show');

require __DIR__ . '/auth.php';
