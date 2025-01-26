<?php

namespace App\Http\Controllers\ArtistUser\Auth;

use App\Http\Controllers\Controller;
use App\Models\ArtistUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ArtistUser\Auth\RegisterRequest;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    /**
     * 登録フォームを表示
     */
    public function create(): Response
    {
        return Inertia::render('Artist/Auth/Register', [
            'status' => session('status'),
        ]);
    }

    /**
     * 登録処理
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $artist = ArtistUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('artist')->login($artist);

        return redirect()->route('artist.dashboard')->with('success', 'Account created successfully.');
    }
}
