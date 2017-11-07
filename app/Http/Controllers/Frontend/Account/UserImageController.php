<?php

namespace App\Http\Controllers\Frontend\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;
use Storage;

class UserImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
        if ($request->hasFile('image')) {
            $this->validateForm($request);

            Storage::delete(Auth::user()->image);

            $image = $this->storeImage($request);

            Auth::user()->image = $image;
            Auth::user()->save();

            return response()->json([
                'success' => true,
                'image'   => asset($image)
            ]);
        }
    }

    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|max:1024'
        ]);
    }

    protected function storeImage(Request $request)
    {
        $file = $request->file('image');
        $fileName = str_random(18) . '.' . $file->getClientOriginalExtension();
        $filePath = 'uploads/' . md5(Auth::id()) . '/' . $fileName;

        $image = Image::make($file)->fit(210, 210);

        Storage::put($filePath, $image->stream());

        return $filePath;
    }
}
