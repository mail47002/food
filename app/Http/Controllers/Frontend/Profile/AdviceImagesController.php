<?php

namespace App\Http\Controllers\Frontend\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdviceImage;
use Image;
use Storage;
use Auth;

class AdviceImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store advice image to storage.
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

            $adviceImage = AdviceImage::create([
                'user_id'    => Auth::id(),
                'thumbnail'  => $thumbnail,
                'image'      => $image
            ]);

            return response()->json([
                'success' => true,
                'image'   => [
                    'id'        => $adviceImage->id,
                    'thumbnail' => asset($adviceImage->thumbnail)
                ]
            ]);
        }
    }

    /**
     * Update advice image.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $adviceImage = AdviceImage::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($adviceImage && $request->hasFile('image')) {
            $this->validateForm($request);

            $thumbnail = $this->storeThumbnail($request->file('image'));
            $image = $this->storeImage($request->file('image'));

            $adviceImage->thumbnail = $thumbnail;
            $adviceImage->image = $image;
            $adviceImage->save();

            return response()->json([
                'success' => true,
                'image'   => [
                    'id'        => $adviceImage->id,
                    'thumbnail' => asset($adviceImage->thumbnail)
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
        $adviceImage = AdviceImage::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($adviceImage) {
            Storage::delete($adviceImage->thumbnail);
            Storage::delete($adviceImage->image);

            $adviceImage->delete();

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
     * Store advice thumbnail.
     *
     * @param $file
     * @return string
     */
    protected function storeThumbnail($file)
    {
        $path = 'uploads/' . Auth::id() . '/advices/thumbnail';
        $filename = str_random(18) . '.' . $file->getClientOriginalExtension();
        $filepath = $path . '/' . $filename;

        $thumb = Image::make($file)->fit(325, 220);

        Storage::put($filepath, $thumb->stream());

        return $filepath;
    }

    /**
     * Store advice image.
     *
     * @param $file
     * @return string
     */
    protected function storeImage($file)
    {
        $path = 'uploads/' . Auth::id() . '/advices';
        $filename = str_random(18) . '.' . $file->getClientOriginalExtension();
        $filepath = $path . '/' . $filename;

        $image = Image::make($file)->resize(null, 700, function ($constraint) {
            $constraint->aspectRatio();
        });

        Storage::put($filepath, $image->stream());

        return $filepath;
    }
}
