<?php

use Illuminate\Support\Facades\Mail;
use App\Mail\Test;

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

Route::get('/', function () {
    return view('index');
});

//学習記録反映
Route::get('/','StudyController@index');

Auth::routes();
Auth::routes();

Route::get('/home', 'StudyController@index')->name('home');

Route::get('/test', function () {
    Mail::to('test@example.com')->send(new Test);
    return 'メール送信しました！';
});