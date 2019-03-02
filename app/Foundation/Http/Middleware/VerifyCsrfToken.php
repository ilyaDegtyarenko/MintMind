<?php

namespace App\Foundation\Http\Middleware;

use App\Http\Controllers\AuthController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VerifyCsrfToken
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [];

    /**
     * User personal token.
     *
     * @var null
     */
    private $userPersonalToken = null;

    /**
     * VerifyCsrfToken constructor.
     */
    public function __construct()
    {
        $this->userPersonalToken = Auth::user()->personal_token;
    }

    /**
     * Handling method.
     *
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory|mixed
     */
    final public function handle(Request $request, Closure $next)
    {
        if ($this->isWriting($request) && !$this->isExceptedUri($request)) {
            $encryptedAppKey = $request->header('x-csrf-token');
            $encryptedUserToken = $request->input('xsrf_token');
            
            if (!$this->userPersonalToken
                || !$encryptedAppKey
                || !$encryptedUserToken
                || !$this->tokenComparison($encryptedAppKey, $encryptedUserToken)) {

                $this->regenerateUserPersonalTokenAndLogout();

                return response()->json('CSRF token not found or does\'t match.', 403);
            }
        }

        return $next($request);
    }

    /**
     * Determine whether user token matches passed token.
     *
     * @param $encryptedAppKey
     * @param $encryptedUserToken
     * @return bool
     */
    private function tokenComparison($encryptedAppKey, $encryptedUserToken): bool
    {
        return (Hash::check(env('APP_KEY'), $encryptedAppKey) && Hash::check($this->userPersonalToken, $encryptedUserToken));
    }

    /**
     * Regenerate a user's personal token and log out.
     *
     * @return bool
     */
    private function regenerateUserPersonalTokenAndLogout(): bool
    {
        $user = Auth::user();

        $user->update(['personal_token' => generate_hash()]);

        AuthController::logout();

        return true;
    }

    /**
     * Determine if the HTTP request uses a "write" verb.
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    private function isWriting(Request $request): bool
    {
        return !in_array($request->method(), ['HEAD', 'GET', 'OPTIONS'], true);
    }

    /**
     * Determine if the request has a URI that should pass through CSRF verification.
     *
     * @param Request $request
     * @return bool
     */
    private function isExceptedUri(Request $request): bool
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->fullUrlIs($except) || $request->is($except)) {
                return true;
            }
        }

        return false;
    }
}