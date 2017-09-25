<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advert;

class AdvertsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::with(['product', 'reviews', 'images' => function($query) {
                $query->orderBy('sort_order', 'asc');
            }])->latest()->get();

        return view('frontend.adverts.index', [
            'adverts' => $adverts
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
