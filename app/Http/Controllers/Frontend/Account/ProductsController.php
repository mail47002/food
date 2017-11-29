<?php

namespace App\Http\Controllers\Frontend\Account;

use App\ProductImage;
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
        $products = Product::with('adverts')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validateForm($request);

        $request->merge([
            'user_id' => Auth::id(),
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
        $product = Product::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($product) {
            return view('frontend.account.products.show', [
                'product' => $product
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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

        if ($product) {
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
     * Validate form.
     *
     * @param Request $request
     */
    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'name'         => 'required',
            'category'     => 'present',
            'image'        => 'required',
            'ingredient.*' => 'required',
            'description'  => 'required'
        ]);
    }

    protected function storeImage($file)
    {
        $oldFilePath = 'uploads/tmp/' . $file;
        $newFilePath = 'uploads/' . md5(Auth::id()) . '/' . $file;

        Storage::move($oldFilePath, $newFilePath);

        return $newFilePath;
    }
}