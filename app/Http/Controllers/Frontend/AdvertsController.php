<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
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

        $adverts = Advert::with(['product', 'images'])
            ->whereHas('categories', function ($query) use ($request) {
                $query->whereIn('category_id', $request->input('cid', Category::pluck('id')));
            })
            ->where('type', $request->input('type', 'by_date'))
            ->where('name', 'like', '%' . $request->search . '%')
            ->orderBy('created_at', 'asc')
            ->paginate(4);

        return view('frontend.adverts.index', [
            'adverts'    => $adverts,
            'categories' => $categories
        ]);
    }

    public function show($id)
    {
        $advert = Advert::find($id);

        if ($advert) {
            return view('frontend.adverts.show', [
                'advert' => $advert
            ]);
        }
    }
}
