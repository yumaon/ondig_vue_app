<?php

namespace App\Http\Controllers\GeneralUser\Auth;

use App\Http\Controllers\Controller;
use App\Models\GeneralUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\City;
use App\Models\Prefecture;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        $prefectures = Prefecture::all();
        return Inertia::render('General/Auth/Register', compact('prefectures'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . GeneralUser::class,
            'prefecture_id' => 'nullable|exists:prefectures,id',
            'city_name' => 'nullable|string|max:255',
            'address_detail' => 'nullable|string|max:255',
            'latitude' => 'nullable|decimal:10,7',
            'longitude' => 'nullable|decimal:10,7',
            'introduction' => 'nullable|string|max:255',
            'profile_image' => 'nullable|string|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        DB::beginTransaction();
        try {
            $cityId = null;
            if ($request->prefecture_id && $request->city_name) {
                $city = City::firstOrCreate([
                    'prefecture_id' => $request->prefecture_id,
                    'name' => $request->city_name,
                ]);
                $cityId = $city->id;
            }

            $user = GeneralUser::create([
                'name' => $request->name,
                'email' => $request->email,
                'prefecture_id' => $request->prefecture_id,
                'city_id' => $cityId,
                'address_detail' => $request->address_detail,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'introduction' => $request->introduction,
                'profile_image' => $request->profile_image,
                'is_deleted' => false,
                'password' => Hash::make($request->password),
            ]);

            DB::commit();

            event(new Registered($user));

            Auth::guard('general')->login($user);

            return redirect(route('general.dashboard', absolute: false));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', '登録に失敗しました。');
        }
    }
}
