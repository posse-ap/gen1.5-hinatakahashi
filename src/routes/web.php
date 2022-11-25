<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/error', function () {
    return view('error');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/', [HomeController::class, 'index']);

Route::get('logout', [HomeController::class, 'logout'])->name('logout');

Route::middleware(['auth:sanctum', 'verified'])->post('/', [HomeController::class, 'post']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// 一覧
// Route::get('/login', [HomeController::class, 'index'])->name('login');

// 削除
// Route::post('/destroy{userId}', [HomeController::class, 'destroy'])->name('user.destroy');