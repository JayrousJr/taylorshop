<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Filament\LogoutController;

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

Route::middleware([
    'Visitor',
])->group(function () {
    Route::get('/', [PagesController::class, 'home'])->name('home');
});
Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('about', [PagesController::class, 'about'])->name('about');
Route::get('contact', [PagesController::class, 'contact'])->name('contact');
Route::get('shop', [PagesController::class, 'shop'])->name('shop');
Route::get('product_9OeUu9fHbc9Of4SM3H6rr{product}u8QDrviQlx67fJ7tKOPpxdata&prd', [PagesController::class, 'product'])->name('product');
Route::post('send', [MessageController::class, 'send'])->name('send');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/auth/logout', [LogoutController::class, 'logout'])->name('filament.admin.auth.logout');
