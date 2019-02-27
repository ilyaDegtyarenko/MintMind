<?php

namespace App\Http\Middleware;

use App\Foundation\Http\Middleware\VerifyCsrfToken as FoundationClass;

class VerifyCsrfToken extends FoundationClass
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [];
}