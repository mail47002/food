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
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cId = $request->cid
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
//            ->whereHas('categories', function ($query) use ($cId) {
//                $query->whereIn('category_id', $cId);
//            })
            ->where('name', 'like', '%' . $request->search . '%')
            ->whereBetween('price', [$priceFrom, $priceTo])
            ->where('type', $type);

        if ($type == Advert::IN_STOCK) {
            $adverts = $adverts->where('date_from', '<=', Carbon::now())
                ->where('date_to', '>=', Carbon::now());
        }

        if ($type == Advert::BY_DATE) {
            $adverts = $date
                ? $adverts->where('date', '>=', $date)
                : $adverts->whereIn('time', $time);
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
            $reviews = Review::where('product_id', $advert->product->id)->paginate();

            return view('frontend.adverts.show', [
                'advert'  => $advert,
                'reviews' => $reviews
            ]);
        }
    }
}
