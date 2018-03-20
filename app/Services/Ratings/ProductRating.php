<?php

namespace App\Services\Ratings;

use App\ProductReview;

class ProductRating
{
    /**
     * Return product rating.
     *
     * @param $productId
     * @return float
     */
    public function getRating($productId)
    {
        $reviews = ProductReview::whehe('product_id', $productId);

        $amount = $reviews->sum('rating');
        $count = $reviews->count();

        return round($amount / $count, 2);
    }
}