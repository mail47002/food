<?php

namespace App\Http\Controllers\Frontend\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductImage;
use Image;
use Storage;
use Auth;

class ProductImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store product image to storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $this->validateForm($request);

            $productImage = ProductImage::create([
                'product_id' => $request->product_id,
                'image'      => $this->storeImage($request)
            ]);

            return response()->json([
                'success' => true,
                'image'   => [
                    'id'    => $productImage->id,
                    'image' => asset($productImage->image)
                ]
            ]);
        }
    }

    /**
     * Update product image.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $productImage = ProductImage::where('id', $id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($productImage && $request->hasFile('image')) {
            $this->validateForm($request);

            Storage::delete($productImage->image);

            $productImage->image = $this->storeImage($request);
            $productImage->save();

            return response()->json([
                'success' => true,
                'image'   => [
                    'id'    => $productImage->id,
                    'image' => asset($productImage->image)
                ]
            ]);
        }
    }

    /**
     * Delete image from storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $id) {
        $productImage = ProductImage::where('id', $id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($productImage) {
            Storage::delete($productImage->image);

            $productImage->delete();

            return response()->json([
                'success' => true
            ]);
        }
    }

    /**
     * Validate image form.
     *
     * @param Request $request
     */
    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|max:2048'
        ]);
    }

    /**
     * Store product image & thumbnail.
     *
     * @param Request $request
     * @return string
     */
    protected function storeImage(Request $request)
    {
        $file = $request->file('image');
        $fileName = str_random(18) . '.' . $file->getClientOriginalExtension();
        $filePath = 'uploads/' . md5(Auth::id()) . '/' . $fileName;;

        $image = Image::make($file)->resize(null, 700, function ($constraint) {
            $constraint->aspectRatio();
        });

        Storage::put($filePath, $image->stream());

        // Thumbnail
//        $thumbnailFilePath = $filePath . '/thumbnail/' . $fileName;
//
//        $thumbnail = Image::make($file)->fit(325, 220);
//
//        Storage::put($thumbnailFilePath, $thumbnail->stream());

        return $filePath;
    }
}
