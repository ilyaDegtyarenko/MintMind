<?php

namespace App\Providers;

use App\Http\Repositories\UserRepository;
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
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function (Request $request) {
            if (!$authToken = $request->header('x-auth-token')) return null;

            try {
                $token = decrypt($authToken);

                $credentials = JWT::decode($token, env('JWT_SECRET'), [env('JWT_ALGORITHM')]);

                if (empty($userId = $credentials->user_id)) return null;

                $request->merge(['credentials' => $credentials]);

                return UserRepository::findById($userId);
            } catch (ExpiredException $exception) {
                return null;
            } catch (\Exception $exception) {
                return null;
            }
        });
    }
}
