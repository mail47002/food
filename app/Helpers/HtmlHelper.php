<?php

namespace App\Helpers;


class HtmlHelper extends Helper
{
    public function isActive($url, $class = 'active')
    {
        return !request()->is($url) ?: $class;
    }

    public function getImageUrl($url, $image, $user)
    {
        return asset('uploads/' . md5($user->id . $user->email) . '/' . $url . '/' . $image);
    }

    public function getThumbnailUrl($url, $image, $user)
    {
        return asset('uploads/' . md5($user->id . $user->email) . '/' . $url . '/thumbnails/' . $image);
    }
}