<?php

namespace App\Http\Controllers\Frontend;

use App\Advert;
use App\Category;
use App\Notifications\OrderCreated;
use App\Order;
use App\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

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

        $cid = $request->cid ? explode(',', $request->cid) : $categories->pluck('id');

        $adverts = Advert::with(['product', 'images'])
            ->whereHas('categories', function ($query) use ($request, $cid) {
                $query->whereIn('category_id', $cid);
            })
            ->where('type', $request->input('type', 'by_date'))
            ->where('name', 'like', '%' . $request->search . '%')
            ->whereBetween('price', [$request->input('price_from', 0), $request->input('price_to', 99999)])
            ->orderBy('created_at', 'asc')
            ->paginate(4);

        return view('frontend.adverts.index', [
            'adverts'    => $adverts,
            'filter'     => [
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

    /**
     * TODO: Check auth user id & advert id
     *
     */
    public function order(Request $request)
    {
        $this->validateForm($request);

        $advert = Advert::with('user')->find($request->advert_id);

        if ($advert && !Order::where('advert_id', $request->advert_id)->where('user_id', Auth::id())->exists()) {
            $order = Order::create($request->all());

            $advert->user->notify(new OrderCreated($order));

            return response()->json([
                'status' => 'success'
            ]);
        }

        return response()->json([
            'status' => 'warning'
        ]);
    }

    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'advert_id' => 'required',
            'user_id'   => 'required'
        ]);
    }
}
