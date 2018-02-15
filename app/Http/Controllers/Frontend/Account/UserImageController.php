<?php

namespace App\Http\Controllers\Frontend\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Helper;
use Image;
use Storage;

class UserImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Update user image.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        if ($request->hasFile('image')) {
            $this->validateForm($request);

            Storage::delete('uploads/' . Helper::getUserDirHash(Auth::user()) . '/' . Auth::user()->image);

            $image = $this->storeImage($request);

            Auth::user()->image = $image;
            Auth::user()->save();

            return response()->json([
                'success' => true,
                'image'   => asset($image)
            ]);
        }
    }

    /**
     * Validate request form.
     *
     * @param Request $request
     */
    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|max:1024'
        ]);
    }

    /**
     * Upload image to storage.
     *
     * @param Request $request
     * @return string
     */
    protected function storeImage(Request $request)
    {
        $file = $request->file('image');
        $fileName = str_random(18) . '.' . $file->getClientOriginalExtension();
        $filePath = 'uploads/' . Helper::getUserDirHash(Auth::user()) . '/' . $fileName;

        $image = Image::make($file)->fit(210, 210);

        Storage::put($filePath, $image->stream());

        return $filePath;
    }
}
