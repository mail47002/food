<?php

namespace App\Http\Controllers\Frontend\Account;

use App\AdvertImage;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advert;
use Auth;
use DB;
use Helper;
use Session;

class AdvertsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $adverts = Advert::leftJoin('orders', 'adverts.id', '=', 'orders.advert_id')
            ->select('adverts.*')
            ->selectRaw("COUNT(IF(orders.status = '" . Order::CONFIRMED . "', 1, null)) AS confirmed")
            ->where('adverts.type', $request->input('type', 'by_date'))
            ->where('adverts.name', 'like', '%' . $request->search . '%')
            ->where('adverts.user_id', Auth::id())
            ->groupBy('adverts.id')
            ->orderBy('adverts.created_at', 'desc')
            ->paginate();

        $advertsTotal = Advert::where('user_id', Auth::id())->count();

        return view('frontend.account.adverts.index', [
            'adverts'      => $adverts,
            'advertsTotal' => $advertsTotal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $products = Product::where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->get();

        if ($products) {
            return view('frontend.account.adverts.create', [
                'products' => $products
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return Response
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $this->validateForm($request);

        $request->merge([
            'user_id' => Auth::id(),
            'slug'    => $this->getSlug($request)
        ]);

        DB::beginTransaction();

        $advert = Advert::create($request->all());

        $request->merge([
            'advert_id' => $advert->id
        ]);

        if ($request->has('change_images')) {
            $this->syncImages($request->images, $advert);
        } else {
            $product = Product::find($request->product_id);

            if ($product) {
                $this->syncImages($product->images, $advert);
            }
        }

        DB::commit();

        Session::flash('advert', $advert);

        return response()->json([
            'success' => true
        ]);
    }

    public function success()
    {
        if (Session::has('advert')) {
            return view('frontend.account.adverts.success', [
                'advert' => Session::get('advert')
            ]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $advert = Advert::where('id', $id)
            ->where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->get();

        if ($advert) {
            return view('frontend.account.adverts.show', [
                'advert' => $advert
            ]);
        }
        return redirect()->route('frontend.account.adverts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $advert = Advert::with(['product', 'images'])
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($advert) {
            return view('frontend.account.adverts.edit', [
                'advert' => $advert
            ]);
        }

        return view('frontend.account.adverts.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return Response
     * @throws \Exception
     */
    public function update(Request $request, $id)
    {
        $advert = Advert::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($advert) {
            $this->validateForm($request);

            $request->merge([
                'user_id' => Auth::id()
            ]);

            DB::beginTransaction();

            $advert->fill($request->all())->save();

            $advert->images()->delete();

            foreach ($request->images as $image) {
                $advertImage = new AdvertImage([
                    'image' => $image
                ]);

                $advert->images()->save($advertImage);
            }

            DB::commit();

            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'error' => 'Oops! Something wet wrong.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $advert = Advert::where('id', $id)
            ->where('type', $request->type)
            ->where('user_id', Auth::id())
            ->first();

        if ($advert) {
            $advert->images()->delete();
            $advert->delete();

            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'error' => 'Oops! Something wet wrong.'
        ]);
    }

    /**
     * Validate form request.
     *
     * @param Request $request
     */
    protected function validateForm(Request $request)
    {
        $rules = [
            'name'        => 'required|max:255',
            // 'description' => 'required',
            'address'     => 'required|max:255',
            'lat'         => 'required',
            'lng'         => 'required'
        ];

        if (Helper::isAdvertByDate()) {
            $rules['price']     = 'required|numeric|regex:/^[0-9]+[.]?[0-9]*$/';
            $rules['date']      = 'required_unless:everyday,1';
            $rules['date_from'] = 'required_if:everyday,1';
            $rules['date_to']   = 'required_if:everyday,1';
            $rules['quantity']  = 'required';
            $rules['image']     = 'required|max:255';
        }

        if (Helper::isAdvertInStock()) {
            $rules['price']     = 'required|numeric|regex:/^[0-9]+[.]?[0-9]*$/';
            $rules['date_from'] = 'required';
            $rules['date_to']   = 'required';
            $rules['quantity']  = 'required';
            $rules['image']     = 'required|max:255';
        }

        if (Helper::isAdvertPreOrder()) {
            $rules['price']        = 'required|numeric|regex:/^[0-9]+[.]?[0-9]*$/';
            $rules['custom_price'] = 'required|numeric|regex:/^[0-9]+[.]?[0-9]*$/';
        }

        $this->validate($request, $rules);
    }

    /**
     * Sync advert images.
     *
     * @param $images
     * @param $advert
     */
    protected function syncImages($images, $advert)
    {
        $advertImages = [];

        foreach ($images as $image) {
            $advertImages[] = new AdvertImage([
                'image' => $this->getImage($image)
            ]);
        }

        $advert->images()->saveMany($advertImages);
    }

    /**
     * @param $image
     * @return mixed
     */
    protected function getImage($image)
    {
        if (is_object($image)) {
            $image = $image->image;
        }

        return $image;
    }

    /**
     * Return advert slug.
     *
     * @param Request $request
     * @return string
     */
    protected function getSlug(Request $request)
    {
        return str_slug($request->name . '-' . str_random(5));
    }
}
