<?php

namespace App\Http\Controllers\Frontend;

use App\Advert;
use App\Category;
use App\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Helper;

class AdvertsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cId = $request->cid ? explode(',', $request->cid) : Category::all()->pluck('id');
        $type = $request->input('type', 'by_date');
        $priceFrom = $request->price_from ?? 0;
        $priceTo = $request->price_to ?? 99999.99;
        $date = $request->date ? Carbon::parse($request->date)->toDateTimeString() : Carbon::now();
        $time = $request->time ? explode(',', $request->time) : Helper::getAdvertTimes();

        $adverts = Advert::with(['product', 'images'])
            ->whereHas('categories', function ($query) use ($request, $cId) {
                $query->whereIn('category_id', $cId);
            })
            ->where('name', 'like', '%' . $request->search . '%')
            ->whereBetween('price', [$priceFrom, $priceTo])
            ->where('type', $type);

        if ($type == Advert::BY_DATE) {
            $adverts = $adverts->where('date', '>=', $date)->whereIn('time', $time);
        }

        $adverts = $adverts->orderBy('created_at', 'asc')->paginate();

        return view('frontend.adverts.index', [
            'adverts' => $adverts,
            'filter'  => [
                'cid'  => $request->has('cid') ? explode(',', $request->cid) : [],
                'time' => $request->has('time') ? explode(',', $request->time) : []
            ]
        ]);
    }

    public function show($slug)
    {
        $advert = Advert::with(['user', 'images', 'product'])
            ->where('slug', $slug)
            ->first();

        if ($advert) {
            $reviews = Review::where('product_id', $advert->product->id)->paginate(2);

            return view('frontend.adverts.show', [
                'advert'  => $advert,
                'reviews' => $reviews
            ]);
        }
    }
}
