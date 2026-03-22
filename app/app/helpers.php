<?php

if (!function_exists('option')) {
    function option(string $key, ?string $default = null): ?string
    {
        return \App\Models\Option::get($key, $default);
    }
}
