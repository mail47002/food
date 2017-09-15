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

/**
 * Render status.
 *
 */
if (!function_exists('status')) {
    function status($value)
    {
        $class = '';
        $title = '';

        if ($value == 0) {
            $class  = 'warning';
            $title  = 'Скрыто';
        } elseif ($value == 1) {
            $class  = 'success';
            $title  = 'Опубликовано';
        }

        return '<span class="label label-' . $class . '">' . $title . '</span>';
    }
}