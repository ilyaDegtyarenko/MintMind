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

if (!function_exists('generate_hash')) {

    /**
     * Generate random hash.
     *
     * @return string
     */
    function generate_hash(): string
    {
        return (string)hash('sha256', sha1(md5(rand() . uniqid())));
    }
}

if (!function_exists('csrf_token')) {

    /**
     * Get CSRF token.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    function csrf_token()
    {
        if (!isset($_ENV['APP_KEY'])) {
            throw new RuntimeException('Application key not set.');
        }

        return encrypt($_ENV['APP_KEY']);
    }
}

if (!function_exists('locale')) {

    /**
     * [Set locale] get current locale.
     *
     * @param string|null $locale
     * @return string
     */
    function locale(string $locale = null)
    {
        $translator = app('translator');

        if ($locale) {
            $translator->setLocale($locale);
        }

        return (string)$translator->getLocale();
    }
}

if (!function_exists('mix')) {

    /**
     * Get the path to a versioned Mix file.
     * 
     * @param string $path
     * @param string $manifestDirectory
     * @return string
     * @throws Exception
     */
    function mix(string $path, string $manifestDirectory = '')
    {
        static $manifest;

        $rootPath = $_SERVER['DOCUMENT_ROOT'];
        $publicPath = $rootPath;

        if ($manifestDirectory && !starts_with($manifestDirectory, '/')) {
            $manifestDirectory = "/{$manifestDirectory}";
        }

        if (!$manifest) {
            if (!file_exists($manifestPath = ($rootPath . $manifestDirectory . '/mix-manifest.json'))) {
                throw new Exception('The Mix manifest does not exist.');
            }

            $manifest = json_decode(file_get_contents($manifestPath), true);
        }

        if (!starts_with($path, '/')) {
            $path = "/{$path}";
        }

        if (!array_key_exists($path, $manifest)) {
            throw new Exception("Unable to locate Mix file: {$path}. Please check your " . 'webpack.mix.js output paths and try again.');
        }

        return file_exists($publicPath . ($manifestDirectory . '/hot')) ? "http://localhost:8080{$manifest[$path]}" : $manifestDirectory . $manifest[$path];
    }
}
