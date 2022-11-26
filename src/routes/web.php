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

Route::get('news', [HomeController::class, 'news'])->name('news');
Route::get('news/{id}', [HomeController::class, 'news_detail'])->name('news_detail');

// Route::middleware(['auth:sanctum', 'verified'])->post('/', [HomeController::class, 'post']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

//管理画面
Route::get('admin', [HomeController::class, 'admin'])->name('admin');

Route::post('admin/user/add', [HomeController::class, 'admin_user_add'])->name('user_add');

Route::get('admin/content/edit{id}', [HomeController::class, 'admin_content_edit'])->name('content_edit');
Route::post('admin/content/edit{id}', [HomeController::class, 'admin_content_update'])->name('content_update');
Route::get('admin/content/delete{id}', [HomeController::class, 'admin_content_delete'])->name('content_delete');
Route::post('admin/content/add', [HomeController::class, 'admin_content_add'])->name('content_add');
Route::get('admin/language/edit{id}', [HomeController::class, 'admin_language_edit'])->name('language_edit');
Route::post('admin/language/edit{id}', [HomeController::class, 'admin_language_update'])->name('language_update');
Route::get('admin/language/delete{id}', [HomeController::class, 'admin_language_delete'])->name('language_delete');
Route::post('admin/language/add', [HomeController::class, 'admin_language_add'])->name('language_add');


// 一覧
// Route::get('/login', [HomeController::class, 'index'])->name('login');

// 削除
// Route::post('/destroy{userId}', [HomeController::class, 'destroy'])->name('user.destroy');