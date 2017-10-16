<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\ProductImage;
use App\ProductToCategory;
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
        $products = Product::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('frontend.profile.products.index', [
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

        return view('frontend.profile.products.create', [
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

        DB::beginTransaction();

        $product = new Product;
        $product->fill($request->all());
        $product->user_id = Auth::id();
        $product->save();

        $this->storeCategories($request, $product);

        $this->storeImages($request, $product);

        $this->storeImage($request, $product);

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
            return view('frontend.profile.products.success', [
                'product' => Session::get('product')
            ]);
        }

        return redirect()->route('profile.products.index');
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
            return view('frontend.profile.products.show', [
                'product' => $product
            ]);
        }

        return redirect()->route('profile.products.index');
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

            return view('frontend.profile.products.edit', [
                'product'    => $product,
                'categories' => $categories
            ]);
        }

        return redirect()->route('profile.products.index');
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

            $product->categories()->delete();

            $this->storeCategories($request, $product);

            $this->storeImages($request, $product);

            $this->storeImage($request, $product);

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
            $product->categories()->delete();

            $this->deleteImages($product);

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
            'images'       => 'present',
            'ingredient.*' => 'required',
            'description'  => 'required'
        ]);
    }

    protected function storeCategories(Request $request, $product)
    {
        foreach ($request->category as $category) {
            ProductToCategory::create([
                'product_id'  => $product->id,
                'category_id' => $category
            ]);
        }
    }

    /**
     * Store product images to storage.
     *
     * @param Request $request
     * @param $product
     */
    protected function storeImages(Request $request, $product)
    {
        $productImages = ProductImage::where('product_id', 0)->pluck('id')->toArray();

        $idsToInsert = array_intersect($productImages, $request->images);
        $idsToDelete = array_udiff($productImages, $request->images,'strcasecmp');

        foreach ($idsToInsert as $id) {
            $productImage = ProductImage::find($id);

            if ($productImage) {
                $productImage->product_id = $product->id;
                $productImage->save();
            }
        }

        foreach ($idsToDelete as $id) {
            $productImage = ProductImage::find($id);

            if ($productImage) {
                Storage::delete($productImage->thumbnail);
                Storage::delete($productImage->image);

                $productImage->delete();
            }
        }
    }

    /**
     * Store product image to storage.
     *
     * @param Request $request
     * @param $product
     */
    protected function storeImage(Request $request, $product)
    {
        $productImage = ProductImage::where('id', $request->image)
            ->where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($productImage) {
            $product->thumbnail = $productImage->thumbnail;
            $product->image = $productImage->image;
            $product->save();
        }
    }

    /**
     * Delete product images from storage.
     *
     * @param $product
     */
    protected function deleteImages($product)
    {
        $productImages = ProductImage::where('product_id', $product->id)
            ->where('user_id', Auth::id())
            ->get();

        if ($productImages) {
            foreach ($productImages as $productImage) {
                Storage::delete($productImage->thumbnail);
                Storage::delete($productImage->image);

                $productImage->delete();
            }
        }
    }
}
