<?php

namespace App\Helpers;


class PageHelper
{
    public static function status($value)
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