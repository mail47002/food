<?php

namespace App\Http\Controllers\Frontend\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RecipeStep;
use Image;
use Storage;
use Auth;

class RecipeStepsController extends Controller
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

            $recipeStep = RecipeStep::create([
                'user_id'    => Auth::id(),
                'thumbnail'  => $thumbnail,
                'image'      => $image
            ]);

            return response()->json([
                'success' => true,
                'image'   => [
                    'id'        => $recipeStep->id,
                    'thumbnail' => asset($recipeStep->thumbnail)
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
        $recipeStep = RecipeStep::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($recipeStep && $request->hasFile('image')) {
            $this->validateForm($request);

            $thumbnail = $this->storeThumbnail($request->file('image'));
            $image = $this->storeImage($request->file('image'));

            $recipeStep->thumbnail = $thumbnail;
            $recipeStep->image = $image;
            $recipeStep->save();

            return response()->json([
                'success' => true,
                'image'   => [
                    'id'        => $recipeStep->id,
                    'thumbnail' => asset($recipeStep->thumbnail)
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
        $recipeStep = RecipeStep::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($recipeStep) {
            Storage::delete($recipeStep->thumbnail);
            Storage::delete($recipeStep->image);

            $recipeStep->delete();

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
        $path = 'uploads/' . Auth::id() . '/recipes/steps/thumbnail';
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
        $path = 'uploads/' . Auth::id() . '/recipes/steps';
        $filename = str_random(18) . '.' . $file->getClientOriginalExtension();
        $filepath = $path . '/' . $filename;

        $image = Image::make($file)->resize(null, 700, function ($constraint) {
            $constraint->aspectRatio();
        });

        Storage::put($filepath, $image->stream());

        return $filepath;
    }
}
