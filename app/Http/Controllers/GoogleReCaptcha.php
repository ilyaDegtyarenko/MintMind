<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleReCaptcha extends Controller
{
    /**
     * Verify captcha.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function verify(Request $request)
    {
        $token = $request->input('token');

        if (!$token || !is_string($token)) {
            report('Token is invalid in method: ' . __METHOD__, "Token: $token");

            return response()->json(['error' => trans('messages.errors.unprocessable_query')], 423);
        }

        $googleResponse = json_decode($this->makeQueryToGoogleReCaptcha($token));

        if (!$googleResponse || !$googleResponse->success) {
            report('Incorrect response from google reCaptcha in method: ' . __METHOD__, 'Response: ' . json_encode($googleResponse, JSON_UNESCAPED_UNICODE));

            return response()->json(['error' => trans('messages.errors.unprocessable_query')], 423);
        }

        if ($googleResponse->score < 0.5) {
            return response()->json(['error' => trans('messages.errors.forbidden')], 403);
        }

        return response()->json(null, 204);
    }

    /**
     * Make query to google re-captcha server.
     *
     * @param string $token
     * @return false|string
     */
    private function makeQueryToGoogleReCaptcha(string $token)
    {
        $secret = env('GOOGLE_RECAPTCHA_SECRET_KEY');

        return file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$token");
    }

}