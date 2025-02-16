<?php

use App\Http\Controllers\GeneralUser\ArtistUserController;
use App\Http\Controllers\GeneralUser\Auth\RegisteredUserController;
use App\Http\Controllers\GeneralUser\Auth\AuthenticatedSessionController;
use App\Http\Controllers\GeneralUser\FavoriteController;
use App\Http\Controllers\GeneralUser\GeneralUserController;
use App\Http\Controllers\GeneralUser\MessageController;
use App\Http\Controllers\GeneralUser\RoomController;
use App\Http\Controllers\GeneralUser\TopicCommentController;
use App\Http\Controllers\GeneralUser\TopicController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('guest:general,artist')->group(function () {
  Route::get('register', [RegisteredUserController::class, 'create'])->name('register'); // General会員登録画面
  Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store'); // General登録処理
  Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login'); // Generalログインフォーム表示
  Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store'); // Generalログイン処理
});

Route::middleware('auth:general')->group(function () {
  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout'); // Generalログアウト処理　
  Route::resource('artist-users', ArtistUserController::class)->only('index', 'show');
  Route::resource('general-users', GeneralUserController::class)->only('show', 'edit', 'update');
  Route::resource('topics', TopicController::class)->only('index', 'show');
  Route::resource('topic-comments', TopicCommentController::class)->only('store', 'destroy');
  Route::resource('favorites', FavoriteController::class)->only('index', 'store', 'destroy');
  Route::resource('rooms', RoomController::class)->only('store', 'index', 'show');
  Route::resource('messages', MessageController::class)->only('store');
});

Route::middleware(['auth:general'])->group(function () {
  Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
  })->name('dashboard');
});
