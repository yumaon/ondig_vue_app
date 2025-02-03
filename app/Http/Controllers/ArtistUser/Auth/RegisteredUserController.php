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
use App\Models\Prefecture;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use App\Models\City;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * 登録フォームを表示
     */
    public function create(): Response
    {
        $prefectures = Prefecture::all();
        $genres = Genre::all();
        return Inertia::render('Artist/Auth/Register', compact('prefectures', 'genres'));
    }

    /**
     * 登録処理
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $city = City::firstOrCreate([
                'prefecture_id' => $request->prefecture_id,
                'name' => $request->city_name,
            ]);

            $artist = ArtistUser::create([
                'genre_id' => $validated['genre_id'],
                'prefecture_id' => $validated['prefecture_id'],
                'city_id' => $city->id,
                'address_detail' => $validated['address_detail'],
                'latitude' => $validated['latitude'],
                'longitude' => $validated['longitude'],
                'rep_name' => $validated['rep_name'],
                'artist_name' => $validated['artist_name'],
                'introduction' => $validated['introduction'],
                // 'youtube_url' => $validated['youtube_url'],
                'profile_image' => $validated['profile_image'],
                'background_image' => $validated['background_image'],
                'is_deleted' => false,
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            DB::commit();

            event(new Registered($artist));

            Auth::guard('artist')->login($artist);

            return redirect(route('artist.dashboard', absolute: false));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', '登録に失敗しました。');
        }
    }
}
