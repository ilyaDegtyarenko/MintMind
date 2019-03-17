<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['auth']->viaRequest('api', function (Request $request) {
            if (!$authToken = $request->header('x-auth-token')) {
                return null;
            }

            try {
                $credentials = JWT::decode($authToken, env('JWT_SECRET'), [env('JWT_ALGORITHM')]);

                if (empty($userId = $credentials->user_id)) return null;

                $request->merge(['credentials' => $credentials]);

                return User::find($userId);
            } catch (ExpiredException $exception) {
                return null;
            } catch (\Exception $exception) {
                return null;
            }
        });
    }
}
