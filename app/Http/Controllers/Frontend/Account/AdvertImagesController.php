<?php

namespace App\Http\Controllers\Frontend\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Helper;
use Image;
use Storage;

class AdvertImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'profile.check']);
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

    /**
     * Return image path.
     *
     * @return string
     */
    private function getImagePath()
    {
        return 'uploads/' . Auth::user()->getDirHash();
    }

    /**
     * Return thumbnail path.
     *
     * @return string
     */
    private function getThumbnailPath()
    {
        return 'uploads/' . Auth::user()->getDirHash() . '/thumbs';
    }
}
