<?php

use App\Http\Controllers\ArtistUser\ArtistUserController;
use App\Http\Controllers\ArtistUser\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ArtistUser\Auth\RegisteredUserController;
use App\Http\Controllers\ArtistUser\FavoriteController;
use App\Http\Controllers\ArtistUser\GeneralUserController;
use App\Http\Controllers\ArtistUser\ItemController;
use App\Http\Controllers\ArtistUser\LiveScheduleController;
use App\Http\Controllers\ArtistUser\MessageController;
use App\Http\Controllers\ArtistUser\ProfileController;
use App\Http\Controllers\ArtistUser\RoomController;
use App\Http\Controllers\ArtistUser\TopicCommentController;
use App\Http\Controllers\ArtistUser\TopicController;
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
  Route::resource('profiles', ProfileController::class)->only('show', 'edit', 'update');
  Route::resource('general-users', GeneralUserController::class)->only('index', 'show');
  Route::resource('items', ItemController::class);
  Route::resource('live-schedules', LiveScheduleController::class);
  Route::resource('artist-users', ArtistUserController::class);
  Route::resource('topics', TopicController::class);
  Route::resource('topic-comments', TopicCommentController::class)->only('store', 'destroy');
  Route::resource('favorites', FavoriteController::class)->only('index', 'store', 'destroy');
  Route::resource('rooms', RoomController::class)->only('store', 'index', 'show');
  Route::resource('messages', MessageController::class)->only('create');
});

// ArtistUser 用ダッシュボード（必要に応じて追加）
Route::middleware(['auth:artist'])->group(function () {
  Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
  })->name('dashboard');
});
