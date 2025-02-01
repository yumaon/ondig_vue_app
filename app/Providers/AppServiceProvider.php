<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\GeneralUser;
use App\Models\ArtistUser;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);

        Auth::provider('eloquent', function ($app, array $config) {
            return new class($app['hash'], $config['model']) extends \Illuminate\Auth\EloquentUserProvider {
                public function __construct($hasher, $model)
                {
                    parent::__construct($hasher, $model);
                }

                public function retrieveById($identifier)
                {
                    $model = parent::retrieveById($identifier);
                    if ($model && session()->isStarted()) {
                        try {
                            $sessionId = Session::getId();
                            if ($sessionId) {
                                $userType = $model instanceof ArtistUser ? 'artist_user' : 'general_user';
                                DB::table('sessions')
                                    ->where('id', $sessionId)
                                    ->update(['user_type' => $userType]);
                            }
                        } catch (\Exception $e) {
                            \Log::error('Session update failed: ' . $e->getMessage());
                        }
                    }
                    return $model;
                }

                public function retrieveByCredentials(array $credentials)
                {
                    $model = parent::retrieveByCredentials($credentials);
                    if ($model && session()->isStarted()) {
                        try {
                            $sessionId = Session::getId();
                            if ($sessionId) {
                                $userType = $model instanceof ArtistUser ? 'artist_user' : 'general_user';
                                DB::table('sessions')
                                    ->where('id', $sessionId)
                                    ->update(['user_type' => $userType]);
                            }
                        } catch (\Exception $e) {
                            \Log::error('Session update failed: ' . $e->getMessage());
                        }
                    }
                    return $model;
                }
            };
        });
    }
}
