<?php

if (!function_exists('report')) {

    /**
     * Save report.
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

if (!function_exists('generateHash')) {

    /**
     * Generate random hash.
     *
     * @return string
     */
    function generateHash(): string
    {
        return (string)hash('sha256', sha1(md5(rand() . uniqid())));
    }
}