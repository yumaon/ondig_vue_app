<?php

use App\Http\Controllers\ArtistUser\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ArtistUser\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('guest:artist,general')->group(function () {
  Route::get('register', [RegisteredUserController::class, 'create'])->name('register'); // Artist会員登録画面
  Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store'); // Artist会員登録処理
  Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login'); // Artistログインフォームを表示
  Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store'); // Artistログイン処理
});

Route::middleware('auth:artist')->group(function () {
  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout'); // Artistログアウト処理
});

// ArtistUser 用ダッシュボード（必要に応じて追加）
Route::middleware(['auth:artist'])->group(function () {
  Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
  })->name('dashboard');
});
