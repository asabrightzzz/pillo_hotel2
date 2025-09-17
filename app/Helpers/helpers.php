<?php

if (! function_exists('set_active')) {
    function set_active($paths, $output = 'active')
    {
        foreach ((array) $paths as $path) {
            if (request()->is($path)) {
                return $output;
            }
        }
        return '';
    }
}

if (! function_exists('set_open')) {
    function set_open($paths, $output = 'open')
    {
        foreach ((array) $paths as $path) {
            if (request()->is($path)) {
                return $output;
            }
        }
        return '';
    }
}
