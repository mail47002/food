<?php

namespace App\Helpers;

use App\Advert;
use App\Order;
use Geo;

class Helper
{
    private $advertTypes = [
        'by_date'   => 'Страва у меню',
        'in_stock'  => 'Готова страва',
        'pre_order' => 'Страва під замовлення'
    ];

    private $advertTimes = [
        'breakfast' => 'сніданок',
        'dinner'    => 'обід',
        'supper'    => 'вечеря'
    ];

    private $advertStickers = [
        'discount','new', 'heart'
    ];

    /**
     * Return active class.
     *
     * @param        $url
     * @param string $class
     * @param string $default
     * @return string
     */
    public function isActive($url, $class = 'active', $default = '')
    {
        if (is_array($url)) {
            foreach ($url as $item) {
                if (request()->is($item)) {
                    return $class;
                }
            }
        }

        return request()->is($url) ? $class : $default;
    }

    /**
     * Return user address.
     *
     * @param $user
     * @return string
     */
    public function getUserAddress($user)
    {
        return 'вул. ' . $user->profile->street . ' ' . $user->profile->build . ', ' . $user->profile->city;
    }

    /**
     * Return phones at string.
     *
     * @param $phone
     * @return string
     */
    public function getUserPhone($phone)
    {
        return join(', ', $phone);
    }

    /**
     * @param null $type
     * @return bool
     */
    public function isAdvertByDate($type = null)
    {
        if ($type) {
            return $type === Advert::BY_DATE;
        }

        return (!request()->has('type') || (request()->has('type') && request()->get('type') == 'by_date'));
    }

    /**
     * @param null $type
     * @return bool
     */
    public function isAdvertInStock($type = null)
    {
        if ($type) {
            return $type === Advert::IN_STOCK;
        }

        return (request()->has('type') && request()->get('type') == 'in_stock');
    }

    /**
     * @param null $type
     * @return bool
     */
    public function isAdvertPreOrder($type = null)
    {
        if ($type) {
            return $type === Advert::PRE_ORDER;
        }

        return (request()->has('type') && request()->get('type') == 'pre_order');
    }

    /**
     * @param $type
     * @return bool
     */
    public function isNotificationOrderCreated($type)
    {
        return $type === 'App\Notifications\OrderCreated';
    }

    /**
     * @param $type
     * @return bool
     */
    public function isNotificationOrderConfirmed($type)
    {
        return $type === 'App\Notifications\OrderConfirmed';
    }

    /**
     * @param $type
     * @return bool
     */
    public function isNotificationOrderCanceled($type)
    {
        return $type === 'App\Notifications\OrderCanceled';
    }

    /**
     * Return advert times.
     *
     * @return array
     */
    public function getAdvertTimes()
    {
        return array_keys($this->advertTimes);
    }

    /**
     * Return humanized advert type.
     *
     * @param $type
     * @param null $default
     * @return null
     */
    public function getHumanAdvertType($type, $default = null)
    {
        return isset($this->advertTypes[$type]) ? $this->advertTypes[$type] : $default;
    }

    /**
     * Return humanized advert time.
     *
     * @param $time
     * @param null $default
     * @return mixed|null
     */
    public function getHumanAdvertTime($time, $default = null)
    {
        return isset($this->advertTimes[$time]) ? $this->advertTimes[$time] : $default;
    }

    /**
     * Return advert stickers.
     *
     * @return array
     */
    public function getAdvertStickers()
    {
        return $this->advertStickers;
    }

    /**
     * @param $status
     * @return bool
     */
    public function isOrderCreated($status)
    {
        return $status === Order::CREATED;
    }

    /**
     * @param $status
     * @return bool
     */
    public function isOrderConfirmed($status)
    {
        return $status === Order::CONFIRMED;
    }

    /**
     * @param $status
     * @return bool
     */
    public function isOrderCanceled($status)
    {
        return $status === Order::CANCELED;
    }

    public function isProductReviews()
    {
        return (!request()->has('type'));
    }

    public function isClientReviews()
    {
        return (request()->has('type') && request()->get('type') == 'clients');
    }

    /**
     * Return html string.
     *
     * @param array $attributes
     * @return string
     */
    private function attributes($attributes = [])
    {
        $html = [];

        foreach ($attributes as $key => $value) {
            $element = $this->attributeElement($key, $value);

            if (! is_null($element)) {
                $html[] = $element;
            }
        }

        return count($html) > 0 ? ' ' . implode(' ', $html) : '';
    }

    /**
     * Return attributes.
     *
     * @param $key
     * @param $value
     * @return string
     */
    private function attributeElement($key, $value)
    {
        if (is_numeric($key)) {
            return $value;
        }

        if (is_bool($value) && $key != 'value') {
            return $value ? $key : '';
        }

        if (! is_null($value)) {
            return $key . '="' . e($value) . '"';
        }
    }
}