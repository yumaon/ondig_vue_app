<?php

namespace App\Http\Controllers\ArtistUser\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use App\Http\Requests\ArtistUser\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class AuthenticatedSessionController extends Controller
{
    /**
     * ログインフォームを表示
     */
    public function create(): Response
    {
        return Inertia::render('Artist/Auth/Login', [
            'canResetPassword' => Route::has('artist.password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * ログイン処理
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // セッションにuser_typeを設定
        DB::table('sessions')
            ->where('id', session()->getId())
            ->update(['user_type' => 'artist_user']);

        return redirect()->intended(route('artist.dashboard'));
    }

    /**
     * ログアウト処理
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('artist')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
