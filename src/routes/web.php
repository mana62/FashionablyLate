<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\MyRegisterController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

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


// 新規登録ページ、ミドルウェア設定
//Route::middleware('auth')->group(function () {
    Route::get('/auth/register', [MyRegisterController::class, 'index'])->name('register');//});
Route::post('/auth/register', [MyRegisterController::class, 'register']);

// ログインページ
Route::get('/auth/login', function(){ return view('/auth/login'); })->name('login');

//Adminページ表示
Route::get('/admin', [AdminController::class, 'index']);



