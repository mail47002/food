<?php

namespace App\Services\Rating;

use RatingInterface;

class ProductRating implements RatingInterface
{
    /**
     * Return product rating.
     *
     * @param $amount
     * @param $count
     * @return float
     */
    public function getRating($amount, $count)
    {
        return round($amount / $count, 2);
    }
}