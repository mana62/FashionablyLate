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


//新規登録ページ、ミドルウェア設定
Route::get('/auth/register', [MyRegisterController::class, 'index'])->name('auth.register')->middleware('auth');
Route::post('/auth/register', [MyRegisterController::class, 'register']);

//ログインページ
Route::get('/auth/login', [MyRegisterController::class, 'show'])->name('auth.login');
Route::post('auth/login', [MyRegisterController::class, 'login']);

//管理者ページ表示、ミドルウェア設定
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth');

//検索機能
Route::get('/admin/find', [AdminController::class, 'find'])->name('find');
Route::post('/admin', [AdminController::class, 'search'])->name('admin.search');

//エクスポート
Route::get('/admin/contacts/export', [AdminController::class, 'export'])->name('admin.contacts.export');

//モーダルウィンドウの削除
Route::delete('/admin/contacts/{id}', [AdminController::class, 'destroy'])->name('admin.contacts.delete');

//お問い合わせページの表示
Route::get('/', [MyContactController::class, 'index'])->name('index');

//確認画面の表示（GET）
Route::get('/confirm', [MyContactController::class, 'showConfirm'])->name('confirm.show');

//確認画面の表示（POST - フォームから送信されたデータの確認）
Route::post('/confirm', [MyContactController::class, 'confirm'])->name('confirm');

//データの保存
Route::post('/store', [MyContactController::class, 'store'])->name('store');

//thanksページの表示
Route::get('/thanks', [MyContactController::class, 'show'])->name('thanks');