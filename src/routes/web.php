<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\MyRegisterController;
use App\Http\Controllers\MyContactController;
use Illuminate\Support\Facades\Route;

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
Route::get('/auth/register', [MyRegisterController::class, 'index'])->name('register')->middleware('auth');
Route::post('/auth/register', [MyRegisterController::class, 'register']);

// ログインページ
Route::get('/auth/login', [MyRegisterController::class, 'show'])->name('login');
Route::post('auth/login', [MyRegisterController::class, 'login']);

//管理者ページ表示、ミドルウェア設定
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth');

//エクスポート
Route::get('/admin/contacts/export', [AdminController::class, 'export'])->name('admin.contacts.export');

//お問い合わせページの表示
Route::get('/', [MyContactController::class, 'index'])->name('index');

//確認画面の表示 //thanksページの表示
Route::get('/confirm', [MyContactController::class, 'confirm'])->name('confirm');
Route::post('/confirm', [MyContactController::class, 'confirm']);

//thanksページの表示
Route::get('/thanks', [MyContactController::class, 'show']);
Route::post('/thanks', [MyContactController::class, 'store'])->name('thanks');




