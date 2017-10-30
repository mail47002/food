<?php

namespace App\Http\Controllers\Frontend\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;
use Storage;

class ImageUploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = str_random(18) . '.' . $file->getClientOriginalExtension();
            $filePath = 'uploads/' . md5(Auth::id()) . '/' . $fileName;

            $image = Image::make($file)->resize(null, 700, function ($constraint) {
                $constraint->aspectRatio();
            });

            Storage::put($filePath, $image->stream());

            return response()->json([
                'image' => $fileName,
                'url'   => asset($filePath)
            ]);
        }
    }

    public function destroy(Request $request)
    {
        if ($request->has('image')) {
            $filePath = 'uploads/' . md5(Auth::id()) . '/' . $request->image;

            Storage::delete($filePath);

            return response()->json(1);
        }
    }
}
