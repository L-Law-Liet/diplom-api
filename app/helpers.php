<?php
if (! function_exists('getLink')) {
    function getLink($path): ?string
    {
        return ($path)
            ? asset('storage').'/'.str_replace('\\', '/', $path)
            : null;
    }
}
if (! function_exists('discount')) {
    function discount(float $discount): float
    {
        return (100 - $discount) / 100;
    }
}
