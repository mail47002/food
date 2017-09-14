<?php

/**
 * Get active class.
 *
 */
if (!function_exists('is_active')) {
    function is_active($url, $class = 'active')
    {
        if (request()->is($url)) {
            return $class;
        }
    }
}
