<?php

use App\Http\Controllers\ArtistUser\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ArtistUser\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Artist会員登録画面
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
// Artist会員登録処理
Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store');
// Artistログインフォームを表示
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
// Artistログイン処理
Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
// Artistログアウト処理
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// ArtistUser 用ダッシュボード（必要に応じて追加）
Route::middleware(['auth:artist', 'verified'])->group(function () {
  Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
  })->name('dashboard');

  // その他の保護されたルートをここに追加
});
