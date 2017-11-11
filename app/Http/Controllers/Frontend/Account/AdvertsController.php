<?php

namespace App\Http\Controllers\Frontend\Account;

use App\AdvertImage;
use App\AdvertSticker;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advert;
use Auth;
use DB;
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
        $adverts = Advert::where('type', $request->input('type', 'by_date'))
            ->where('name', 'like', '%' . $request->search . '%')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(2);

        return view('frontend.account.adverts.index', [
            'adverts' => $adverts
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
            $stickers = AdvertSticker::orderBy('id', 'asc')->get();

            return view('frontend.account.adverts.create', [
                'products' => $products,
                'stickers' => $stickers
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validateForm($request);

        $request->merge([
            'user_id' => Auth::id()
        ]);

        DB::beginTransaction();

        $advert = Advert::create($request->all());

        foreach ($request->images as $image) {
            $advertImage = new AdvertImage([
                'image' => $image
            ]);

            $advert->images()->save($advertImage);
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

        return redirect()->route('account.adverts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
            $stickers = AdvertSticker::orderBy('id', 'asc')->get();

            return view('frontend.account.adverts.edit', [
                'advert'   => $advert,
                'stickers' => $stickers
            ]);
        }

        return view('frontend.account.adverts.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
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

    protected function validateForm(Request $request)
    {
        $rules = [
            'name'        => 'required',
            'description' => 'required',
            'city'        => 'required',
            'street'      => 'required',
            'build'       => 'required'
        ];

        if (!$request->has('type') || ($request->has('type') && $request->type == 'by_date')) {
            $rules['price']     = 'required|numeric|regex:/^[0-9]+[.]?[0-9]*$/';
            $rules['date']      = 'required_unless:everyday,1';
            $rules['date_from'] = 'required_if:everyday,1';
            $rules['date_to']   = 'required_if:everyday,1';
            $rules['quantity']  = 'required';
            $rules['image']     = 'required';
        }

        if ($request->has('type') && $request->type == 'in_stock') {
            $rules['price']     = 'required|numeric|regex:/^[0-9]+[.]?[0-9]*$/';
            $rules['date_from'] = 'required';
            $rules['date_to']   = 'required';
            $rules['quantity']  = 'required';
            $rules['image']     = 'required';
        }

        if ($request->has('type') && $request->type == 'pre_order') {
            $rules['price']        = 'required|numeric|regex:/^[0-9]+[.]?[0-9]*$/';
            $rules['custom_price'] = 'required|numeric|regex:/^[0-9]+[.]?[0-9]*$/';
        }

        $this->validate($request, $rules);
    }
}
