<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Factory as Auth;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @param null $guard
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory|mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->guest()) { /* Unauthorized. */
            return response()->json(['error' => trans('messages.errors.authorization_required')], 401);
        }

        $authToken = $request->header('x-auth-token');

        if (!$authToken || !$this->tokenComparison($authToken)) { /* Auth token not found or does't match. */
            AuthController::logout();

            return response()->json(['error' => trans('messages.errors.authorization_required')], 401);
        }

        try {
            JWT::decode($authToken, env('JWT_SECRET'), [env('JWT_ALGORITHM')]);
        } catch (ExpiredException $e) { /* Provided auth token is expired. */
            AuthController::logout();

            return response()->json(['error' => trans('messages.errors.authorization_required')], 419);
        } catch (\Exception $e) { /* An error while decoding token. */
            AuthController::logout();
            report('An error while decoding token.', $e->getMessage());

            return response()->json(['error' => trans('messages.errors.authorization_required')], 401);
        }

        return $next($request);
    }

    /**
     * Determine whether user token matches passed token.
     *
     * @param string $token
     * @return bool
     */
    private function tokenComparison(string $token): bool
    {
        $userAuthToken = app('cache')->get('users:' . $this->auth->user()->id . ':auth_token');
        if (!$userAuthToken) return false;

        return hash_equals($userAuthToken, $token);
    }
}
