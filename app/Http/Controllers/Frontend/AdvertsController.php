<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\City;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advert;

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

        $cities = City::all();

        $adverts = Advert::with(['product', 'images'])
            ->whereHas('categories', function ($query) use ($request, $categories) {
                $query->whereIn('category_id', $request->input('cid', $categories->pluck('id')));
            })
            ->where('type', $request->input('type', 'by_date'))
            ->where('name', 'like', '%' . $request->search . '%')
//            ->where('price', '>=' , $request->input('price', 0))
//            ->where('custom_price', '<=' , $request->input('custom_price', 99999))
            ->orderBy('created_at', 'asc')
            ->paginate(4);

        return view('frontend.adverts.index', [
            'adverts'    => $adverts,
            'categories' => $categories,
            'cities'     => $cities
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
