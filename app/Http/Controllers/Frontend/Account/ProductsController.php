<?php

namespace App\Http\Controllers\Frontend\Account;

use App\ProductImage;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use Auth;
use DB;
use Session;
use Storage;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a list of products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::leftJoin('adverts', 'products.id', '=', 'adverts.product_id')
            ->select('products.*')
            ->selectRaw('COUNT(IF (adverts.type = "by_date", 1, NULL)) by_date')
            ->selectRaw('COUNT(IF (adverts.type = "in_stock", 1, NULL)) in_stock')
            ->selectRaw('COUNT(IF (adverts.type = "pre_order", 1, NULL)) pre_order')
            ->where('products.user_id', Auth::id())
            ->orderBy('products.created_at', 'desc')
            ->groupBy('products.id')
            ->paginate();

        return view('frontend.account.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Display create product form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();

        return view('frontend.account.products.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store new product.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
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

        $product = Product::create($request->all());

        $product->categories()->sync($request->category);

        foreach ($request->images as $image) {
            $productImage = new ProductImage([
                'image' => $image
            ]);

            $product->images()->save($productImage);
        }

        DB::commit();

        Session::flash('product', $product);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Display the success resource.
     *
     */
    public function success()
    {
        if (Session::has('product')) {
            return view('frontend.account.products.success', [
                'product' => Session::get('product')
            ]);
        }

        return redirect()->route('account.products.index');
    }

    /**
     * Display product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('user')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($product) {
            $reviews = Review::where('product_id', $product->id)
                ->orderBy('created_at')
                ->paginate();

            $relatedProducts = Product::where('id', '!=', $id)
                ->where('user_id', Auth::id())
                ->inRandomOrder()
                ->take(10)
                ->get();

            return view('frontend.account.products.show', [
                'product'         => $product,
                'relatedProducts' => $relatedProducts,
                'reviews'         => $reviews
            ]);
        }

        return redirect()->route('account.products.index');
    }

    /**
     * Display edit product form.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with(['categories', 'images'])
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($product) {
            $categories = Category::orderBy('name', 'asc')->get();

            return view('frontend.account.products.edit', [
                'product'    => $product,
                'categories' => $categories
            ]);
        }

        return redirect()->route('account.products.index');
    }

    /**
     * Update product.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($product) {
            $this->validateForm($request);

            DB::beginTransaction();

            $product->fill($request->all())->save();

            $product->categories()->sync($request->category);

            $product->images()->delete();

            foreach ($request->images as $image) {
                $productImage = new ProductImage([
                    'image' => $image
                ]);

                $product->images()->save($productImage);
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
     * Remove product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::with('categories')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($product && count($product->adverts) < 1) {
            $product->categories()->detach();
            $product->images()->delete();
            $product->delete();

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
        $this->validate($request, [
            'name'         => 'required|max:255',
            'category'     => 'present',
            'image'        => 'required|max:255',
            'ingredient.*' => 'required',
            'description'  => 'required'
        ]);
    }

    /**
     * Return product slug.
     *
     * @param Request $request
     * @return string
     */
    protected function getSlug(Request $request)
    {
        return str_slug($request->name . '-' . str_random(8));
    }
}