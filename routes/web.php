<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApiController;

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

Route::get('/', [TestController::class, 'index']);

Route::get('/error', function(){
    return view('error');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/home', [HomeController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->post('/home', [HomeController::class, 'post']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/api/columntime', [ApiController::class, 'columntime']);

Route::middleware(['auth:sanctum', 'verified'])->get('/api/pielanguage', [ApiController::class, 'pielanguage']);

Route::middleware(['auth:sanctum', 'verified'])->get('/api/piecontent', [ApiController::class, 'piecontent']);

