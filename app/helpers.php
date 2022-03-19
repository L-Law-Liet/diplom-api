<?php
if (! function_exists('getLink')) {
    function getLink($path): ?string
    {
        return ($path)
            ? asset('storage').'/'.str_replace('\\', '/', $path)
            : null;
    }
}
