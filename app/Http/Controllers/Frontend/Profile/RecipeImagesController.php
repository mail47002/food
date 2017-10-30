<?php

namespace App\Http\Controllers\Frontend\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RecipeImage;
use Image;
use Storage;
use Auth;

class RecipeImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store recipe image to storage.
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

            $recipeImage = RecipeImage::create([
                'user_id'    => Auth::id(),
                'thumbnail'  => $thumbnail,
                'image'      => $image
            ]);

            return response()->json([
                'success' => true,
                'image'   => [
                    'id'        => $recipeImage->id,
                    'thumbnail' => asset($recipeImage->thumbnail)
                ]
            ]);
        }
    }

    /**
     * Update recipe image.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $recipeImage = RecipeImage::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($recipeImage && $request->hasFile('image')) {
            $this->validateForm($request);

            $thumbnail = $this->storeThumbnail($request->file('image'));
            $image = $this->storeImage($request->file('image'));

            $recipeImage->thumbnail = $thumbnail;
            $recipeImage->image = $image;
            $recipeImage->save();

            return response()->json([
                'success' => true,
                'image'   => [
                    'id'        => $recipeImage->id,
                    'thumbnail' => asset($recipeImage->thumbnail)
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
        $recipeImage = RecipeImage::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($recipeImage) {
            Storage::delete($recipeImage->thumbnail);
            Storage::delete($recipeImage->image);

            $recipeImage->delete();

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
     * Store recipe thumbnail.
     *
     * @param $file
     * @return string
     */
    protected function storeThumbnail($file)
    {
        $path = 'uploads/' . Auth::id() . '/recipes/thumbnail';
        $filename = str_random(18) . '.' . $file->getClientOriginalExtension();
        $filepath = $path . '/' . $filename;

        $thumb = Image::make($file)->fit(325, 220);

        Storage::put($filepath, $thumb->stream());

        return $filepath;
    }

    /**
     * Store recipe image.
     *
     * @param $file
     * @return string
     */
    protected function storeImage($file)
    {
        $path = 'uploads/' . Auth::id() . '/recipes';
        $filename = str_random(18) . '.' . $file->getClientOriginalExtension();
        $filepath = $path . '/' . $filename;

        $image = Image::make($file)->resize(null, 700, function ($constraint) {
            $constraint->aspectRatio();
        });

        Storage::put($filepath, $image->stream());

        return $filepath;
    }
}
