<?php

namespace App\Helpers;


class HtmlHelper extends Helper
{
    /**
     * Return active class.
     *
     * @param $url
     * @param string $class
     * @return string
     */
    public function isActive($url, $class = 'active')
    {
        return !request()->is($url) ?: $class;
    }

    /**
     * Return product image url.
     *
     * @param $product
     * @return string
     */
    public function getProductImageUrl($product)
    {
        return $this->makeImageUrl('products', $product);
    }

    /**
     * Return product thumbnail url.
     *
     * @param $product
     * @return string
     */
    public function getProductThumbnailUrl($product)
    {
        return $this->makeThumbnailUrl('products', $product);
    }

    /**
     * Return advert image url.
     *
     * @param $advert
     * @return string
     */
    public function getAdvertImageUrl($advert)
    {
        return $this->makeImageUrl('adverts', $advert);
    }

    /**
     * Return advert thumbnail url.
     *
     * @param $advert
     * @return string
     */
    public function getAdvertThumbnailUrl($advert)
    {
        return $this->makeThumbnailUrl('adverts', $advert);
    }

    /**
     * Return uploaded user directory hash.
     *
     * @param $user
     * @return string
     */
    public function getUserDirHash($user)
    {
        return md5($user->id . $user->email);
    }

    /**
     * Return uploaded image url.
     *
     * @param $dir
     * @param $entity
     * @return string
     */
    protected function makeImageUrl($dir, $entity)
    {
        return asset('uploads/' . $this->getUserDirHash($entity->user) . '/' . $dir . '/' . $entity->image);
    }

    /**
     * Return uploaded thumbnail url.
     *
     * @param $dir
     * @param $entity
     * @return string
     */
    protected function makeThumbnailUrl($dir, $entity)
    {
        return asset('uploads/' . $this->getUserDirHash($entity->user) . '/' . $dir . '/thumbnails/' . $entity->image);
    }
}