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

            $thumbnail = $this->storeThumbnail($request->file('image'));
            $image = $this->storeImage($request->file('image'));

            $productImage = ProductImage::create([
                'user_id'    => Auth::id(),
                'thumbnail'  => $thumbnail,
                'image'      => $image
            ]);

            return response()->json([
                'success' => true,
                'image'   => [
                    'id'        => $productImage->id,
                    'thumbnail' => asset($productImage->thumbnail)
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
            ->where('user_id', Auth::id())
            ->first();

        if ($productImage && $request->hasFile('image')) {
            $this->validateForm($request);

            $thumbnail = $this->storeThumbnail($request->file('image'));
            $image = $this->storeImage($request->file('image'));

            $productImage->thumbnail = $thumbnail;
            $productImage->image = $image;
            $productImage->save();

            return response()->json([
                'success' => true,
                'image'   => [
                    'id'        => $productImage->id,
                    'thumbnail' => asset($productImage->thumbnail)
                ]
            ]);
        }
    }

    /**
     * Delete image from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id) {
        $productImage = ProductImage::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($productImage) {
            Storage::delete($productImage->thumbnail);
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
     * Store product thumbnail.
     *
     * @param $file
     * @return string
     */
    protected function storeThumbnail($file)
    {
        $path = 'uploads/' . Auth::id() . '/products/thumbnail';
        $filename = str_random(18) . '.' . $file->getClientOriginalExtension();
        $filepath = $path . '/' . $filename;

        $thumb = Image::make($file)->fit(325, 220);

        Storage::put($filepath, $thumb->stream());

        return $filepath;
    }

    /**
     * Store product image.
     *
     * @param $file
     * @return string
     */
    protected function storeImage($file)
    {
        $path = 'uploads/' . Auth::id() . '/products';
        $filename = str_random(18) . '.' . $file->getClientOriginalExtension();
        $filepath = $path . '/' . $filename;

        $image = Image::make($file)->resize(null, 700, function ($constraint) {
            $constraint->aspectRatio();
        });

        Storage::put($filepath, $image->stream());

        return $filepath;
    }
}
