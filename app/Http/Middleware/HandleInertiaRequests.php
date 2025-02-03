<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Models\ArtistUser;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $user = $request->user();
        $role = null;
        $name = null;

        if ($user) {
            if (Auth::guard('general')->check()) {
                $role = 'generalUser';
                $name = $user->name;
            } elseif (Auth::guard('artist')->check()) {
                $role = 'artistUser';
                $artist = ArtistUser::find($user->id);
                $name = $artist->artist_name;
            }
        }

        return [
            ...parent::share($request),
            'auth' => [
                'user' => $user ? [
                    'id' => $user->id,
                    'name' => $name,
                    'email' => $user->email,
                    'role' => $role,
                ] : null,
            ],
        ];
    }
}
