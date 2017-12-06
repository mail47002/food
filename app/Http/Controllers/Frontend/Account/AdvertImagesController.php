<?php

namespace App\Http\Controllers\Frontend\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;
use Storage;

class AdvertImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Upload image in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $file = $request->image;
        $fileName = str_random(18) . '.' . $file->getClientOriginalExtension();
        $imageFilePath = $this->getImagePath() . '/' . $fileName;
        $thumbnailFilePath = $this->getThumbnailPath() . '/' . $fileName;

        $image = Image::make($file);

        Storage::put($imageFilePath, $image->stream());
        Storage::put($thumbnailFilePath, $image->stream());

        return response()->json([
            'image' => $fileName,
            'url'   => asset($imageFilePath)
        ]);

    }

    /**
     * Delete image in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        Storage::delete($this->getImagePath() . '/' . $request->image);
        Storage::delete($this->getThumbnailPath() . '/' . $request->image);

        return response()->json(1);
    }

    private function getImagePath()
    {
        return 'uploads/' . md5(Auth::id() . Auth::user()->email) . '/adverts';
    }

    private function getThumbnailPath()
    {
        return 'uploads/' . md5(Auth::id() . Auth::user()->email) . '/adverts/thumbnails';
    }
}
