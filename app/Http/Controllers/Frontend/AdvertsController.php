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
        $categories = Category::all();

        $cId = $request->cid ? explode(',', $request->cid) : $categories->pluck('id');
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
            ->where('type', $request->input('type', 'by_date'))
            ->where('date', '>=', $date)
            ->whereIn('time', $time)
            ->orderBy('created_at', 'asc')
            ->paginate();

        return view('frontend.adverts.index', [
            'adverts' => $adverts,
            'filter'  => [
                'cid' => $request->has('cid') ? explode(',', $request->cid) : [],
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
