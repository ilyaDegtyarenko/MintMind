<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\Login;
use App\Http\Requests\Registration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;

class AuthController extends Controller
{
    /**
     * User registration.
     *
     * @param Registration $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Registration $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'personal_token' => generate_hash()
        ]);

        return $this->respondWithAuthToken($user, (int)$request->input('remember'), 201);
    }

    /**
     * Authenticate user and return the token if the provided credentials are correct.
     *
     * @param Login $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function login(Login $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return response()->json([
                'error' => trans('messages.errors.unknown_email')
            ], 422);
        }

        if (!Hash::check($request->input('password'), $user->password)) {
            return response()->json([
                'error' => trans('messages.errors.wrong_password')
            ], 422);
        } else {
            return $this->respondWithAuthToken($user, (int)$request->input('remember'), 200);
        }
    }

    /**
     * Flush user tokens.
     *
     * @return bool
     */
    public static function logout()
    {
        app('cache')->forget('users:' . Auth::user()->id . ':auth_token');

        return response()->json(null, 204);
    }

    /**
     * Make auth token, save it to cache and return json response with it.
     *
     * @param User $user
     * @param int $remember
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    private function respondWithAuthToken(User $user, int $remember, int $code)
    {
        $expirationTime = (1440 * ((bool)$remember ? 30 : 1)); /*Day or month.*/
        $payload = [
            'issuer' => 'lumen-jwt',
            'user_id' => $user->id,
            'time_of_issue' => time(),
            'expiration_time' => time() + $expirationTime
        ];
        $authToken = JWT::encode($payload, env('JWT_SECRET'));

        app('cache')->set('users:' . $user->id . ':auth_token', $authToken, $expirationTime);

        return response()->json([
            'auth_token' => $authToken,
            'xsrf_token' => Hash::make($user->personal_token)
        ], $code);
    }
}