<?php

namespace App\Http\Controllers\Frontend;

use App\Advert;
use App\Category;
use App\ProductReview;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Helper;

class AdvertsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $country = $request->input('country', 0);
        $location = $request->input('location', [
            auth()->check()
                ? auth()->user()->profile->lat
                : config('location.default.lat'),
            auth()->check()
                ? auth()->user()->profile->lng
                : config('location.default.lng')
        ]);
        $address = $request->input('address',
            auth()->check()
                ? auth()->user()->profile->address
                : config('location.default.address')
        );
        $distance = $request->input('distance', 50);
        $categoryIds = $request->cid
            ? explode(',', $request->cid)
            : Category::all()->pluck('id')->toArray();
        $type = $request->input('type', Advert::BY_DATE);
        $priceFrom = $request->price_from ?? 0;
        $priceTo = $request->price_to ?? 99999.99;
        $date = $request->date
            ? Carbon::parse($request->date)->toDateTimeString()
            : null;
        $time = $request->time
            ? explode(',', $request->time)
            : Helper::getAdvertTimes();

        $adverts = Advert::with(['product', 'images'])
            ->select('adverts.*')
            ->leftJoin('product_to_category', 'adverts.product_id', '=', 'product_to_category.product_id')
            ->whereIn('product_to_category.category_id', $categoryIds)
            ->where('name', 'like', '%' . $request->search . '%')
            ->where('type', $type)
            ->whereBetween('price', [$priceFrom, $priceTo]);

        if (!$country) {
            $adverts = $adverts->leftJoin('user_profiles', 'adverts.user_id', '=', 'user_profiles.user_id')
                ->whereBetween('user_profiles.lat', [$location[0] - ($distance * .01), $location[0] + ($distance * .01)])
                ->whereBetween('user_profiles.lng', [$location[1] - ($distance * .01), $location[1] + ($distance * .01)]);
        }

        if ($type == Advert::IN_STOCK) {
            $adverts = $adverts->where('date_from', '>=', Carbon::now()->format('Y-m-d'))
                ->where('date_to', '>=', Carbon::now()->format('Y-m-d'));
        }

        if ($type == Advert::BY_DATE) {
            $adverts = $date
                ? $adverts->where('date', '>=', $date)
                : $adverts->whereIn('time', $time);
        }

        $adverts = $adverts->groupBy('adverts.id')
            ->orderBy('created_at', 'asc')
            ->paginate();

        return view('frontend.adverts.index', [
            'adverts' => $adverts,
            'filter'  => [
                'cid'      => $request->has('cid') ? explode(',', $request->cid) : [],
                'time'     => $request->has('time') ? explode(',', $request->time) : [],
                'country'  => $country,
                'location' => $location,
                'address'  => $address,
                'distance' => $distance
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $advert = Advert::with(['user', 'images', 'product'])
            ->where('slug', $slug)
            ->first();

        if ($advert) {
            $reviews = ProductReview::with(['user.profile'])
                ->where('product_id', $advert->product->id)
                ->paginate();

            $relatedAdverts = Advert::with(['images'])
                ->where('user_id', $advert->user_id)
                ->where('id', '!=', $advert->id)
                ->take(10)
                ->get();

            return view('frontend.adverts.show', [
                'advert'         => $advert,
                'reviews'        => $reviews,
                'relatedAdverts' => $relatedAdverts
            ]);
        }
    }
}
