<?php

if (!function_exists('auth')) {

    /**
     * Get the available auth instance.
     *
     * @param  string|null $guard
     * @return \Illuminate\Contracts\Auth\Factory|\Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    function auth($guard = null)
    {
        if (is_null($guard)) {
            return app(\Illuminate\Contracts\Auth\Factory::class);
        }

        return app(\Illuminate\Contracts\Auth\Factory::class)->guard($guard);
    }
}

if (!function_exists('cache')) {

    /**
     * Get/set specified cache value.
     *
     * @return \Laravel\Lumen\Application|mixed
     * @throws Exception
     */
    function cache()
    {
        $arguments = func_get_args();

        if (empty($arguments)) {
            return app('cache');
        }

        if (is_string($arguments[0])) {
            return app('cache')->get($arguments[0], $arguments[1] ?? null);
        }

        if (!is_array($arguments[0])) {
            throw new Exception('When setting a value in the cache, you must pass an array of key/value pairs.');
        }

        if (!isset($arguments[1])) {
            throw new Exception('You must specify an expiration time when setting a value in the cache.');
        }

        return app('cache')->put(key($arguments[0]), reset($arguments[0]), $arguments[1]);
    }
}

if (!function_exists('report')) {

    /**
     * Storing report.
     *
     * How to use: "report($param, ...)"
     *
     * @param mixed ...$parameters
     */
    function report(...$parameters)
    {
        if (!empty($parameters)) app('report', $parameters);
    }
}

if (!function_exists('xsrf_input')) {

    /**
     * Generate a XSRF token form input.
     *
     * @param string $encryptedToken
     * @return \Illuminate\Support\HtmlString
     */
    function xsrf_input(string $encryptedToken)
    {
        return new \Illuminate\Support\HtmlString('<input type="hidden" name="_xsrf" value="' . $encryptedToken . '">');
    }
}

if (!function_exists('now')) {

    /**
     * Create a new Carbon instance for the current time.
     *
     * @param null $timezone
     * @return \Carbon\Carbon
     */
    function now($timezone = null)
    {
        return \Carbon\Carbon::now($timezone);
    }
}