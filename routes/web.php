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
])->group(function () {
    Route::get('/', [PagesController::class, 'home'])->name('home');
});
// Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('about', [PagesController::class, 'about'])->name('about');
Route::get('contact', [PagesController::class, 'contact'])->name('contact');
Route::get('shop', [PagesController::class, 'shop'])->name('shop');
Route::get('fabeyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTIzNDU2Nzg5LCJuYW1lIjoiSm9zZXBoIn0.OpOSSw7e485LOP5PrzScxHb7SR6sAOM{id}RckfFwi4rp7ou8QDrviQlx67fJ7tKOPpxdata&prd', [PagesController::class, 'fabric'])->name('fabric');

Route::get('clotheyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTIzNDU2Nzg5LCJuYW1lIjoiSm9zZXBoIn0.OpOSSw7e485LOP5PrzScxHb7SR6sAOM{id}RckfFwi4rp7ou8QDrviQlx67fJ7tKOPpxdata&prd', [PagesController::class, 'cloth'])->name('cloth');

Route::post('send', [MessageController::class, 'send'])->name('send');
// 
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
Route::permanentRedirect('/login', '/');
Route::permanentRedirect('/dashboard', '/');
Route::permanentRedirect('/register', '/');