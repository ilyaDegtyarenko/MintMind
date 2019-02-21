<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FilterInput
{
    /**
     * The attributes that should not be filtered.
     *
     * @var array
     */
    protected $except = [
        'password',
        'password_confirmation',
    ];

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param null $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        foreach ($request->input() as $key => $value) {

            if (in_array($key, $this->except, true) || !is_string($value)) continue;

            $request->merge([$key => $this->_filterInput($value)]);
        }

        return $next($request);
    }

    /**
     * Filter input.
     *
     * @param $value
     * @return string
     */
    private function _filterInput($value)
    {
        return trim(strip_tags($value));
    }
}